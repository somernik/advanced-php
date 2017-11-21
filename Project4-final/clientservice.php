<?php
    require ('vendor/autoload.php');
    require_once("UserManager.php");

    $client = new GuzzleHttp\Client();
    $userManager = new UserManager();

    $url = "http://localhost/Project4-first/task_services.php";

    $requestType = $_GET["submit"];
    $runRequest = true;
    
    switch($requestType)
    {
        case "readAll":
            if (isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {

                $options = ['query'=>['username'=>$_GET['username']]];
                $responseType = "GET";
                $message = "Read All";
            } else {
                echo "Invalid request parameters."; 
                $runRequest = false;              
            }
            break;
            
        case "readById":
        
            if (isset($_GET['readid']) && isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {
                $options = ['query'=>['readid'=>$_GET['readid'], 'username'=>$_GET['username']]];
                $responseType = "GET";
                $message = "Read by ID " . $_GET['readid'];

            } else {
                echo "Invalid request parameters.";
                $runRequest = false;               
            }
            
            break;
            
        case "update":
            if (isset($_GET['updateid']) && isset($_GET['newdesc']) && isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {
                $options = ['form_params'=>['id'=>$_GET['updateid'], 'newdesc'=>$_GET['newdesc'], 'username'=>$_GET['username']]];
                $responseType = "PUT";
                $message = "Update ID=" . $_GET['updateid'] . " Desc=" . $_GET['newdesc'];

            } else {
                echo "Invalid request parameters.";
                $runRequest = false;               
            }
            break;
            
        case "delete":
            if (isset($_GET['deleteid']) && isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {
                $options = ['form_params'=>['id'=>$_GET['deleteid'], 'username'=>$_GET['username']]];
                $responseType = "DELETE";
                $message = "Delete ID=" . $_GET['deleteid'];

            } else {
                echo "Invalid request parameters.";  
                $runRequest = false;             
            }
            break;
            
        case "create":
            if  (isset($_GET['desc']) && isset($_GET['username']) && !$userManager->checkUsername($_GET['username'])) 
            {
           
                $options = ['form_params'=>['username'=>$_GET['username'], 'desc'=>$_GET['desc']]];
                $responseType = "POST";
                $message = "Create Desc=" . $_GET['desc'];
            } else {
                echo "Invalid request parameters.";
                $runRequest = false;               
            }
            
            break;
            
        default:
            $runRequest = false;
            echo "There was a problem please try again";
            break;
    }

    if ($runRequest) {
        try {
            
            $response = $client->request($responseType, $url, $options);
            $response_body = $response->getBody();

        } catch (RequestException $ex) {
            echo "HTTP Request failed\n";
            echo "<pre>";
            print_r($ex->getRequest());
            echo "</pre>";
        }

        echo "HTTP Request Task Service: $message <br/>";
        echo "<pre>";
        echo json_decode($response_body);
        echo "</pre>";
        echo "<a href='test.php'>Go Back</a>";
    }
   
?>
