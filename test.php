<?php

require 'Server.php';


//SEND GET REQUEST
$url="https://cat-fact.herokuapp.com/facts/random";
$params=['animal_type'=>'cat','amount'=>5];
$response=Server::sendRequest($url,$params,'GET');

echo '<pre>';
var_dump(json_decode($response,true));
echo '</pre>';
