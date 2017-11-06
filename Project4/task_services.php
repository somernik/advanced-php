<?php
    require_once("TaskManager.php");
    
    $httpVerb = $_SERVER['REQUEST_METHOD']; // POST, GET, PUT, DELETE
    
    $taskManager = new TaskManager();
    
    switch ($httpVerb)
    {
        case "POST":
            // Create
            if  (isset($_POST['desc']))
            {
                $desc = $_POST['desc'];
                echo "create";
                //echo $taskManager->create($desc);
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            break;
            
        case "GET":
            // Read
            header("Content-Type: application/json");
            if (isset($_GET['id'])) // Read (by Id)
            {
                //echo $taskManager->read($_GET['id']);
                echo "read id";
            }
            else
            {
                echo "read all";
                //echo $taskManager->readAll();
            }
            break;
            
        case "PUT":
            // Update
            parse_str(file_get_contents("php://input"), $putVars);
            
            if (isset($putVars['id']))
            {
                $id = $putVars['id'];
                $newDesc = $putVars['desc'];
                echo "update";
                //echo $taskManager->update($id, $newDesc);
            }
            else
            {
                throw new Exception("Invalid HTTP PUT request parameters.");
            }
            
            break;
            
        case "DELETE":
            // Delete
            parse_str(file_get_contents("php://input"), $deleteVars);
            
            if (isset($deleteVars['id']))
            {
                $id = $deleteVars['id'];
                echo "delete";
                //echo $taskManager->delete($id);
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
