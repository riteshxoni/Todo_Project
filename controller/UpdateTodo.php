<?php

require '../model/Todo.php';
require '../config/db.php';

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    if(isset($_POST['todoname']) && isset($_POST['tododate']) && isset($_POST['id']))
    {
        $todo = new Todo($_POST['id'], $_POST['todoname'], $_POST['tododate'], null);

        try 
        {
            $sql = "UPDATE todo SET todoname = ?, tododate = ? WHERE id = ?";
            // Prepare the SQL query template
            $stmt = $conn->prepare($sql);
            // Execute with values
            $stmt->execute([$todo->getTodoname(), $todo->getTododate(), $todo->getId()]);
            $stmt = null;
            header("Location: ../index.php?result=Todo Updated Successfully.");
            exit;
        } 
        catch(PDOException $e) 
        {
            header("Location: ../index.php?result=Todo Updation Failed.");
            exit;
        }
    }
}


?>