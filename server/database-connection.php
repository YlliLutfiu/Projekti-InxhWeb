<?php 

class DBConnection{
    private $server="localhost:3308";
    private $username="root";
    private $password="";
    private $database="bite";


    function startConnection(){
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->database;",$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Connection Failed ".$e.getMessage();
            return null;
        }
    }
}

?>