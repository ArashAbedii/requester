<?php

//github: https://github.com/arashabedii

class Server{

    private static $err=false; 

    //USAGE SEND REQUEST FUNCTION

    public static function sendRequest($url,$params=[],$type='get',array $headers=[],array $options=[],$return_header=false){

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

    private static function createRequest($url,$type='get',$params=[],$headers=[],$options=[],$return_header=false){
        
        $ch=curl_init($url);

        //params
        if(in_array('json',$options)){
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($params));
        }elseif(is_array($params) || is_object($params)){
            curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($params));
        }else{
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }

        //header
        if($return_header){
            curl_setopt($ch,CURLOPT_HEADER,1);
        }

        //headers
        if($headers){
            $headers=self::changeArrayToHeaderFormat($headers);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        }


        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$type);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);

        $result=curl_exec($ch);

        curl_close($ch);
       
        return $result;
        
    }

    //SEND REQUEST WITHOUT RESPONSE

    public static function sendRequestWithoutResponse($url,$type='get',$params=[],$headers=[]){

        $ch=curl_init($url);

        //params
        if(is_array($params) || is_object($params)){
            curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($params));
        }else{
            curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
        }


        //headers
        if($headers){
            $headers=self::changeArrayToHeaderFormat($headers);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        }

        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,$type);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,false);
        curl_setopt($ch,CURLOPT_TIMEOUT,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);

        $result=curl_exec($ch);
        curl_close($ch);
       
        return true;
    }




    //MAKING VALID FORMAT

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
