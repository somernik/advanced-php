<?php
    class InvoiceItem {
        
        private $id;
        private $quantity;
        private $price;
        private $description;
        
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }
        
        public function calculateItemTotal() {
            //echo $this->quantity . "<br />" . $this->price . "<br />";
            $total = $this->quantity * $this->price;
            //echo "total " . $total . "<br />";
            
            return $total;
        }
        
        public function __toString() {
            // display string 
            return "Item ID: " . $this->id . ", Quantity: " . $this->quantity
                . ", Price: " . sprintf("$%01.2f", $this->price) . ", Description: " . $this->description
                . ", Total Cost: " . sprintf("$%01.2f", $this->calculateItemTotal()) . "<br />";
        }
        
    }
?>