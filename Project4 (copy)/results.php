<?php

    /*
        Adv PHP
        Sarah Omernik
    */
    require_once("RequestManager.php");
    $requestManager = new RequestManager();

    $results = $requestManager->readall();
    
    $table = "<table><tr>" .
        "<th>Username</th><th>Create Count</th><th>Read Count</th><th>Read All Count</th><th>Update Count</th><th>Delete Count</th></tr>";
        
    foreach($results as $request) {
        $table .= "<tr><td>" . $request->username . "</td><td>" . $request->createCount . "</td><td>" . $request->readCount . "</td><td>" . $request->readallCount . "</td><td>" . $request->updateCount . "</td><td>" . $request->deleteCount . "</td></tr>";
    }
    
    $table .= "</table>";
    
    echo $table;

/*
    require_once("TaskManager.php");
    $taskManager = new TaskManager();


    $referer = $_SERVER['HTTP_REFERER'];

    if (preg_match('/test.php/', $referer)) {
    
        if (isset($_POST['add']) && isset($_POST['desc'])) {
            $desc = $_POST['desc'];
            $createId = $taskManager->create($desc);
            echo "Id of created task: $createId <br />";
        }

        if (isset($_POST['delete']) && isset($_POST['deleteid'])) {
            $taskID = $_POST['deleteid'];
            $deleteRows = $taskManager->delete($taskID);
            echo "Rows affected by delete: $deleteRows <br />";
        }

        if (isset($_POST['update']) && isset($_POST['updateid']) && isset($_POST['newdesc'])) {
            $taskID = $_POST['updateid'];
            $newdesc = $_POST['newdesc'];
            $updateRows = $taskManager->update($taskID, $newdesc);
            echo "Rows affected by update: $updateRows <br />";
        }

        if (isset($_POST['readone']) && isset($_POST['readid'])) {
            $taskID = $_POST['readid'];
            $taskFromDB = $taskManager->read($taskID);
            if (sizeof($taskFromDB) == 1) {
                $task = $taskFromDB[0];
                echo "Task with id of $taskID read from DB: $task <br />";
            }
        }

        if (isset($_POST['readall'])) {
            $allTasksFromDB = $taskManager->readAll();
            echo "All Tasks";
            foreach($allTasksFromDB as $currentTask) {
                echo "$currentTask <br />";
            }
        }

    } else {
    
        $url = "test.php";
        header('Location: '.$url);
    
    }
    */
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
