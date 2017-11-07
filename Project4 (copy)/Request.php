<?PHP
    class Request {
        private $id;
        private $username;
        private $createCount;
        private $readCount;
        private $readallCount;
        private $updateCount;
        private $deleteCount;

        // Magic get/set
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }

        public function __toString() {
            return sprintf("<hr/>Username: %s<br/>Create: %s<br/>Read: %s<br/>Read All: %s<br/>Update: %s<br/>Delete: %s<br/>", $this->__get("username"), $this->__get("createCount"), $this->__get("readCount"), $this->__get("readallCount"), $this->__get("updateCount"), $this->__get("deleteCount"));
        }
    }
?>
