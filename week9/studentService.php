<?php
    require_once("StudentManager.php");

    $httpVerb = $_SERVER['REQUEST_METHOD'];     //POST, GET, PUT, DELETE
    $studentManager = new StudentManager();

    switch ($httpVerb) {
        case "POST":
            if (isset($_POST['name']) && $_POST['email']){
                $name = $_POST['name'];
                $email = $_POST['email'];
            
                $studentManager->create($name, $email);
            } else {
                throw new Exception("Invalid HTTP POST request params");
            }
            break;

        case "GET":
            
            if(isset($_GET['id'])) {
                $studentManager->readById($_GET['id']);
            } else {
                $studentManager->read();
            }
            break;

        case "PUT":

            parse_str(file_get_contents("php://input"), $udpateVars);
            
            if (isset($udpateVars['id']) && isset($udpateVars['name']) && isset($udpateVars['email'])){
                $id = $udpateVars['id'];
                $name = $udpateVars['name'];
                $email = $udpateVars['email'];
                $studentManager->update($id, $name, $email);
            } else {
                throw new Exception("Invalid HTTP UPDATE request params");
            }

            break;

        case "DELETE":
            parse_str(file_get_contents("php://input"), $deleteVars);

            if (isset($deleteVars['id'])){
                $id = $deleteVars['id'];
                $studentManager->delete($id);
            } else {
                throw new Exception("Invalid HTTP DELETE request params");
            }
            
            // to test use curl
            // curl -X DELETE -d id=2 localhost/week9/studentService.php

            break;

        default:
            // Throw exception
            throw new Exception("Unsupported HTTP request");
            break;
    }
?>