<?php

require '../model/Todo.php';
require '../config/db.php';
session_start();
if(($_SERVER['REQUEST_METHOD'] === "POST") && isset($_SESSION['username']))
{
    if(isset($_POST['todoname']) && isset($_POST['tododate']) && isset($_POST['id']))
    {
        $username = $_SESSION['username'];
        $todo = new Todo($_POST['id'], $_POST['todoname'], $_POST['tododate'], null);

        try 
        {
            $sql = "UPDATE todo SET todoname = ?, tododate = ? WHERE id = ? and username= ? ";
            // Prepare the SQL query template
            $stmt = $conn->prepare($sql);
            // Execute with values
            $stmt->execute([$todo->getTodoname(), $todo->getTododate(), $todo->getId(), $username]);
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