
<?php
    // Week 3 Lecture
    // Magic Methods & Class review
    // can use magic methods if
    // final class (no inheritance)
    // creating crud object & all values mutables
    // in general dont use...
    
    class StudentMagic {
        private $id;
        private $name;
        private $email;
            
        // Constructor - if no defiend, php makes. if made, php no makes
        //public function __construct() {
        public function __construct($id) { 
            echo "hello";
            $this->__set("id", $id);
        }
        
        
        
        // Non Magic method - to string
        //public function toString() {
        //    return sprintf("Id: %s<br/>Name: %s<br/>Email: %s<br/>", $this->id, $this->name, $this->email);
           
        //}     
        
        // Magic method - to string
        public function __toString() {
            return sprintf("Id: %s<br/>Name: %s<br/>Email: %s<br/>", $this->__get("id"), $this->__get("name"), $this->__get("email"));
        }  
        
        // Magic methods instead of getter/setter
        public function __get($ivar) {
            // $ivar = "id", "name', "email"
            return $this->$ivar; // Normally we would not use a $ after the ->
            // $ivar will evaluate to an expression equal to "id", "name' or "email" 
        }
        
        public function __set($ivar, $value) {
            //Custom validation requires if/else... not so good
            
            
            $this->$ivar = $value;
        }
        
        // Accessor methods or getter/setters
        /*
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getId() {
            return $this->id;
        }
        
       public function setName($name) {
            $this->name = $name;
        }
        
        public function getName() {
            return $this->name;
        }
        
       public function setEmail($email) {
            $this->email = $email;
        }
        
        public function getEmail() {
            return $this->email;
        }*/
        
       
    }
?>
