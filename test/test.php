<?php

require '../vendor/autoload.php';
use ArashAbedii\Server\Server;

$url="http://localhost:8001/hello";
$type="put";
$params=['q'=>1,'b'=>2];
$headers=['Accept'=>'application/json'];

echo '<pre>';
echo Server::sendRequest($url,$params,$type,$headers);
echo '</pre>';
