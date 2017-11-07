<?php
    require_once("Course.php");
    
    class ITCourse extends Course {
    
        //private $location;
        public $location;
        
        public function __toString() {
            $out = parent::__toString();
            
            // magic get dont work with inheritance
            //$out .= sprintf("<br />Location: %s", $this->__get("location"));
            $out .= sprintf("<br />Location: %s", $this->location);
            
            return $out;
        }
        
    }
?>
