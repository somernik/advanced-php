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

    <form action="clientservice.php" method="GET">
        <p>Add Task</p>
        <input type="text" placeholder="Username" name="username" required /><br/>
        <textarea name="desc" id="desc" cols="30" rows="10">Description</textarea>
        <input type="submit" name="submit" value="create"/>
    </form>

    <form action="clientservice.php" method="GET">
        <p>Update Task</p>
                
        <input type="text" placeholder="Username" name="username" required />
        <input type="text" placeholder="Id to Update" name="updateid" required /><br/>
        <textarea name="newdesc" id="newdesc" cols="30" rows="10">New Description</textarea>
        <input type="submit" name="submit" value="update"/>
    </form>

    <form action="clientservice.php" method="GET">
        <p>Delete Task</p>
                
        <input type="text" placeholder="Username" name="username" required />
        <input type="text" placeholder="Id to Delete" name="deleteid" required />
        <input type="submit" name="submit" value="delete"/>
    </form>
    
    <form action="clientservice.php" method="GET">
        <p>Read Task</p>
        <input type="text" placeholder="Username" name="username" required />
        <input type="text" placeholder="Id to Read" name="readid" required />
        <input type="submit" name="submit" value="readById"/>
    </form>

    <form action="clientservice.php" method="GET">
        <p>Read All Tasks</p>
        <input type="text" placeholder="Username" name="username" required />
        <input type="submit" name="submit" value="readAll"/>
    </form>
</html>
