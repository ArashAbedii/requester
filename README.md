# SERVER
## php class to work on different web services (API)

### usage
to send all get and post requests we need to this static function : sendRequest(string url, array parameters, string request type= get or post, array headers);

 ### examples:
 
 **SEND GET REQUEST** <br />
 $url="https://api.deezer.com/search"; <br />
 $params=['q'=>'back to you']; <br />
 $response=Server::sendRequest($url,$params,'get',['']); <br />


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
