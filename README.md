# 🚀 Multi-Chain Token Payment for Flarum

[![Latest Version](https://img.shields.io/packagist/v/cryptopay/flarum-token-payment.svg?style=flat-square)](https://packagist.org/packages/cryptopay/flarum-token-payment)
[![Total Downloads](https://img.shields.io/packagist/dt/cryptopay/flarum-token-payment.svg?style=flat-square)](https://packagist.org/packages/cryptopay/flarum-token-payment)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

Accept **any ERC20 token** on **any EVM blockchain** as payment for forum points/credits. Fully automated with blockchain verification and instant point crediting.

## 🌐 **Supported Blockchains**

| Network | Chain ID | Explorer | API |
|---------|----------|----------|-----|
| **Ethereum** | 1 | etherscan.io | ✅ |
| **BNB Smart Chain** | 56 | bscscan.com | ✅ |
| **Polygon** | 137 | polygonscan.com | ✅ |
| **Avalanche** | 43114 | snowtrace.io | ✅ |
| **Arbitrum One** | 42161 | arbiscan.io | ✅ |
| **Optimism** | 10 | optimistic.etherscan.io | ✅ |
| **Fantom** | 250 | ftmscan.com | ✅ |
| **Cronos** | 25 | cronoscan.com | ✅ |
| **Gnosis Chain** | 100 | gnosisscan.io | ✅ |
| **Moonbeam** | 1284 | moonscan.io | ✅ |

> **Want more chains?** Open an issue - we add new EVM chains regularly!

## 💫 **Key Features**

### 🔗 **Multi-Chain Support**
- **Any EVM blockchain** - Ethereum, BSC, Polygon, Avalanche, and more
- **Any ERC20 token** - USDC, USDT, DAI, LINK, custom tokens
- **Automatic API selection** - Smart routing to correct explorer

### ⚡ **Instant Automation**
- **Auto-verification** - Blockchain confirmations checked automatically
- **Auto-crediting** - Points added to account immediately after verification
- **Real-time status** - Users see confirmation progress live

### 🛡️ **Enterprise Security**
- **Blockchain verification** - Every payment verified on-chain
- **Confirmation requirements** - Configurable block confirmations (default: 3)
- **Duplicate prevention** - No transaction can be used twice
- **Amount validation** - Exact token amounts verified
- **Rate limiting** - Prevents spam and abuse

### 🎨 **User Experience**
- **One-click payments** - Simple modal interface
- **Chain detection** - Shows current network and token
- **Progress tracking** - Real-time verification status
- **Transaction links** - Direct links to blockchain explorer
- **Mobile responsive** - Works on all devices

## 🚀 **Installation**

### Via Composer (Recommended)
```bash
composer require cryptopay/flarum-token-payment:"*"
php flarum migrate
php flarum cache:clear
