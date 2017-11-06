<!--
    Adv PHP
    Sarah Omernik
-->
<html>
    <form action="task_services.php" method="POST">
        <p>Add Task</p>
        <textarea name="desc" id="desc" cols="30" rows="10">Description</textarea>
        <input type="submit" name="add" value="Add Task"/>
    </form>

    <form action="results.php" method="POST">
        <p>Update Task</p>
        <input type="text" placeholder="Id to Update" name="updateid" required /><br/>
        <textarea name="newdesc" id="newdesc" cols="30" rows="10">New Description</textarea>
        <input type="submit" name="update" value="Update Tasks"/>
    </form>

    <form action="results.php" method="POST">
        <p>Delete Task</p>
        <input type="text" placeholder="Id to Delete" name="deleteid" required />
        <input type="submit" name="delete" value="Delete Task"/>
    </form>

    <form action="task_services.php" method="GET">
        <p>Read Task</p>
        <input type="text" placeholder="Id to Read" name="readid" required />
        <input type="submit" name="readone" value="Read Task"/>
    </form>

    <form action="task_services.php" method="GET">
        <input type="submit" name="readall" value="Read all Tasks"/>
    </form>
</html>
<?php

    /*
        Adv PHP
        Sarah Omernik
    */

    require_once("TaskManager.php");
    $taskManager = new TaskManager();

    $desc = "cool description";
    $createId = $taskManager->create($desc);
    echo "Id of created task: $createId <br />";

    $taskID = 11;
    $deleteRows = $taskManager->delete($taskID);
    echo "Rows affected by delete: $deleteRows <br />";


    $taskID = 10;
    $newdesc = "New description";
    $updateRows = $taskManager->update($taskID, $newdesc);
    echo "Rows affected by update: $updateRows <br />";


    $taskID = 2;
    $taskFromDB = $taskManager->read($taskID);
    if (sizeof($taskFromDB) == 1) {
        $task = $taskFromDB[0];
        echo "Task with id of $taskID read from DB: $task <br />";
    }

    $allTasksFromDB = $taskManager->readAll();
    echo "All Tasks";
    foreach($allTasksFromDB as $currentTask) {
        echo "$currentTask <br />";
    }
 
?>