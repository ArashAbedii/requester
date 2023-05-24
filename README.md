# Request
## php class to send requests
### Simple & Fast & Very light

<br/>

### features

send GET , POST , PUT , PATCH , DELETE requests <br/>
send params in simple array <br/>
send headers in simple array <br/>
requests auto logging <br/>
error logger <br/>
send request without waiting for response <br/>

<br/>
<br/>

## Install via composer
<br/>
Go to your project root directory and run this command in terminal:

```
composer require arashabedii/requester 
```

<br/>
<br/>

## usage
```
# to enable request logging just pass $logger=true to send method
Request::send([string] url, [array] or [string] or [file context] params, [string] request type , [array] headers,[bool] logger); 
```
<br/>
<br/>

#### at first include autoload.php file to your project file  <br/>
```
require 'vendor/autoload.php'; 
```
#### after you can call Request::send() to send your requests. 

<br/><br/>

 ## examples: 
 
 <br/>

 **SEND GET REQUEST** <br />
 ```PHP
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

 ```
<br/><br/>


**SEND POST REQUEST** <br/>
 ```PHP
<?php
use ArashAbedii\Request;

require './vendor/autoload.php';

#------------------------------SIMPLE POST REQUEST---------------------------
$url="https://reqres.in/api/users";
$method='POST';
$params=[
    'name'=>'myname',
    'job'=>'myjob'
];
$headers=[
    'Content-Type'=>'application/json',
];
$logger=false; //enable or diable logging requests
$response=Request::send($url,$params,$method,$headers,$logger);

//show headers
echo $response->headers;
//show response body
echo $response->body;

 ```
<br/><br/>

**SEND PUT REQUEST** <br/>
 ```PHP
<?php
use ArashAbedii\Request;

require './vendor/autoload.php';

#------------------------------SIMPLE PUT REQUEST---------------------------
$url="https://reqres.in/api/users/2";
$method='PUT';
$params=[
    'name'=>'myname2',
    'job'=>'myjob2'
];
$headers=[
    'Content-Type'=>'application/json',
];
$logger=false; //enable or diable logging requests
$response=Request::send($url,$params,$method,$headers,$logger);

//show headers
echo $response->headers;
//show response body
echo $response->body;

 ```
<br/><br/>

**SEND PATCH REQUEST** <br/>
 ```PHP
<?php
use ArashAbedii\Request;

require './vendor/autoload.php';

#------------------------------SIMPLE PATCH REQUEST---------------------------
$url="https://reqres.in/api/users/2";
$method='PATCH';
$params=[
    'name'=>'myname2',
    'job'=>'myjob2'
];
$headers=[
    'Content-Type'=>'application/json',
];
$logger=false; //enable or diable logging requests
$response=Request::send($url,$params,$method,$headers,$logger);

//show headers
echo $response->headers;
//show response body
echo $response->body;

 ```
<br/><br/>

**SEND DELETE REQUEST** <br/>
 ```PHP
<?php
use ArashAbedii\Request;

require './vendor/autoload.php';

#------------------------------SIMPLE DELETE REQUEST---------------------------
$url="https://reqres.in/api/users/2";
$method='DELETE';
$params=[
    //no params or your params
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

 ```
<br/><br/>
