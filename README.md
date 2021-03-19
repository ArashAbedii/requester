# SERVER
# php class to work on different web services (API)

# usage
to send all get and post requests we need to this static function : sendRequest(string url, array parameters, request type= get or post, array headers);

 # example: 
 //SEND GET REQUEST
$url="https://api.deezer.com/search";
$params=['q'=>'back to you'];
$response=Server::sendRequest($url,$params,'get');
