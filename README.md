## A simple class for sending http requests
Send http requests and receive answers easily with a few lines by this class; This class is just a simple example that can be turned into a more professional software with your help

# How to use
In the first step, install the software package with composer (if you do not know what composer is, [click here](https://code.tutsplus.com/tutorials/what-is-composer-for-php-and-how-to-install-it--cms-35160 "click here"))

### Installation with Composer
Run this command on your command line (make sure composer is installed)
```bash
composer require arashabedii/server
```
### Add depending on the application
Now by loading the autoload.php file created in the Vendor folder you will have access to the class. Create and use an object from the class
```php
<?php

require __DIR__ . '/vendor/autoload.php';
use ArashAbedii\Server\Server;

$url = 'https://mhmmdq.ir/requestTest.php';
$params = [
	'name' => 'Mhmmdq',
	'email' => 'mhmmdq@mhmmdq.ir',
	'github' => 'mhmmdq'
];

$request = new Server;
echo $request->sendRequest($url , $params , 'post');
```

### Submit a request
In general, to send a request to the server, you must use the `sendRequest` method, which accepts the following inputs:

`$url` The first and only mandatory entry of the string in which the destination of the request is placed

`$params` An array in which the parameters sent to the destination are placed as keys and values ​​and can be empty

`$method` The method of sending a request to the destination is equal to `get` by default, but can be changed

`$headers` If you need to send a special header to the destination, you can enter it as a key and value array

```php
$request->sendRequest('https://mhmmdq.ir/requestTest.php' , [
    'username'=>'mhmmdq' ,
    'password'=>'xxxxxxxx'] , 'post');
```
#### Send a request directly with the get method
You can send your request directly using the get command

```php
echo $request->get($url , $params);
```

#### Send a request directly with the post method
You can send your request directly using the post command

```php
echo $request->post($url , $params);
```

### Errors And Logs
If there is an error while performing a variable called `haveError` will be converted to `true` and the entire list of errors will be placed in a variable called `errors`. Also, all errors will be recorded in a file whose location and name can be changed.

```php
if($request->haveError) {
	var_dump($request->errors);
}
```

##### Specify the log file address
You can change the storage location of the file as shown below
```php
Server::changeLogPath(__DIR__ . 'log.txt');
```

### Move user to a new location
```php
$request->redirect('https://google.com');
```

