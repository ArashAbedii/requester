<?php

    /**
     * @author      Mhmmdq <mhmmdq@mhmmdq.ir>
     * @copyright   Copyright (c), 2021 Mhmmdq
     * @license     MIT public license
     */

namespace ArashAbedii\Server;

class Logger {
    /**
     * We keep the log file storage location in this variable
     *
     * @var string
     */
    protected static $file_path = 'log.txt';

    /**
     * Define the __construct method privately to prevent the class from being constructed as an object
     * 
     */
    private function __construct()
    {
        
    }

    /**
     * Reload log file storage
     *
     * @param string $newPath
     * @return void
     */
    public static function changeLogPath($newPath) {

        self::$file_path = $newPath;

    }

    /**
     * Save the log in the file
     *
     * @param string $text
     * @return void
     */
    protected static function saveLog($text) {

        # Using mode a causes a file to be created in the absence of a file
        $file = fopen(self::$file_path , 'a');


        $date = date("F j, Y, g:i a");

        # A simple structure to make the log file more beautiful
        $string = "----------------- {$date} -----------------\n";
        $string .= "Error Mwssage: {$text}\n";
        $string .= "Timestamp: ".time()."\n";
        $string .= "----------------- {$date} -----------------\n\n\n";

        # Write to file and exit the file
        fwrite($file , $string);
        fclose($file);
    }

    

}