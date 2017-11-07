<?php
    if (isset($_POST['terms'])) {
        $pic = $_FILES['pic'];
        $email = $_POST["email"];
        $password = $_POST["password"];
          
        $inputs = array();
                
        $inputs[] = array('display' => 'Email', 'value' => $email);
    
    
        $inputs[] = array('display' => 'Password', 'value' => $password);
        //$inputs[] = array('display' => 'City', 'value' => $_POST["city"]);
        //$inputs[] = array('display' => 'State', 'value' => $_POST["state"]);
        //$inputs[] = array('display' => 'Zip', 'value' => $_POST["zip"]);
        //$inputs[] = array('display' => 'Email Offers', 'value' => $_POST["offer"]);
        //$inputs[] = array('display' => 'Terms & Conditions', 'value' => $_POST["terms"]);

        //$output = "<ol>";
        $output = "<br />";

        foreach($inputs as $input) {
           
            //$output .= "<li>" . $input['display'] . ": " . $input['value'] . "</li>";
            $output .= $input['display'] . ": " . $input['value'] . "<br />";
            
        }

        //$output .= "</ol>";
        print_r($pic);
        
        echo $output;
        
        move_uploaded_file($pic["tmp_name"], "uploads/" . $pic['name']);
    
    } else {
    
        $url = "form_bootstrap_example.html";
        header('Location: '.$url);
    
    }
?>
