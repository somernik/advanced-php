<?php
    require_once("UserManager.php");
    require_once("RequestManager.php");
    
    $httpVerb = $_SERVER['REQUEST_METHOD']; // POST, GET, PUT, DELETE
    
    $userManager = new UserManager();
    //$requestManager = new RequestManager();    
    
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
                    
                    $id = $userManager->create($username, $passwordHashed);
                    //$requestManager->create($username);
                    
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

        default:
            throw new Exception("Unsupported HTTP request");
            break;
    }
?>
