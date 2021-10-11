<?php

include __DIR__ . '/../vendor/autoload.php';

use ArashAbedii\Server\Logger;

class LogTest extends Logger{

    public static function SimpleTest() {
        
        self::changeLogPath(__DIR__ . '/myTestLogFile.txt');
        self::saveLog("A test of how to create a log file and write to it");

    }

}

LogTest::SimpleTest();