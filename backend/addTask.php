<?php
    class AddTask extends Task {
        private $message;
        // function __construct($message)
        // {
        //     $this->message=$message;
        // }
        public function successMessage() {
            echo '<script type="text/javascript">alert("New task has been added successfully");</script>';
        }

        public function validationCheck() {
            if ( empty($this->taskName) ) {
                return "field is empty";
            }

            return null;
        }
    }
  
