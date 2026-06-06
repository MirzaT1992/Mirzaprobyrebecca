# 🤖 Bot Mirza Panel


A Powerful Bot for Selling VPN Services with Auto Configuration Build.

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

## 📚 Table of Contents

- [✨ Overview](#-overview)
- [⚙️ Features](#️-features)
- [🚀 Installation](#-installation)
  - [Beta Installation](#️-beta-installation)
  - [Updating the Bot](#-updating-bot)
  - [Removing the Bot](#-removing)
- [💵 Financial Support](#-financial-support)

---

## ✨ Overview

**Mirza Bot** is a feature-rich Telegram bot designed for selling VPN services for platforms like **Marzban**,**3x-ui panels**,**alireza panels**,**pasarguard**,**ibsng**,.... This bot simplifies the process of VPN subscription sales, enabling seamless automation, configuration building, and user management.

Mirza Panel comes in two versions:  
1. **Free Version** 🆓: Offers basic functionalities to get started with VPN sales.  
2. **Subscription Version** 💎: Provides advanced features for businesses looking for more customization, detailed analytics, and enhanced management options.  

Whether you're offering trial accounts or managing large-scale VPN services, this bot covers everything you need to run a successful VPN business.

---

## ⚙️ Features

### 🔹 **Free Version Features**

- ✅ VPN Purchase with Auto Configuration Creation
- ✅ View Purchased Services
- ✅ Trial Accounts for Users
- ✅ User Support Section
- ✅ Verification via Phone Number
- ✅ Payments via:
  - Card-to-Card
  - **NowPayments Gateway**
  - **aqayepardakht Gateway**
- ✅ Fully Automated Configuration Creation
- ✅ Compatibility with All Protocols
- ✅ Mandatory Channel Membership for Purchases
- ✅ Detailed Purchase and Trial Account Reports
- ✅ Tutorial Section with Admin-Customizable Content
- ✅ Balance Management via Admin Panel
- ✅ Multiple Admin Support
- ✅ Manage Purchased Services:
  - Renewals
  - Additional Volume Purchases
  - Configuration Retrieval
  - Updating Service Links
- ✅ FAQ Section
- ✅ Text Customization from the Bot
- ✅ Product and Panel Management
- ✅ Admin-Specified Username Generation Methods
- ✅ Configuration Settings Based on Protocols
- ✅ Gateway Management

---

### 🔹 **Subscription Version Features**

In addition to the features of the Free Version.
To read the details, please refer to the link below.

📌 **Subscription Purchase Guide**: [View Guide](https://t.me/mirzaperimium/4)

---

## 🚀 Installation

### Prerequisites

Ensure you have the following before installation:
- 🖥️ **Ubuntu Server 22**
- 🌐 **A Domain Name** pointed to your server IP
- 🤖 **A Telegram Bot Token** (from [@BotFather](https://t.me/BotFather))
- 🆔 **Your numeric Telegram Admin ID**

### 🔧 Installing the Bot

Run the following command as **root** on your server:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

The installer will ask you for:

- Domain name (e.g. `bot.example.com`)
- Email for SSL certificate
- Database name, username, and password
- Telegram bot token
- Admin Telegram ID (numeric)
- Bot username (without @)

Everything else is fully automatic: Apache, PHP 8.2, MySQL, SSL, webhook, and cron jobs.

---

## 🔄 Updating the Bot

To update to the latest version, simply re-run the installer:

```bash
curl -o install.sh -L https://raw.githubusercontent.com/Samr002/mirzabot/main/install.sh && bash install.sh
```

The script will pull the latest changes with `git pull` if the bot is already installed.

---

## ❌ Removing the Bot

To remove the bot manually, stop Apache and MySQL, then delete `/var/www/mirzabot` and drop the database.

---

## 💵 Financial Support

If you find **Mirza Panel** helpful and would like to support its development, you can make a financial contribution via cryptocurrency.

<a href = "https://nowpayments.io/donation/permiumbotmirza">👉 Support the Project on NowPayments</a>

Your support ensures continued updates and improvements for this project. Thank you! 🙌

### Contributors

![Contributors](https://contrib.rocks/image?repo=Samr002/mirzabot)
