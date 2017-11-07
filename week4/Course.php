<?php
    require_once("Student.php");
    class Course {
        //Instance variables
        private $title;
        private $tutor;
        private $description;
        
        public function __contruct() {
            $this->tutor = new Student();
        }
        
        // Magic get/set
        public function __get($ivar) {
            // lazy loading when getting a tutor
            if ($ivar == 'tutor') {
                if (!isset($this->$ivar)) {
                    $this->__set('tutor', new Student());
                }
            }
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }
        
        //Serialize
        public function __toString() {
            return sprintf("<hr/>Title: %s<br/>Description: %s<br/>Tutor: %s<br/>", $this->__get("title"), $this->__get("description"), $this->__get("tutor"));
        }
    }
?>
