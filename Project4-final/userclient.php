<?php
    require ('vendor/autoload.php');

    $client = new GuzzleHttp\Client();

    $url = "http://localhost/Project4-first/user_services.php";


    if (isset(isset($_POST['username']) && isset($_POST['password']))
    {

        $options = ['query'=>['username'=>$_POST['username'], 'password'=>$_POST['password']]];
        $responseType = "POST";        
        
        try {
            
            $response = $client->request($responseType, $url, $options);
            $response_body = $response->getBody();

        } catch (RequestException $ex) {
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($ex->getRequest());
            echo "</pre>";
        }

        echo "HTTP Request User Service: $message <br/>";
        echo "<pre>";
        print_r($response_body->getContents());
        echo "</pre>";
        echo "<a href='test.php'>Go Back</a>";
    } else {
        echo "Invalid request parameters.";       
    }
    
   
?>
