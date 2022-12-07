<?php

namespace ArashAbedii;

class Logger {

    public static function doLog($url,$params=[],$type='get',array $headers=[],$return_header=false,$response=null,$response_readers=null){
        
        // $structure=[
        //     'request_url'=>$url,
        //     'request_method'=>strtoupper($type),
        //     'parameters'=>$params,
        //     'headers'=>$headers,
        //     'return_headers_key'=>$return_header,
        //     'response'=>$response,
        //     'response_headers'=>$response_readers,
        //     'request_date'=>date("Y-m-d H:i:s"),
        // ];

        $http_code=!empty($response_readers->http_code) ? $response_readers->http_code : null;

        $response=json_encode($response,JSON_UNESCAPED_UNICODE);
        if(strlen($response)>500){
            $response=substr($response,0,100).' ....';
        }

        $structure="";
        $structure.="request_url: ".$url;
        $structure.="\nrequest_method: ".$type;
        $structure.="\nstatus: ".$http_code;
        $structure.="\nresponse: ".$response;
        $structure.="\nrequest_date: ".date("Y-m-d H:i:s");
        $structure.="\n------------------------\n";

        file_put_contents('requests.log',$structure,FILE_APPEND);

    }
}