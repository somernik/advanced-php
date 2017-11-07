<?php
    require_once('InvoiceItem.php');

    class Invoice {
        private $items; // for InvoiceItems
        private $invoiceTotal;
        
        public function __get($ivar) {
            return $this->$ivar;
        }
        
        public function __set($ivar, $value) {
            $this->$ivar = $value;
        }
        
        private function calculateInvoice() {
            // loop through the items and call their total funciton to get the total total
            foreach ($this->items as $item) {
                $this->invoiceTotal += $item->calculateItemTotal();
            }
            
        }
        
        public function displayInvoice() {
            $this->calculateInvoice(); // calculate total of all items

           // loop through the items and call their display function
            foreach ($this->items as $item) {
                echo $item; // Calls the toString method of the object
            }

            //print total 
            printf("Invoice Total: $%01.2f", $this->invoiceTotal);
            //echo 'Invoice Total: $' . number_format($this->total, 2); // Does not work in windows apparently

        }
    }
?>
