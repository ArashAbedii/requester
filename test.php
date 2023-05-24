<?php
use ArashAbedii\Request;

require './vendor/autoload.php';

#------------------------------SIMPLE GET REQUEST---------------------------
$url="https://reqres.in/api/users";
$method='GET';
$params=[
    'delay'=>1,
];
$headers=[
    'Content-Type'=>'application/json',
];
$logger=true; //enable or diable logging requests
$response=Request::send($url,$params,$method,$headers,$logger);

//show headers
echo $response->headers;
//show response body
echo $response->body;




#------------------------------SIMPLE POST REQUEST---------------------------
// $url="https://reqres.in/api/users";
// $method='POST';
// $params=[
//     'name'=>'myname',
//     'job'=>'myjob'
// ];
// $headers=[
//     'Content-Type'=>'application/json',
// ];
// $logger=false; //enable or diable logging requests
// $response=Request::send($url,$params,$method,$headers,$logger);

// //show headers
// echo $response->headers;
// //show response body
// echo $response->body;




#------------------------------SIMPLE PUT REQUEST---------------------------
// $url="https://reqres.in/api/users/2";
// $method='PUT';
// $params=[
//     'name'=>'myname2',
//     'job'=>'myjob2'
// ];
// $headers=[
//     'Content-Type'=>'application/json',
// ];
// $logger=false; //enable or diable logging requests
// $response=Request::send($url,$params,$method,$headers,$logger);

// //show headers
// echo $response->headers;
// //show response body
// echo $response->body;



#------------------------------SIMPLE PATCH REQUEST---------------------------
// $url="https://reqres.in/api/users/2";
// $method='PATCH';
// $params=[
//     'name'=>'myname2',
//     'job'=>'myjob2'
// ];
// $headers=[
//     'Content-Type'=>'application/json',
// ];
// $logger=true; //enable or diable logging requests
// $response=Request::send($url,$params,$method,$headers,$logger);

// //show headers
// echo $response->headers;
// //show response body
// echo $response->body;



#------------------------------SIMPLE DELETE REQUEST---------------------------
// $url="https://reqres.in/api/users/2";
// $method='DELETE';
// $params=[
//     //no params or your params
// ];
// $headers=[
//     'Content-Type'=>'application/json',
// ];
// $logger=true; //enable or diable logging requests

// $response=Request::send($url,$params,$method,$headers,$logger);

// //show headers
// echo $response->headers;
// //show response body
// echo $response->body;


