<?php
    require_once("TaskManager.php");
    require_once("UserManager.php");
    require_once("RequestManager.php");
    
    $httpVerb = $_SERVER['REQUEST_METHOD']; // POST, GET, PUT, DELETE
    
    $taskManager = new TaskManager();
    $userManager = new UserManager();
    $requestManager = new RequestManager();
    
    switch ($httpVerb)
    {
        case "POST":
            // Create
            if  (isset($_POST['desc']) && isset($_POST['username']) && !$userManager->checkUsername($_POST['username']))
            {
                $desc = $_POST['desc'];

                echo $taskManager->create($desc);
                $requestManager->create($_POST['username'], "POST");
            
            }else if (!isset($_POST['username']) || $userManager->checkUsername($_POST['username'])) {
                echo "Please make sure you have signed up for an account and are using valid username in your request";
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            break;
            
        case "GET":
            // Read 

            if (isset($_GET['readid']) && isset($_GET['username']) && !$userManager->checkUsername($_GET['username'])) // Read (by Id)
            {
        
                    $task = $taskManager->read($_GET['readid']);
                    $requestManager->create($_GET['username'], "GET");
                    echo json_encode($task, JSON_PRETTY_PRINT);
                    
            }
            else if(isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {
                     
                $tasks = $taskManager->readAll();
                $requestManager->create($_GET['username'], "GET ALL"); 
                echo json_encode($tasks, JSON_PRETTY_PRINT);

            
            }else if (!isset($_GET['username']) || $userManager->checkUsername($_GET['username'])) {
                echo "Please make sure you have signed up for an account and are using valid username in your request";
            } else {
                throw new Exception("Invalid HTTP GET request parameters.");               
            }
            break;
            
        case "PUT":
            // Update
            parse_str(file_get_contents("php://input"), $putVars);
            
            if (isset($putVars['id']) && isset($putVars['newdesc']) && isset($putVars['username']) && !$userManager->checkUsername($putVars['username']))
            {
                $id = $putVars['id'];
                $newDesc = $putVars['newdesc'];
                echo $taskManager->update($id, $newDesc);
                $requestManager->create($putVars['username'], "PUT");
            }
            else if (!isset($putVars['username']) || $userManager->checkUsername($putVars['username'])) {
                echo "Please make sure you have signed up for an account and are using valid username in your request";
            }
            else
            {
                throw new Exception("Invalid HTTP PUT request parameters.");
            }
            
            break;
            
        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $deleteVars);
            
            if (isset($deleteVars['id']) && isset($deleteVars['username']) && !$userManager->checkUsername($deleteVars['username']))
            {
                $id = $deleteVars['id'];
                echo $taskManager->delete($id);
                $requestManager->create($deleteVars['username'], "DELETE");
                // to test use curl
                // curl -X DELETE -d id=2 ec2-13-59-56-143.us-east-2.compute.amazonaws.com/Project4/task_services.php
                // curl -X DELETE -d "id=2&username=sarah" ec2-13-59-56-143.us-east-2.compute.amazonaws.com/Project4/task_services.php
            }else if (!isset($deleteVars['username']) || $userManager->checkUsername($deleteVars['username'])) {
                echo "Please make sure you have signed up for an account and are using valid username in your request";
            }
            else
            {
                throw new Exception("Invalid HTTP DELETE request parameters.");
            }
            break;
            
        default:
            throw new Exception("Unsupported HTTP request");
            break;
    }
?>
