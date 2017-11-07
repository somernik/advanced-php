<?php
    require_once("UserManager.php");
    require_once("RequestManager.php");
    
    $httpVerb = $_SERVER['REQUEST_METHOD']; // POST, GET, PUT, DELETE
    
    $userManager = new UserManager();
    $requestManager = new RequestManager();    
    
    switch ($httpVerb)
    {
        case "POST":
            // Create
            if  (isset($_POST['username']) && isset($_POST['password']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

                if ($userManager->checkUsername($username)) {

                    //$passwordConfirm = password_verify($password, $passwordHashed);
                    //echo "  confirmed?  " . $passwordConfirm;
                    
                    $id = $userManager->create($username, $passwordHashed);
                    $requestManager->create($username);
                    
                    echo $id;
                } else {
                    echo "That username is taken, please choose another <a href='test.php'>here</a>";
                }
            }
            else
            {
                throw new Exception("Invalid HTTP POST request parameters.");
            }
            break;
           /* 
        case "GET":
            // Read
            header("Content-Type: application/json");
            if (isset($_GET['readid'])) // Read (by Id)
            {
                //echo $taskManager->read($_GET['id']);
                echo '{"read id":"id here"}';
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
                $newDesc = $putVars['newdesc'];
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
            */
        default:
            throw new Exception("Unsupported HTTP request");
            break;
    }
?>
