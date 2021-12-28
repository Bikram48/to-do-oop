<?php
    class AddTask extends Task {
        private $sucessMessage;
        function __construct($successMessage) {
            $this->successMessage=$successMessage;
        }

        public function successMessage() {
            echo "Data inserted successfully";
        }

        public function validationCheck() {
            if( empty($this->taskName) ) {
                echo "field is empty";
                return true;
            }
            return false;
        }
    }
  
