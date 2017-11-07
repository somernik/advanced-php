<?php
    require_once('StudentMagic.php');    
    
    $jane = new StudentMagic(7); // instance of student
    $john = new StudentMagic(8); // another instance
    
    // With public access to instance variables
    //$jane->id = 1;
    //$john->id = 2;
    
    //echo "Jane's student id is : $jane->id <br/>";
    //echo "John's student id is : $john->id <br/>";
    
    // Getters and setters
    //$jane->setId(3);
    //$john->setId(4);
    
    //echo "Jane's student id is : {$jane->getId()} <br/>";
    //echo "John's student id is : {$john->getId()} <br/>";
    
    // with magic methods
    //$jane->id = 1;
    $jane->name = "Jane";
    $jane->email = "j@matc.edu";
    
    //$john->id = 2;
    $john->name = "John";
    $john->email = "j2@matc.edu";
    
    //echo "Jane's student id is : $jane->id <br/>";
    //echo "John's student id is : $john->id <br/>";
    
    //echo "Ja's name is : $jane->name <br/>";
    //echo "Jo's name is : $john->name <br/>";
    
    //echo "Ja's email is : $jane->email <br/>";
    //echo "Jo's email is : $john->email <br/>";
    
    //echo $jane->toString();
    //echo $john->toString();
    
    echo $jane;
    echo $john;
    
?>
