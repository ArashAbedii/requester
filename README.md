# SERVER
## php class to work on different web services (API)

### usage
to send all get and post requests we need to this static function : sendRequest(string url, array parameters, string request type= get or post, array headers);

 ### example:
 
 **SEND GET REQUEST** <br />
 $url="https://api.deezer.com/search"; <br />
 $params=['q'=>'back to you']; <br />
 $response=Server::sendRequest($url,$params,'get'); <br />


**SEND POST REQUEST** <br />
 $url="api url"; <br />
 $params=['parameters'=>'values']; <br />
 $response=Server::sendRequest($url,$params,'post'); <br />
