<?php
require './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use d52b8\telegram\Bot;

class BotTest extends TestCase
{
    public function testSendMessage()
    {
        $config = require './config.php';
        $message = 'Hello, world!';
        $bot = new Bot($config);
        $response = $bot->sendMessage($message);
        $this->assertEquals($message, json_decode($response)->result->text);
    }
}
