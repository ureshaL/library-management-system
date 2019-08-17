<?php


class DBConnection
{
    private $host='127.0.0.1';
    private $userName="root";
    private $password="12345";
    private $database="library_mgmt";
    private $port="3306";

    private $connection;

    /**
     * DBConnection constructor.
     */
    public function __construct()
    {
        $this->connection= new Mysqli($this->host,$this->userName,$this->password,$this->database,$this->port);
    }


    public function getConnection(){
        return $this->connection;
    }
}
