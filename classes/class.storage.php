<?php
class Storage
{
    private $db;
    private $app_vars;

    public function __construct($_db, $_app_vars)
    {
        $this->db = $_db;
        $this->app_vars = $_app_vars;
    }

    public function imagesUrl()
    {
        if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
            $protocol = 'http://'; 
        } else {
            $protocol = 'https://'; 
        }

        return $protocol . $_SERVER['HTTP_HOST'] . $this->app_vars['path'] . '/storage/images/';
    }
}
