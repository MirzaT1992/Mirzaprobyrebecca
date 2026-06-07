# 🤖 میرزا بات پنل | Mirza Bot Panel

<p align="center">
    <a href="https://t.me/mirzapanel" target="_blank">
        <img src="https://img.shields.io/badge/Telegram-Group-blue?style=flat-square&logo=telegram" alt="Telegram Group"/>
    </a>
    <a href="https://github.com/Samr002/mirzabot" target="_blank">
        <img src="https://img.shields.io/github/stars/Samr002/mirzabot?style=social" alt="GitHub Stars"/>
    </a>
    <a href="https://github.com/Samr002/mirzabot" target="_blank">
        <img src="https://img.shields.io/github/forks/Samr002/mirzabot?style=flat-square" alt="GitHub Forks"/>
    </a>
    <a href="https://github.com/Samr002/mirzabot/issues" target="_blank">
        <img src="https://img.shields.io/github/issues/Samr002/mirzabot?style=flat-square" alt="GitHub Issues"/>
    </a>
</p>

---

## 🇮🇷 نسخه فارسی

### 📋 فهرست مطالب
- [معرفی](#-معرفی)
- [امکانات](#-امکانات)
- [پنل‌های پشتیبانی شده](#-پنلهای-پشتیبانی-شده)
- [پیکربندی پنل 3x-ui](#-پیکربندی-پنل-3x-ui)
- [نصب](#-نصب)
- [بروزرسانی](#-بروزرسانی)
- [حذف ربات](#-حذف-ربات)

---

### ✨ معرفی

**میرزا بات** یک ربات تلگرام قدرتمند برای فروش خودکار سرویس‌های VPN است که با پنل‌های مختلف از جمله **Marzban**، **3x-ui**، **Alireza**، **Hiddify**، **Pasarguard**، **IBSng** و **MikroTik** سازگار است.

میرزا بات در دو نسخه ارائه می‌شود:
1. **نسخه رایگان 🆓** — امکانات پایه برای فروش VPN
2. **نسخه اشتراکی 💎** — امکانات پیشرفته برای کسب‌وکارهای حرفه‌ای

---

### ⚙️ امکانات

#### نسخه رایگان
- ✅ خرید VPN با ساخت خودکار کانفیگ
- ✅ مشاهده سرویس‌های خریداری شده
- ✅ حساب آزمایشی (تست)
- ✅ بخش پشتیبانی کاربران
- ✅ احراز هویت با شماره تلفن
- ✅ درگاه‌های پرداخت:
  - کارت به کارت (با تأیید ادمین)
  - **درگاه NowPayments**
  - **درگاه aqayepardakht**
- ✅ ساخت کانفیگ کاملاً خودکار
- ✅ پشتیبانی از تمام پروتکل‌ها
- ✅ عضویت اجباری در کانال برای خرید
- ✅ گزارش کامل خریدها و حساب‌های آزمایشی
- ✅ بخش آموزش با محتوای قابل شخصی‌سازی
- ✅ مدیریت موجودی کیف پول از پنل ادمین
- ✅ پشتیبانی از چند ادمین
- ✅ مدیریت سرویس‌های خریداری شده:
  - تمدید
  - خرید حجم اضافه
  - دریافت کانفیگ
  - دریافت لینک اشتراک (Subscription Link)
- ✅ بخش سؤالات متداول
- ✅ شخصی‌سازی متن‌های ربات
- ✅ مدیریت محصولات و پنل‌ها
- ✅ روش‌های مختلف تولید نام کاربری
- ✅ تنظیمات کانفیگ بر اساس پروتکل
- ✅ مدیریت درگاه‌های پرداخت

---

### 🖥️ پنل‌های پشتیبانی شده

| پنل | نوع احراز هویت | نکات |
|-----|----------------|------|
| **Marzban** | JWT Token (خودکار) | نسخه ۱ و ۲ |
| **Marzneshin** | JWT Token (خودکار) | — |
| **3x-ui** (`x-ui_single`) | Bearer Token (دستی) | [جزئیات پیکربندی ↓](#-پیکربندی-پنل-3x-ui) |
| **Alireza Panel** | Cookie (خودکار) | — |
| **Hiddify** | API Key | — |
| **Pasarguard** | — | — |
| **WGDashboard** | API Key | WireGuard |
| **IBSng** | — | — |
| **MikroTik** | — | — |
| **Manualsale** | — | فروش دستی |

---

### 🔧 پیکربندی پنل 3x-ui

پنل **3x-ui** از احراز هویت با **Bearer Token** پشتیبانی می‌کند. برای اتصال صحیح:

#### ۱. دریافت توکن API از 3x-ui
در پنل 3x-ui وارد شوید:
```
Settings → Security → API Token → Generate
```
توکن تولید شده را کپی کنید.

#### ۲. تنظیمات در ربات میرزا
هنگام اضافه کردن پنل جدید از نوع `x-ui_single`:

| فیلد | مقدار |
|------|-------|
| **آدرس پنل** | `http://IP:PORT` (بدون `/` انتهایی) |
| **توکن** | توکن Bearer که از پنل کپی کردید |
| **لینک ساب** | `http://IP:PORT/sub` (بدون `/` انتهایی) |
| **Inbound ID** | شناسه inbound در 3x-ui (عدد، مثلاً `3`) |

#### ۳. نکات مهم
- اگر آدرس پنل را تغییر دهید، ربات **به‌صورت خودکار** توکن جدید را درخواست می‌کند
- توکن در ستون `password_panel` دیتابیس ذخیره می‌شود
- لینک اشتراک (Subscription Link) به صورت `لینک‌ساب/subId` ساخته می‌شود و پس از ساخت سرویس به‌صورت دائمی ذخیره می‌گردد

---

### 🚀 نصب

#### پیش‌نیازها
- 🖥️ سرور **Ubuntu 22**
- 🌐 **دامنه** متصل به IP سرور
- 🤖 **توکن ربات تلگرام** از [@BotFather](https://t.me/BotFather)
- 🆔 **شناسه عددی** ادمین تلگرام

#### نصب خودکار
دستور زیر را به عنوان **root** روی سرور اجرا کنید:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

اسکریپت موارد زیر را می‌پرسد:
- دامنه (مثلاً `bot.example.com`)
- ایمیل برای گواهی SSL
- نام، کاربر و رمز دیتابیس
- توکن ربات تلگرام
- شناسه عددی ادمین تلگرام
- نام کاربری ربات (بدون @)

همه مراحل بعدی (Apache، PHP 8.2، MySQL، SSL، Webhook، Cronjob) به صورت خودکار انجام می‌شود.

---

### 🔄 بروزرسانی

برای بروزرسانی به آخرین نسخه:

```bash
cd /var/www/mirzabot && git pull origin main
```

یا اجرای مجدد اسکریپت نصب که خودکار آپدیت می‌کند:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

---

### ❌ حذف ربات

برای حذف دستی: Apache و MySQL را متوقف کنید، سپس `/var/www/mirzabot` را حذف و دیتابیس را drop کنید.

---

### 💵 حمایت مالی

اگر این پروژه برایتان مفید بوده، می‌توانید از طریق ارز دیجیتال حمایت کنید:

<a href="https://nowpayments.io/donation/permiumbotmirza">👉 حمایت از پروژه در NowPayments</a>

---
---

## 🇬🇧 English Version

### 📋 Table of Contents
- [Overview](#-overview)
- [Features](#-features)
- [Supported Panels](#-supported-panels)
- [3x-ui Panel Configuration](#-3x-ui-panel-configuration)
- [Installation](#-installation)
- [Updating](#-updating)
- [Removal](#-removal)

---

### ✨ Overview

**Mirza Bot** is a powerful Telegram bot for automated VPN service sales, compatible with panels including **Marzban**, **3x-ui**, **Alireza**, **Hiddify**, **Pasarguard**, **IBSng**, and **MikroTik**.

Two editions are available:
1. **Free Version 🆓** — Core features for VPN sales
2. **Subscription Version 💎** — Advanced features for professional businesses

---

### ⚙️ Features

#### Free Version
- ✅ VPN purchase with automatic config creation
- ✅ View purchased services
- ✅ Trial accounts
- ✅ User support section
- ✅ Phone number verification
- ✅ Payment methods:
  - Card-to-card (admin confirmation)
  - **NowPayments gateway**
  - **aqayepardakht gateway**
- ✅ Fully automated config creation
- ✅ All protocols supported
- ✅ Mandatory channel membership for purchases
- ✅ Detailed purchase and trial account reports
- ✅ Tutorial section with admin-customizable content
- ✅ Wallet balance management via admin panel
- ✅ Multiple admin support
- ✅ Purchased service management:
  - Renewal
  - Extra volume purchase
  - Config retrieval
  - Subscription link delivery
- ✅ FAQ section
- ✅ Bot text customization
- ✅ Product and panel management
- ✅ Multiple username generation methods
- ✅ Protocol-based config settings
- ✅ Payment gateway management

---

### 🖥️ Supported Panels

| Panel | Auth Type | Notes |
|-------|-----------|-------|
| **Marzban** | JWT Token (auto) | v1 & v2 |
| **Marzneshin** | JWT Token (auto) | — |
| **3x-ui** (`x-ui_single`) | Bearer Token (manual) | [Config details ↓](#-3x-ui-panel-configuration) |
| **Alireza Panel** | Cookie (auto) | — |
| **Hiddify** | API Key | — |
| **Pasarguard** | — | — |
| **WGDashboard** | API Key | WireGuard |
| **IBSng** | — | — |
| **MikroTik** | — | — |
| **Manualsale** | — | Manual sales |

---

### 🔧 3x-ui Panel Configuration

The **3x-ui** panel uses **Bearer Token** authentication. To connect correctly:

#### 1. Get the API Token from 3x-ui
Inside your 3x-ui panel:
```
Settings → Security → API Token → Generate
```
Copy the generated token.

#### 2. Bot Configuration
When adding a new panel of type `x-ui_single`:

| Field | Value |
|-------|-------|
| **Panel URL** | `http://IP:PORT` (no trailing `/`) |
| **Token** | Bearer token copied from the panel |
| **Subscription URL** | `http://IP:PORT/sub` (no trailing `/`) |
| **Inbound ID** | Inbound ID in 3x-ui (integer, e.g. `3`) |

#### 3. Important Notes
- If you change the panel URL, the bot **automatically prompts** for the new Bearer token
- The token is stored in the `password_panel` column in the database
- Subscription links are built as `sub-url/subId` and are **permanently persisted** in the database after service creation, ensuring stable links across all views (purchase confirmation, My Services, etc.)

#### 4. How Subscription Links Work
When a service is created, a unique `subId` is generated and:
1. Sent to 3x-ui via the `clients/add` API
2. Saved to `invoice.uuid` in the database

When viewing the subscription link (in purchase confirmation or My Services), the bot reads `invoice.uuid` directly — no repeated API calls that could generate unstable links.

---

### 🚀 Installation

#### Prerequisites
- 🖥️ **Ubuntu 22** server
- 🌐 **Domain name** pointed to your server IP
- 🤖 **Telegram Bot Token** from [@BotFather](https://t.me/BotFather)
- 🆔 **Numeric Telegram Admin ID**

#### Automatic Installation
Run the following as **root** on your server:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

The installer will ask for:
- Domain name (e.g. `bot.example.com`)
- Email for SSL certificate
- Database name, username, and password
- Telegram bot token
- Admin Telegram ID (numeric)
- Bot username (without @)

Everything else is fully automatic: Apache, PHP 8.2, MySQL, SSL, webhook, and cron jobs.

---

### 🔄 Updating

To update to the latest version:

```bash
cd /var/www/mirzabot && git pull origin main
```

Or re-run the installer, which pulls the latest changes automatically:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

---

### ❌ Removal

To remove manually: stop Apache and MySQL, delete `/var/www/mirzabot`, and drop the database.

---

### 💵 Financial Support

If Mirza Bot has been helpful, support its development via cryptocurrency:

<a href="https://nowpayments.io/donation/permiumbotmirza">👉 Support the Project on NowPayments</a>

Your support ensures continued updates and improvements. Thank you! 🙌

### Contributors

![Contributors](https://contrib.rocks/image?repo=Samr002/mirzabot)
