<?php
    require "db_connect.php";
    class Task {
        protected $taskId;
        protected $taskName;
        protected $db_connection;
        
        function __construct( $taskId, $taskName ) {
            $this->taskId = $taskId;
            $this->taskName = $taskName;
            $this->db_connection = new DbConnection();
        }

        public function addTask() {
            $query = $this->db_connection->getDatabase()->prepare( "INSERT INTO todotask(taskname) VALUES(?)" );
            $query->bind_param( "s",$this->taskName );
            $query->execute();
        }

        public function retrieveTask() {
            $query = $this->db_connection->getDatabase()->prepare("SELECT * FROM todotask");
            $query->bind_result( $id,$task_name );
            $query->execute();
            $data = array();
            while( $query->fetch() ) {
                $data += array($id => $task_name); 
            }

            return $data;
        }

        public function deleteTask() {
            $query = $this->db_connection->getDatabase()->prepare( "DELETE FROM todotask WHERE id=? ");
            $query->bind_param( "i",$this->taskId );
            $query->execute();
        }

        public function editTask() {
            $query = $this->db_connection->getDatabase()->prepare( "UPDATE FROM todotask SET taskname=? WHERE id=?" );
            $query->bind_param("si",$this->taskName,$this->taskId);
            $query->execute();
        }
    }
