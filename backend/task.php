<?php
    require "db_connect.php";
    class Task {
        protected $taskId;
        protected $taskName;
        //protected $db_connection;
        function __construct( $taskId,$taskName ) {
            $this->taskId = $taskId;
            $this->taskName = $taskName;
            echo $this->taskName;
            //$this->db_connection = new DbConnection();
        }

        public function addTask() {
            echo $this->taskName;
            $db_connection=new DbConnection();
            $query = $db_connection->getDatabase()->prepare( "INSERT INTO todotask(taskname) VALUES(?)" );
            $query->bind_param( "s",$this->taskName );
            $query->execute();
            echo "Inserted successfully";
        }
    }