<?php
    class Database{
        private $host = "localhost:3307";
        private $username = "root";
        private $password = "";
        private $db_name = "dbQLNV";
        public $conn;
  
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
    }
?>