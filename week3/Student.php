
<?php
    // Week 3 Lecture
    // Magic Methods & Class review
    
    class Student {
        private $id;
        private $name;
        private $email;
        
        // Accessor methods or getter/setters
        
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
        }
    }
?>
