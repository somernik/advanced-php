<?php
    class Student {
        //Instance variables
        private $name;
        private $email;
       
        
        // Magic get/set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }
        
        //Serialize
        public function __toString() {
            return sprintf("<hr/>Name: %s<br/>Email: %s<br/>", $this->__get("name"), $this->__get("email"));
        }
    }
?>
