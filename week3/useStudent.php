<?php
    require_once('Student.php');    
    
    $jane = new Student(); // instance of student
    $john = new Student(); // another instance
    
    // With public access to instance variables
    //$jane->id = 1;
    //$john->id = 2;
    
    //echo "Jane's student id is : $jane->id <br/>";
    //echo "John's student id is : $john->id <br/>";
    
    // Getters and setters
    $jane->setId(3);
    $john->setId(4);
    
    echo "Jane's student id is : {$jane->getId()} <br/>";
    echo "John's student id is : {$john->getId()} <br/>";
    
?>
