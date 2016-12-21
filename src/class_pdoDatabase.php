<?php

class pdoDatabase {

    private $CONFIG = array(
        'user' => 'user',
        'password' => 'password',
        'server' => 'server',
        'database' => 'database',
        'logfile.txt' => 'logfile',
        'www.example.com' => 'errorReturnURL',
        'true' => 'logEnabled'
    );

    private $requestElement = '';       // Need the requested Database-Connection-Element for logfile, if it not initialised - the class don´t work ;)

    public function __construct($element) {
        if(empty($this->requestElement)) {
            $this->requestElement = $element;
        }
    }

    private function writeLogFile($STRING) {
        if(isset($STRING)) {
            $OPEN = fopen($this->CONFIG['logfile'], 'a+');
            $WRITE = fwrite($OPEN, '<p><b>['.date('d.m.Y | H:i:s').']</b> <i>['.$this->requestElement.']</i> '.$STRING.'</p>');
            if($WRITE != false) {
                fclose($OPEN);
                return true;
            } else {
                fclose($OPEN);
                return false;
            }
        } else {
            return false;
        }
    }

    private function getElementState() {
        if(!isset($this->requestElement)) {
            $this->writeLogFile('Can´t found requestet Element!, connection denied!');
            return false;
        } else {
            return true;
        }
    }

    public function linkDB() {

    }


}
?>