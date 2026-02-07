<?php

require '../model/Todo.php';
require '../config/db.php';

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(isset($_POST['todoname']) && isset($_POST['tododate']))
    {
        $todo = new Todo(0, $_POST['todoname'], $_POST['tododate'], null);

        try 
        {
            $sql = "INSERT INTO todo (todoname, tododate) VALUES (?, ?)";
            // Prepare the SQL query template
            $stmt = $conn->prepare($sql);
            // Execute with values
            $stmt->execute([$todo->getTodoname(), $todo->getTododate()]);
            $stmt = null;
            header("Location: ../index.php?result=Todo Created Successfully.");
            exit;
        } 
        catch(PDOException $e) 
        {
            header("Location: ../index.php?result=Todo Creation Failed.");
            exit;
        }
        
    }
}


?>