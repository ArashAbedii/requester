<?php

require 'Server.php';

//SEND GET REQUEST
$url="https://api.deezer.com/search";
$params=['q'=>'back to you'];
$response=Server::sendRequest($url,$params,'GET');

echo '<pre>';
var_dump(json_decode($response,true));
echo '</pre>';
