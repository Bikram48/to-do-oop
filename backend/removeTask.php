<?php
    class TaskRemover extends Task {
        public function successMessage() {
            echo '<script type="text/javascript">alert("Selected task has been deleted successfully");</script>';
        }

        public function getValidationError() {
            return "Please select any task to perform this action";
        }
    }   
?>
