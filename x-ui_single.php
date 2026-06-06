<?php
require_once 'config.php';
require_once 'request.php';
ini_set('error_log', 'error_log');

function bearer_headers_xui($namepanel)
{
    $panel = select("marzban_panel", "*", "name_panel", $namepanel, "select");
    return array(
        'Accept: application/json',
        'Content-Type: application/json',
        'Authorization: Bearer ' . $panel['password_panel'],
    );
}

function get_clinets($username, $namepanel)
{
    $panel   = select("marzban_panel", "*", "name_panel", $namepanel, "select");
    $headers = bearer_headers_xui($namepanel);

    // 1) Fetch client config: enable, totalGB, expiryTime, subId, inboundIds
    $url_get = $panel['url_panel'] . "/panel/api/clients/get/" . urlencode($username);
    $req_get = new CurlRequest($url_get);
    $req_get->setHeaders($headers);
    $resp_get = $req_get->get();

    if (!empty($resp_get['error'])) {
        return $resp_get;
    }
    if ($resp_get['status'] != 200) {
        return $resp_get;
    }

    $data_get = json_decode($resp_get['body'], true);
    if (!$data_get || !isset($data_get['success'])) {
        return array('status' => 500, 'body' => $resp_get['body'], 'error' => 'Invalid response from panel');
    }
    if (!$data_get['success'] || empty($data_get['obj'])) {
        return array('status' => 200, 'body' => json_encode(array('success' => false, 'msg' => $data_get['msg'] ?? 'User not found')), 'error' => '');
    }

    // 2) Fetch traffic counters: up, down
    $url_traffic = $panel['url_panel'] . "/panel/api/clients/traffic/" . urlencode($username);
    $req_traffic = new CurlRequest($url_traffic);
    $req_traffic->setHeaders($headers);
    $resp_traffic = $req_traffic->get();

    $up   = 0;
    $down = 0;
    if (empty($resp_traffic['error']) && $resp_traffic['status'] == 200) {
        $data_traffic = json_decode($resp_traffic['body'], true);
        if ($data_traffic && !empty($data_traffic['obj'])) {
            $up   = $data_traffic['obj']['up']   ?? 0;
            $down = $data_traffic['obj']['down'] ?? 0;
        }
    }

    // 3) Merge into a single obj compatible with panels.php expectations
    $c      = $data_get['obj'];
    $merged = array(
        'email'      => $c['email']      ?? $username,
        'expiryTime' => $c['expiryTime'] ?? 0,
        'enable'     => $c['enable']     ?? true,
        'total'      => $c['totalGB']    ?? 0,
        'up'         => $up,
        'down'       => $down,
        'subId'      => $c['subId']      ?? '',
        'lastOnline' => 0,
        'inboundId'  => isset($c['inboundIds'][0]) ? intval($c['inboundIds'][0]) : 0,
        'tgId'       => $c['tgId']       ?? 0,
        'limitIp'    => $c['limitIp']    ?? 0,
    );

    return array(
        'status' => 200,
        'body'   => json_encode(array('success' => true, 'obj' => $merged)),
        'error'  => '',
    );
}

function addClient($namepanel, $usernameac, $Expire, $Total, $Uuid, $Flow, $subid, $inboundid, $name_product, $note = "")
{
    if (!isset($usernameac)) {
        return array('status' => 500, 'msg' => 'username is null');
    }

    $panel = select("marzban_panel", "*", "name_panel", $namepanel, "select");

    // Determine expiry in milliseconds (on_hold = negative value)
    if ($name_product == "usertest") {
        $use_onhold = ($panel['on_hold_test'] == "1");
    } else {
        $use_onhold = ($panel['conecton'] == "onconecton");
    }

    if ($use_onhold) {
        if ($Expire == 0) {
            $timeservice = 0;
        } else {
            $timelast    = $Expire - time();
            $timeservice = -intval(($timelast / 86400) * 86400000);
        }
    } else {
        $timeservice = $Expire * 1000;
    }

    // Accept single int, "3", or comma-separated "3,5,7"
    if (is_string($inboundid) && strpos($inboundid, ',') !== false) {
        $inboundIds = array_map('intval', explode(',', $inboundid));
    } else {
        $inboundIds = [intval($inboundid)];
    }

    $payload = array(
        "client" => array(
            "email"      => $usernameac,
            "totalGB"    => intval($Total),
            "expiryTime" => $timeservice,
            "tgId"       => 0,
            "limitIp"    => 0,
            "enable"     => true,
            "subId"      => $subid,
            "comment"    => $note,
        ),
        "inboundIds" => $inboundIds,
    );

    $url = $panel['url_panel'] . '/panel/api/clients/add';
    $req = new CurlRequest($url);
    $req->setHeaders(bearer_headers_xui($namepanel));
    return $req->post(json_encode($payload));
}

// $payload is a flat array: email, totalGB, expiryTime, enable, subId, tgId, limitIp
function updateClient($namepanel, $email, array $payload)
{
    $panel = select("marzban_panel", "*", "name_panel", $namepanel, "select");
    $url   = $panel['url_panel'] . '/panel/api/clients/update/' . urlencode($email);
    $req   = new CurlRequest($url);
    $req->setHeaders(bearer_headers_xui($namepanel));
    return $req->post(json_encode($payload));
}

function ResetUserDataUsagex_uisin($usernamepanel, $namepanel)
{
    $panel = select("marzban_panel", "*", "name_panel", $namepanel, "select");
    $url   = $panel['url_panel'] . "/panel/api/clients/resetTraffic/" . urlencode($usernamepanel);
    $req   = new CurlRequest($url);
    $req->setHeaders(bearer_headers_xui($namepanel));
    return $req->post('{}');
}

function removeClient($location, $username)
{
    $panel = select("marzban_panel", "*", "name_panel", $location, "select");
    $url   = $panel['url_panel'] . "/panel/api/clients/del/" . urlencode($username) . "?keepTraffic=0";
    $req   = new CurlRequest($url);
    $req->setHeaders(bearer_headers_xui($location));
    return $req->post('{}');
}
