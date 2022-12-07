# SERVER
## php class to work on different web services (API)

<br/>

## v3.1
### what's news?
Added requests logger <br>
All requests log will be store in requests.log file


<br/>
<br/>

#### Install via composer
<br/>
Go to your project root directory and run this command in terminal:

```
composer require arashabedii/server 
```

<br/>
<br/>

## usage
```
Server::sendRequest(string url, array or string or file context, string request type= get or post or put ... , array headers,bool return headers=true or false); 
```

<br/>
<br/>

#### at first include autoload.php file to your project file  <br/>
```
require 'vendor/autoload.php'; 
```
#### after you can call Server::sendRequest() to send your requests. 

<br/><br/>

 ## examples: 
 
 <br/>

 **SEND GET REQUEST** <br />
 ```PHP
  <?php

      require './vendor/autoload.php';

      use ArashAbedii\Server;

      //SEND GET REQUEST
      $url="https://cat-fact.herokuapp.com/facts/random";
      $params=['animal_type'=>'cat','amount'=>5];
      $response=Server::sendRequest($url,$params,'GET');

      echo '<pre>';
      var_dump(json_decode($response,true));
      echo '</pre>';

 ```
<br/><br/>


**SEND POST REQUEST** <br/>
```PHP
  <?php

      require './vendor/autoload.php';

      use ArashAbedii\Server;

      //SEND POST REQUEST
      $url="https://api.example.com/method";
      $params=['parameter1'=>'1','parameter2'=>2];
      $response=Server::sendRequest($url,$params,'POST');

      echo '<pre>';
      var_dump(json_decode($response,true));
      echo '</pre>';

```

<br/><br/>

**SEND PUT REQUEST** <br/>
```PHP
  <?php

      require './vendor/autoload.php';

      use ArashAbedii\Server;

      //SEND PUT REQUEST
      $url="https://api.example.com/method";
      $params=['parameter1'=>'1','parameter2'=>2];
      $response=Server::sendRequest($url,$params,'PUT');

      echo '<pre>';
      var_dump(json_decode($response,true));
      echo '</pre>';

```

<br/><br/>

**SEND DELETE REQUEST** <br/>
```PHP
  <?php

      require './vendor/autoload.php';

      use ArashAbedii\Server;

      //SEND DELETE REQUEST
      $url="https://api.example.com/method";
      $params=['parameter1'=>'1','parameter2'=>2];
      $response=Server::sendRequest($url,$params,'DELETE');

      echo '<pre>';
      var_dump(json_decode($response,true));
      echo '</pre>';

```

<br/><br/>


**SEND POST REQUEST WITH HEADERS**  <br/>

  ```PHP
  <?php

      require './vendor/autoload.php';

      use ArashAbedii\Server;

      //SEND POST REQUEST
      $url="https://api.example.com/v1/method";
      $headers=['Authorization'=>'Bearer ACCESS_TOKEN'];
      $params=[];
      //send request
      $response=Server::sendRequest($url,[],$request_type,$headers); 

      echo '<pre>';
      var_dump(json_decode($response,true));
      echo '</pre>';

```
