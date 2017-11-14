<?php

    /*
        Adv PHP
        Sarah Omernik
    */
    require_once("RequestManager.php");
    require_once("UserManager.php");
    $requestManager = new RequestManager();
    $userManager = new UserManager();
    
    $referer = $_SERVER['HTTP_REFERER'];


    if (preg_match('/test.php/', $referer)) {

        $users = $userManager->readall();

        $table = "<table><tr>" .
        "<th>Username</th><th>Create Count</th><th>Read Count</th><th>Read All Count</th><th>Update Count</th><th>Delete Count</th></tr>";

        foreach($users as $user) {

            $requests = $requestManager->countByUsername($user->username);
            $createCount = 0;
            $readCount = 0;
            $readAllCount = 0;
            $updateCount = 0;
            $deleteCount = 0;

            foreach($requests as $request) {
                $requestType = $request["requestType"];

                if ($requestType == "POST") {
                    $createCount += 1;
                } else if ($requestType == "GET") {
                    $readCount += 1;
                } else if ($requestType == "GET ALL") {
                    $readAllCount += 1;
                } else if ($requestType == "PUT") {
                    $updateCount += 1;          
                } else if ($requestType == "DELETE") {
                    $deleteCount += 1;          
                }
            }

            $table .= "<tr><td>" . $user->username . "</td><td>" . $createCount . "</td><td>" . $readCount . 
            "</td><td>" . $readAllCount . "</td><td>" . $updateCount . "</td><td>" . $deleteCount . "</td></tr>";
        }
   
        $table .= "</table>";
        
        echo "<h5>User Requests</h5>";
        echo $table;

    } else {
    
        $url = "test.php";
        header('Location: '.$url);
    
    }
    
?>
<style>
table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
