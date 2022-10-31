# Cravatar

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/vlssu/flarum-cravatar.svg)](https://packagist.org/packages/vlssu/flarum-cravatar) 

![Extiverse](https://extiverse.com/extension/vlssu/flarum-cravatar/open-graph-image)

A [Flarum](http://flarum.org) extension. Add [cravatar](https://cravatar.cn/) avatars to your forum.  
Modified from [ianm/gravatar](https://discuss.flarum.org/d/27930-gravatar).

### 产品特点 / Features

- Save on disk space by using Cravatar avatars stored remotely
- Option to keep or replace existing avatars already uploaded to your forum
- Supports multiple Cravatar default sets
- Option to override a user-set Cravatar with one from the chosen default set
- Support for restricting Cravatars to their content rating
- Proxy fetching cravatar images via the forum

##### 待办事项 / TO-DO

- Allow users to switch between cravatar and forum uploaded avatar, with admin option to enable/disable
- Add support for Cravatar profile fields

### 安装 / Installation

Install with composer:

```sh
composer require vlssu/flarum-cravatar:"*"
```

### 更新 / Updating

```sh
composer update vlssu/flarum-cravatar:"*"
php flarum migrate
php flarum cache:clear
```

### 链接 / Links

- [Packagist](https://packagist.org/packages/vlssu/flarum-cravatar)
- [GitHub](https://github.com/vlssu/flarum-cravatar)
