<?php
    require_once "db_connect.php";
    class Task {
        private $taskId;
        private $taskName;
        private $db_connection;
        function __construct( $taskId,$taskName ) {
            $this->taskId = $taskId;
            $this->taskName = $taskName;
            $this->db_connection = new DbConnection();
        }

        protected function addData() {
            $query = $this->db_connection->getDatabase()->prepare( "INSERT INTO todo-oop(taskname) VALUES(?)" );
            $query->bind_param( "s",$this->taskName );
            $query->execute();
            echo "Inserted successfully";
        }
    }