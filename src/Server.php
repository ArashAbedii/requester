<?php
    /**
     * A class for sending data to other servers and working with the api
     * 
     * 
     * @author      ArashAbedii <arashabedi998@gmail.com>
     * @author      mhmmdq <mhmmdq@mhmmdq.ir>
     * @copyright   Copyright (c), 2021 ArashAbedii
     * @license     MIT public license
     */
namespace ArashAbedii\Server;

class Server extends Logger{

    /**
     * If a problem occurs, the value changes to true
     *
     * @var boolean
     */
    protected  $haveError = false; 

    /**
     * The target url for sending data and receiving output is in this variable
     *
     * @var string
     */
    protected $url;

    /**
     * The values ​​to be sent to the url are included in this array
     *
     * @var array
     */
    protected $params = [];

    /**
     * The method of sending values ​​to the url is included in this presentation
     *
     * @var string
     */
    protected $method;

    /**
     * Headers that need to be sent to the url are included in this presentation
     *
     * @var array
     */
    protected $headers = [];

    /**
     * curl is kept in this variable
     *
     * @var curl
     */
    public $curlInit;

    /**
     * Proxies are maintained for connection in this presentation
     *
     * @var array
     */
    protected $proxy = [];

    /**
     * All errors are stored in this variable
     *
     * @var array
     */
    protected $errors = [];

    public function __construct()
    {
        if (!extension_loaded('curl')) {
            self::saveLog('cURL library is not loaded');
            throw new \Exception('cURL library is not loaded');
        }

        $this->curlInit = curl_init();
    }

    /**
     * Send a request to the desired url
     *
     * @param string $url
     * @param array $params
     * @param string $type
     * @param array $headers
     * @return string
     */
    public function sendRequest(string $url, array $params = [], string $method = 'get', array $headers = []) {

        # Check inputs
        $this->checkInputs(['url' => $url]);

        if(!$this->haveError) {

            $this->url = $url;
            $this->params = $params;
            $this->method = strtoupper($method);
            $this->headers = $headers;

            return $this->createRequest()->exec();
            
        }
    }
    /**
     * Make a request ready to send
     *
     * @return void
     */
    protected function createRequest() {
        
        
        
        if($this->method == "GET") {
            $this->url .= "?" . http_build_query($this->params);
        }

        curl_setopt($this->curlInit , CURLOPT_URL , $this->url);

        if($this->method == "POST") {
            $this->sendPostRequest();
        }

        if(!empty($this->headers)) {
            $this->useCustomHeader();
        }



        
        curl_setopt($this->curlInit, CURLOPT_RETURNTRANSFER, true);

        return $this;

    }
    /**
     * If the method is post, the requirements apply
     *
     * @return void
     */
    protected function sendPostRequest() {

        curl_setopt($this->curlInit , CURLOPT_POST , 1);
        curl_setopt($this->curlInit , CURLOPT_POSTFIELDS , $this->params);

    }

    /**
     * Headers apply if the user has a specific header to send
     *
     * @return void
     */
    protected function useCustomHeader() {

        curl_setopt($this->curlInit , CURLOPT_HTTPHEADER , $this->headers);

    }

    /**
     * Executes the output and returns the result
     *
     * @return string
     */

    public function exec() {

        return curl_exec($this->curlInit);
        curl_close($this->curlInit);

    }


    /**
     * Examines the inputs
     *
     * @param array $inputs
     * @return void
     */
    protected function checkInputs(array $inputs)
    {
        
        extract($inputs);

        if(!isset($url) && !filter_var($url , FILTER_VALIDATE_URL)) {

            $this->haveError = true;
            $this->errors[]  = 'A valid url is required';
            self::saveLog('A valid url is required');

        }


    }
    
    /**
     * Undocumented function
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return string
     */
    public function post(string $url , array $params = [] , array $headers = []) {

        # Check inputs
        $this->checkInputs(['url' => $url]);

        if(!$this->haveError) {

            $this->url = $url;
            $this->params = $params;
            $this->method = "POST";
            $this->headers = $headers;

            return $this->createRequest()->exec();
            
        }

    }






}
