<?php
require_once '../config.php';
require_once '../function.php';
$textbotlang = languagechange();
require_once '../botapi.php';

$reportbackup = select("topicid", "idreport", "report", "backupfile", "select")['idreport'];
$destination  = getcwd();
$setting      = select("setting", "*");
$sourcefir    = dirname($destination);

// ─── Sub-bot file backups ───────────────────────────────────────────────────
$botlist = select("botsaz", "*", null, null, "fetchAll");
if ($botlist) {
    foreach ($botlist as $bot) {
        $folderName = $bot['id_user'] . $bot['username'];
        // Unique zip name per bot to avoid overwrites in concurrent runs
        $zipFile   = $destination . '/bot_' . $bot['id_user'] . '_backup.zip';
        $dataDir   = $sourcefir . '/vpnbot/' . $folderName . '/data';
        $prodJson  = $sourcefir . '/vpnbot/' . $folderName . '/product.json';
        $prodName  = $sourcefir . '/vpnbot/' . $folderName . '/product_name.json';

        $targets = '';
        if (is_dir($dataDir))        $targets .= ' ' . escapeshellarg($dataDir);
        if (file_exists($prodJson))  $targets .= ' ' . escapeshellarg($prodJson);
        if (file_exists($prodName))  $targets .= ' ' . escapeshellarg($prodName);

        if (!empty($targets)) {
            shell_exec('zip -r ' . escapeshellarg($zipFile) . $targets . ' 2>/dev/null');
        }

        if (file_exists($zipFile) && filesize($zipFile) > 0) {
            telegram('sendDocument', [
                'chat_id'           => $setting['Channel_Report'],
                'message_thread_id' => $reportbackup,
                'document'          => new CURLFile($zipFile),
                'caption'           => "@{$bot['username']} | {$bot['id_user']}",
            ]);
            unlink($zipFile);
        }
    }
}

// ─── Database + config backup ───────────────────────────────────────────────
$dbhost = empty($dbhost) ? 'localhost' : $dbhost;
$today  = date('Y-m-d');
$sqlFile = $destination . '/backup_' . $today . '.sql';
$zipFile = $destination . '/backup_' . $today . '.zip';

// Detect MariaDB vs MySQL and pick the correct SSL silence flag
$dumpVersion = (string) shell_exec('mysqldump --version 2>&1');
$sslFlag = (stripos($dumpVersion, 'mariadb') !== false) ? '--skip-ssl' : '--ssl-mode=DISABLED';

// Use MYSQL_PWD env var so the password never appears in the process list
putenv('MYSQL_PWD=' . $passworddb);
$command = sprintf(
    'mysqldump -h %s -u %s --no-tablespaces %s %s > %s 2>&1',
    escapeshellarg($dbhost),
    escapeshellarg($usernamedb),
    $sslFlag,
    escapeshellarg($dbname),
    escapeshellarg($sqlFile)
);

$output     = [];
$return_var = 0;
exec($command, $output, $return_var);
putenv('MYSQL_PWD=');  // clear immediately after use

$sqlOk = ($return_var === 0 && file_exists($sqlFile) && filesize($sqlFile) > 0);

if (!$sqlOk) {
    telegram('sendmessage', [
        'chat_id'           => $setting['Channel_Report'],
        'message_thread_id' => $reportbackup,
        'text'              => $textbotlang['keyboard']['backupError'],
    ]);
} else {
    // Pack SQL dump + config.php into one zip (config has DB creds needed for restore)
    $configFile  = $sourcefir . '/config.php';
    $zipTargets  = escapeshellarg($sqlFile);
    if (file_exists($configFile)) {
        $zipTargets .= ' ' . escapeshellarg($configFile);
    }
    // -j: strip directory paths so files sit at zip root
    shell_exec('zip -j ' . escapeshellarg($zipFile) . ' ' . $zipTargets . ' 2>/dev/null');

    // Prefer the zip; fall back to raw SQL if zip failed
    $sendFile = (file_exists($zipFile) && filesize($zipFile) > 0) ? $zipFile : $sqlFile;

    telegram('sendDocument', [
        'chat_id'           => $setting['Channel_Report'],
        'message_thread_id' => $reportbackup,
        'document'          => new CURLFile($sendFile),
        'caption'           => $textbotlang['hardcoded']['backupDatabaseCaption'],
    ]);

    if (file_exists($sqlFile)) unlink($sqlFile);
    if (file_exists($zipFile)) unlink($zipFile);
}
