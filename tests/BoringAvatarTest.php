<?php

declare(strict_types=1);

namespace Faicchia\BoringAvatars\Tests;

use Faicchia\BoringAvatars\BoringAvatar;

beforeEach(
    fn() => $this->avatar = BoringAvatar::make()
);

it('returns an instance', function () {
    expect( $this->avatar )
        ->toBeInstanceOf(BoringAvatar::class);
});

it('can assign default properties values', function () {
    $size = getProtectedPropertyValue($this->avatar, 'size');
    $name = getProtectedPropertyValue($this->avatar, 'name');
    $variant = getProtectedPropertyValue($this->avatar, 'variant');
    $colors = getProtectedPropertyValue($this->avatar, 'colors');
    $baseUrl = getProtectedPropertyValue($this->avatar, 'baseUrl');

    expect($size)->toBe(40)
        ->and($name)->toBe('')
        ->and($variant)->toBe('marble')
        ->and($colors)->toBe('')
        ->and($baseUrl)->toBe('https://source.boringavatars.com');
});

it('can set size property', function () {
    $this->avatar->size(100);

    $size = getProtectedPropertyValue($this->avatar, 'size');

    expect($size)->toBe(100);
});

it('can set name property', function () {
    $this->avatar->name('Mario Rossi');

    $name = getProtectedPropertyValue($this->avatar, 'name');

    expect($name)->toBe('Mario+Rossi');
});

it('can set variant property', function () {
    $this->avatar->variant('pixel');

    $variant = getProtectedPropertyValue($this->avatar, 'variant');

    expect($variant)->toBe('pixel');
});

it('can set variant property to "marble" if wrong value is provided', function () {
    $this->avatar->variant('wrong-value');

    $variant = getProtectedPropertyValue($this->avatar, 'variant');

    expect($variant)->toBe('marble');
});

it('can set colors property', function () {
    $this->avatar->colors(['#2C5545', '063971', '2f353b']);

    $colors = getProtectedPropertyValue($this->avatar, 'colors');

    expect($colors)->toBe('2c5545,063971,2f353b');
});

it('can generate the url with colors', function () {
    $url = $this->avatar
        ->size(60)
        ->variant('bauhaus')
        ->name('Mario Rossi')
        ->colors(['#2C5545', '063971', '2f353b'])
        ->url();
    
    expect($url)->toBe('https://source.boringavatars.com/bauhaus/60/Mario+Rossi?colors=2c5545,063971,2f353b');
});

it('can generate the url without colors', function () {
    $url = $this->avatar
        ->size(60)    
        ->variant('bauhaus')
        ->name('Mario Rossi')
        ->url();
    
    expect($url)->toBe('https://source.boringavatars.com/bauhaus/60/Mario+Rossi');
});