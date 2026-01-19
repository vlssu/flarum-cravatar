- **简体中文**
- [English](./README-en.md)

# Cravatar

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/vlssu/flarum-cravatar.svg)](https://packagist.org/packages/vlssu/flarum-cravatar) 

![Extiverse](https://extiverse.com/extension/vlssu/flarum-cravatar/open-graph-image)

[Flarum](http://flarum.org) 扩展。将 [cravatar](https://cravatar.cn/) 头像添加到您的论坛。  
修改自 [ianm/gravatar](https://discuss.flarum.org/d/27930-gravatar)。

### 特点

- 通过使用 Cravatar 提供的头像来源从而节省磁盘空间
- 可以选择保留或替换已上传到论坛的现有头像
- （可选）允许用户在 Cravatar 与上传到论坛的头像之间切换
- 支持 Cravatar 的多个默认头像
- 使用所选默认设置中的一个来覆盖用户设置的头像的选项
- 支持 Cavatar 的内容评级
- 可通过论坛代理来获取 Cavatar 的头像图片

##### 待办

- 添加对 Cravatar 个人资料字段的支持

### 安装

使用 composer 安装:

```sh
composer require vlssu/flarum-cravatar:"*"
```

### 更新

```sh
composer update vlssu/flarum-cravatar:"*"
php flarum migrate
php flarum cache:clear
```

### 链接

- [Packagist](https://packagist.org/packages/vlssu/flarum-cravatar)
- [GitHub](https://github.com/vlssu/flarum-cravatar)
- [Discuss](https://discuss.flarum.org/d/31885)