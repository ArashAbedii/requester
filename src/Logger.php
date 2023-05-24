<?php

namespace ArashAbedii;

class Logger {

    private static $log_file_path='aa_requests.log';

    public static function doLog($url,$params=[],$type='get',array $headers=[],$response=null,$response_readers=null){
        

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

        file_put_contents(self::$log_file_path,$structure,FILE_APPEND);

    }
}