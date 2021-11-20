<?php


class Server{

    private static $err=false; 

    //USAGE SEND REQUEST FUNCTION

    public static function sendRequest($url,array $params=[],$type='get',array $headers=[],$return_header=false){

        //check valid data

        self::validateUrl($url);

        self::validHeaders($headers);

        self::validType($type);



        if(self::$err==true){

            echo "ERR! Check ErrHandler.log file on your project directory\n";

            return FALSE;

        }

        return self::createRequest($url,strtoupper($type),$params,$headers,$return_header);

    }

    private static function createRequest($url,$type='get',$params=[],$headers=[],$return_header=false){
        $ch=curl_init();
        if(is_array($params)){
            curl_setopt($ch,CURLOPT_URL,$url.Server::changeArrayToGetFormat($params));
        }elseif(strtolower($type)=='post'){
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }else{
            file_put_contents("ErrHandler.log","\nERR MESSAGE: Parameter format is incorrect. You should send array or binary format !\t".date("d M Y H:i:s"),FILE_APPEND);
            echo "ERR! Check ErrHandler.log file on your project directory\n";
            return false;
        }
        
        if($return_header){
            curl_setopt($ch,CURLOPT_HEADER,1);
        }
        
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$type);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);

        $result=curl_exec($ch);
        curl_close($ch);
       
        return $result;

    }

    //SEND REQUEST WITHOUT RESPONSE

    public static function sendRequestWithoutResponse($url,$type='get',$params=[],$headers=[]){
        $ch=curl_init();
        if(is_array($params)){
            curl_setopt($ch,CURLOPT_URL,$url.Server::changeArrayToGetFormat($params));
        }elseif(strtolower($type)=='post'){
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }else{
            file_put_contents("ErrHandler.log","\nERR MESSAGE: Parameter format is incorrect. You should send array or binary format !\t".date("d M Y H:i:s"),FILE_APPEND);
            echo "ERR! Check ErrHandler.log file on your project directory\n";
            return false;
        }
        
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$type);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);
        curl_setopt($ch,CURLOPT_TIMEOUT,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);

        $result=curl_exec($ch);
        curl_close($ch);
       
        return $result;
    }




    //MAKING VALID FORMAT



    private static function changeArrayToGetFormat($params){

        $output=''; 

        foreach($params as $key=>$value){
            $value=str_replace(" ","%20",$value);
            $output.=$key."=".$value."&";

        }

        return "?".trim($output,"&"); //return GET format (?a=1&b=2&c=3)

    }



    private static function changeArrayToHeaderFormat($headers){

        $output=array();

        foreach($headers as $key=>$value){

            $output[]="$key: $value";

        }

        return $output; //return array of headers format (["Referer: https://www.google.com/","Content-type: audio/mpeg"])

    }





    //CHECK VALIDATE INPUTS

    private static function validateUrl($url){

        if(empty($url)){

            file_put_contents("ErrHandler.log","\nERR MESSAGE: Url required !\t".date("d M Y H:i:s"),FILE_APPEND);

            self::$err=true;

        }

        if(!filter_var($url,FILTER_VALIDATE_URL)){

            file_put_contents("ErrHandler.log","\nERR MESSAGE: Invalid url format !\t".date("d M Y H:i:s"),FILE_APPEND);

            self::$err=true;

        }

    }




    private static function validHeaders($headers){

        if(!is_array($headers)){

            file_put_contents("ErrHandler.log","\nERR MESSAGE: Invalid headers format! headers format should be an array\t".date("d M Y H:i:s"),FILE_APPEND);

            self::$err=true;

        }

    }



    private static function validType($reqtype){

        if(empty($reqtype)){

            file_put_contents("ErrHandler.log","\nERR MESSAGE: Request type required! put GET or POST or etc type\t".date("d M Y H:i:s"),FILE_APPEND);

            self::$err=true;

        }

    }







}
