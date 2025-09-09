# 🚀 CryptoFX OneSignal Notifications

**Real-time push notifications for your Flarum crypto & forex trading community**

[![Flarum](https://img.shields.io/badge/flarum-%5E1.0-blue)](https://flarum.org)
[![OneSignal](https://img.shields.io/badge/OneSignal-Web%20Push-red)](https://onesignal.com)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

---

## 📊 **Perfect For Trading Communities**

- **Crypto Trading Forums** - Bitcoin, Ethereum, DeFi signals
- **Forex Communities** - Currency pair alerts  
- **Trading Signal Groups** - Real-time market notifications
- **Investment Forums** - Breaking news alerts

---

## ⚡ **Key Features**

### 🎯 **Smart Signal Detection**
- **Auto-detects crypto signals** → Adds ₿ Bitcoin emoji
- **Identifies forex pairs** → Adds 💱 Currency emoji  
- **General trading posts** → Adds 📊 Chart emoji

### 🚀 **Instant Notifications**
- **Real-time push** to all subscribers
- **Works on desktop & mobile** browsers
- **High priority delivery** for time-sensitive signals
- **Custom notification sounds** (configurable)

### 🔧 **Easy Setup**
- **4 files only** - minimal footprint
- **OneSignal integration** - enterprise-grade delivery
- **Admin panel configuration** - no coding required
- **Automatic user subscription** - seamless UX

---

## 📦 **Installation**

### **Method 1: Manual Installation**

```bash
# 1. Create extension directory
mkdir -p extend/cryptofx-onesignal

# 2. Download extension files
# (Download all files from this repository to the directory above)

# 3. Enable extension
php flarum extension:enable cryptofxsignal-flarum-onesignal

# 4. Clear cache
php flarum cache:clear
