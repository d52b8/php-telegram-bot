# telegram-bot

## About

Simple Telegram Bot

## How to install?

``` shell
composer require "d52b8/telegram-bot"
```

## How to use?

* Replace `<TOKEN>` and `<CHAT_ID>` with your value

``` php
<?php
require './vendor/autoload.php';

use d52b8\telegram\Bot;

$config = [
    'token' => '<TOKEN>',
    'chat_id' => '<CHAT_ID>'
];
$message = 'Hello, world!';
$bot = new Bot($config);
$response = $bot->sendMessage($message);
```

## How to test?

* Copy `./config.bak.php` to `./config.php`
* Replace `<TOKEN>` and `<CHAT_ID>` with your value
* Run
    composer test
