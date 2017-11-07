<?php
    // Adv. PHP Project 1
    // Sarah Omernik
    // 9/8/2017

    $referer = $_SERVER['HTTP_REFERER'];
    //$formSite = "http://localhost/project1/createUser.html";

    if (preg_match('/createUser.html/', $referer) && isset($_POST['submit'])) {
    
        $inputs = createInputArray();
        
        echo createOutput($inputs);
    
    } else {
    
        $url = "createUser.html";
        header('Location: '.$url);
    
    }
    
    function createInputArray() {
    
        $email = checkForUndefinedIndex('email');
        $password = checkForUndefinedIndex('password');
        $city = checkForUndefinedIndex('city');
        $state = checkForUndefinedIndex('state');
        $zip = checkForUndefinedIndex('zip');
        $offer = checkForUndefinedIndex('offer');
        $terms = checkForUndefinedIndex('terms');
        
        $inputs[] = array('display' => 'Email', 'value' => $email);
        $inputs[] = array('display' => 'Password', 'value' => $password);
        $inputs[] = array('display' => 'City', 'value' => $city);
        $inputs[] = array('display' => 'State', 'value' => $state);
        $inputs[] = array('display' => 'Zip', 'value' => $zip);
        $inputs[] = array('display' => 'Email Offers', 'value' => $offer);
        $inputs[] = array('display' => 'Terms & Conditions', 'value' => $terms);
        
        return $inputs;
    }
    
    function checkForUndefinedIndex($input) {
        if (empty($_POST[$input])) {
            return '';
        } else {
            return $_POST[$input];
        }
    }
    
    function createOutput($inputs) {
        $output = "<ol>";

        foreach($inputs as $input) {
           
            $output .= "<li>" . $input['display'] . ": " . $input['value'] . "</li>";
            
        }

        $output .= "</ol>";
        
        return $output;
    }
?>
