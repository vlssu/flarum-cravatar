- [简体中文](./README.md)
- **English**

# Cravatar

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/vlssu/flarum-cravatar.svg)](https://packagist.org/packages/vlssu/flarum-cravatar) 

![Extiverse](https://extiverse.com/extension/vlssu/flarum-cravatar/open-graph-image)

A [Flarum](http://flarum.org) extension. Add [cravatar](https://cravatar.cn/) avatars to your forum.  
Modified from [ianm/gravatar](https://discuss.flarum.org/d/27930-gravatar).

### Features

- Save on disk space by using Cravatar avatars stored remotely
- Option to keep or replace existing avatars already uploaded to your forum
- (Optional) Let users switch between their Cravatar image and the avatar uploaded to the forum
- Supports multiple Cravatar default sets
- Option to override a user-set Cravatar with one from the chosen default set
- Support for restricting Cravatars to their content rating
- Proxy fetching cravatar images via the forum

##### TO-DO

- Add support for Cravatar profile fields

### Installation

Install with composer:

```sh
composer require vlssu/flarum-cravatar:"*"
```

### Updating

```sh
composer update vlssu/flarum-cravatar:"*"
php flarum migrate
php flarum cache:clear
```

### Links

- [Packagist](https://packagist.org/packages/vlssu/flarum-cravatar)
- [GitHub](https://github.com/vlssu/flarum-cravatar)
- [Discuss](https://discuss.flarum.org/d/31885)