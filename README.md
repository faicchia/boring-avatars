# Boring Avatars

[![Packagist](https://img.shields.io/packagist/v/faicchia/boring-avatars)](https://packagist.org/packages/faicchia/boring-avatars/)
[![Tests](https://github.com/faicchia/boring-avatars/actions/workflows/run-tests.yaml/badge.svg)](https://github.com/faicchia/boring-avatars/actions/workflows/run-tests.yaml)
[![Style](https://github.com/faicchia/boring-avatars/actions/workflows/php-cs-fixer.yaml/badge.svg)](https://github.com/faicchia/boring-avatars/actions/workflows/php-cs-fixer.yaml)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/faicchia/boring-avatars/blob/main/LICENSE.md)

Generate boring avatars in PHP.

## What is Boring Avatars?

> Boring avatars is a tiny JavaScript React library that generates custom, SVG-based avatars from any username and color palette.

To know more go visit the official [website](https://boringavatars.com/)

## Installation

```bash
composer require faicchia/boring-avatars
```
## Usage

```php
use Faicchia\BoringAvatars\BoringAvatar;

$avatar = BoringAvatar::make()
    ->size(60)
    ->variant('bauhaus')
    ->name('James Smith')
    ->colors(['#2c5545', '#063971', '#2f353b'])
    ->url();
// https://source.boringavatars.com/bauhaus/60/James+Smith?colors=2c5545,063971,2f353b
```
## Properties

| Prop    | Type                                                         |
| ------- | ------------------------------------------------------------ |
| size    | integer, `40px` (default)                           |
| name    | string                                                       |
| variant | oneOf: `marble` (default), `beam`, `pixel`,`sunset`, `ring`, `bauhaus` |
| colors  | array of colors                                              |