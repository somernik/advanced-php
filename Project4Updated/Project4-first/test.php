<!--
    Adv PHP
    Sarah Omernik
-->
<html>

    <form action="user_services.php" method="POST">
        <p>Create Account</p>
        <input type="text" placeholder="Username" name="username" required />

        <input type="password" placeholder="Password" name="password" required />

        <input type="submit" name="signup" value="Sign Up"/>
    </form>

    <a href="results.php">See user activity</a>

    <form action="task_services.php" method="POST">
        <p>Add Task</p>
        <input type="text" placeholder="Username" name="username" required /><br/>
        <textarea name="desc" id="desc" cols="30" rows="10">Description</textarea>
        <input type="submit" name="add" value="Add Task"/>
    </form>
<!--
    <form action="task_services.php" method="POST">
        <p>Update Task</p>
        <input type="text" placeholder="Id to Update" name="updateid" required /><br/>
        <textarea name="newdesc" id="newdesc" cols="30" rows="10">New Description</textarea>
        <input type="submit" name="update" value="Update Tasks"/>
    </form>

    <form action="task_services.php" method="DELETE">
        <p>Delete Task</p>
        <input type="text" placeholder="Id to Delete" name="deleteid" required />
        <input type="submit" name="delete" value="Delete Task"/>
    </form>
-->
    <form action="task_services.php" method="GET">
        <p>Read Task</p>
        <input type="text" placeholder="Username" name="username" required />
        <input type="text" placeholder="Id to Read" name="readid" required />
        <input type="submit" name="readone" value="Read Task"/>
    </form>

    <form action="task_services.php" method="GET">
        <p>Read All Tasks</p>
        <input type="text" placeholder="Username" name="username" required />
        <input type="submit" name="readall" value="Read all Tasks"/>
    </form>
</html>