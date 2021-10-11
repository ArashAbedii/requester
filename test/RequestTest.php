<?php

require __DIR__ . '/../vendor/autoload.php';

use ArashAbedii\Server\Server;

class RequestTest {

    public static function test() {

        $url = 'https://mhmmdq.ir/requestTest.php';
        $params = [
            'name' => 'Mhmmdq',
            'email' => 'mhmmdq@mhmmdq.ir',
            'github' => 'mhmmdq'
        ];

        $request = new Server;
        echo $request->sendRequest($url , $params , 'post');


    }
}

RequestTest::test();