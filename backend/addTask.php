<?php
    class AddTask extends Task {
        public function successMessage() {
            echo "Data inserted successfully";
        }

        public function validationCheck() {
            if( empty($this->taskName) ) {
                return "field is empty";
            }
            return null;
        }
    }
  
