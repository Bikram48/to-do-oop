<?php
    class TaskRemover extends Task {
        public function successMessage() {
            echo '<script type="text/javascript">alert("Selected task has been deleted successfully");</script>';
        }

        public function validationCheck() {
            if ( empty( $this->taskName ) ) {
                return "field is empty";
            }

            return null;
        }
    }   
?>