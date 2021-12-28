<?php
    class EditTask extends Task {
         public function successMessage() {
            echo '<script type="text/javascript">alert("Selected task has been updated successfully");</script>';
        }

        public function validationCheck() {
            if ( empty( $this->taskName ) ) {
                return "please fill the field first";
            }

            return null;
        }
    }