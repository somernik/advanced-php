<?PHP
    class Task {
        private $id;
        private $desc;

        // Magic get/set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }

        public function __toString() {
            return sprintf("<hr/>Id: %s<br/>Description: %s<br/>", $this->__get("id"), $this->__get("desc"));
        }
    }
?>