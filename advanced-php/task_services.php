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
                $requestManager->updateCounts($_POST['username'], "createCount");
            
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
                    $requestManager->updateCounts($_GET['username'], "readCount");
                    if (sizeof($task) == 1 ){
                        echo "$task[0] <br />";
                    }
            }
            else if(isset($_GET['username']) && !$userManager->checkUsername($_GET['username']))
            {
                     
                    $tasks = $taskManager->readAll();
                    $requestManager->updateCounts($_GET['username'], "readallCount");
                    foreach($tasks as $currentTask) {
                        echo "$currentTask <br />";
                    }
            
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
                $requestManager->updateCounts($putVars['username'], "updateCount");
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
                $requestManager->updateCounts($deleteVars['username'], "deleteCount");
                // to test use curl
                // curl -X DELETE -d id=2 localhost/week9/studentService.php
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
