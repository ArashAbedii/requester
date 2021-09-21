# SERVER
## php class to work on different web services (API)

<br/>

## full update in v2
### what's news?
Added other types of HTTP requests such as PUT, PATCH, DELETE <br>
updated send requests without response <br>
return headers with responses <br> to get headers with response, put true in 5th parameter of sendRequest method





<br>
<br>

## usage
```
Server::sendRequest(string url, array parameters, string request type= get or post or put ... , array headers,bool return headers=true or false); 
```

<br/><br/>

#### at first include Server.php file to your project file  <br/>
```
require 'Server.php'; 
```
#### after you can call Server::sendRequest() to send your requests. 

<br/><br/>

 ## examples: 
 
 <br/>

 **SEND GET REQUEST** <br />
 ```PHP
  <?php

      require 'Server.php';

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

      require 'Server.php';

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

      require 'Server.php';

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

      require 'Server.php';

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

      require 'Server.php';

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
