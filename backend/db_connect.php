<?php
    class DbConnection{
        private $hostname="localhost";
        private $username="root";
        private $password="";
        private $database="todo-oop";
        private $db_connection;
        public function __construct(){
            $this->db_connection=mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            if(mysqli_connect_errno()){
                echo "Connection failed";
            }
        }

        public function getDatabase(){
            return $this->db_connection;
        }
    }
    $obj=new DbConnection();
