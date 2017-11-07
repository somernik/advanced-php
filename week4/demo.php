<?php
    require_once("Student.php");
    require_once("Course.php");
    require_once("ITCourse.php");
    
    $jane = new Student();
    $jane->name = "Jane Aweseom Tutor";
    $jane->email = "jane@matc.edu";
    
    $calculus = new ITCourse();
    $calculus->title = "Calculus";
    $calculus->description = "horrible maths";
    $calculus->tutor = $jane;
    $calculus->location = "it building";
    
    echo $calculus;
?>
