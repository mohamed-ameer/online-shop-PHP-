<?php

class MySql{
    private $servername;
    private $db_username;
    private $db_password;
    private $db_name;

    protected function connect(){
        $this->servername = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->db_name = 'online_shop';

        $conn = new mysqli($this->servername,$this->db_username,$this->db_password,$this->db_name);
        return $conn;
    }
} 

?>