<?php

class connect_db
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $this->conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USERNAME,PASSWORD);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new connect_db();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}


?>