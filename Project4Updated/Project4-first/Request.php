<?PHP
    class Request {
        private $id;
        private $username;
        private $requestType;

        // Magic get/set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }

        public function __toString() {
            return sprintf("<hr/>Username: %s<br/>Request Type: %s<br/>", $this->__get("username"), $this->__get("requestType"));
        }
    }
?>
