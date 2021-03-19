# SERVER
## php class to work on different web services (API)

### usage
Server::sendRequest(string url, array parameters, string request type= get or post, array headers); <br />

at first include ServerClass.php file to your project file  <br />
like: **require 'lib/ServerClass.php';** <br />
after you can call Server::sendRequest() to send your requests. <br />
**Notice**: Make sure that the config.php file is next to the ServerClass.php file. <br />

 ### examples: 
 
 **SEND GET REQUEST** <br />
 $url="https://api.deezer.com/search"; <br />
 $params=['q'=>'back to you']; <br />
 $response=Server::sendRequest($url,$params,'get'); <br />


**SEND POST REQUEST** <br />
 $url="api url"; <br />
 $params=['parameters'=>'values']; <br />
 $response=Server::sendRequest($url,$params,'post'); <br />


**SEND POST REQUEST WITH HEADERS** <br />
  $url="https://api.spotify.com/v1/artists/SPOTIFY_ARTIST_ID "; <br />
  $request_type="get"; <br />
  $headers=['Authorization'=>'Bearer **SPOTIFY_ACCESS_TOKEN**']; <br />
  //send request <br />
  $response=Server::sendRequest($url,[],$request_type,$headers); <br />
