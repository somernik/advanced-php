<?php
    require_once("Invoice.php");
    require_once("InvoiceItem.php");

    class ProcessInvoice {
        private $invoice; // an Invoice type object
        
        private function createInvoiceItems() {

            $invoiceItems = array();
            
            // create items
            $itemOne = new InvoiceItem();
            $itemTwo = new InvoiceItem();
            $itemThree = new InvoiceItem();
            
            $itemOne->id = "1";
            $itemOne->quantity = 5;
            $itemOne->price = 5.50;
            $itemOne->description = "This is item one";
            
            $itemTwo->id = "2";
            $itemTwo->quantity = 4;
            $itemTwo->price = 9.50;
            $itemTwo->description = "This is item two";
            
            $itemThree->id = "3";
            $itemThree->quantity = 2;
            $itemThree->price = 15.50;
            $itemThree->description = "This is item three";
            
            //add items to array
            array_push($invoiceItems,$itemOne);
            array_push($invoiceItems,$itemTwo);
            array_push($invoiceItems,$itemThree);

            // set array to invoice
            //$this->invoice->items = $invoiceItems;
            $this->invoice->__set("items", $invoiceItems);
        }
        
        public function runProcess() {
            $this->invoice = new Invoice();

            $this->createInvoiceItems();
            
            //$this->invoice->calculateInvoice();
            // calculateInvoice called in displayInvoice function
            
            $this->invoice->displayInvoice();
            
        }
    }
?>