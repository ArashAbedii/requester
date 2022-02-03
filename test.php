<?php

use ArashAbedii\Server;

require 'Server.php';

$url="http://localhost:8005/app.php";
$type="post";
$params=['q'=>'hello','param2'=>1];

$headers=['Content-Type'=>'application/json'];

echo '<pre>';
echo Server::sendRequest($url,$params,$type,$headers);
echo '</pre>';
