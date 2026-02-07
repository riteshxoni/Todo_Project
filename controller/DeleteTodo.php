<?php
require '../config/db.php';
session_start();
if (isset($_GET['id']) && isset($_SESSION['username'])) {
    try 
    {
        $id = $_GET['id'];
        $username = $_SESSION['username'];
        // SQL to delete a record
        $sql = "DELETE FROM todo WHERE id=? and username=?";
        $stmt = $conn->prepare($sql);
        // Execute with values
        $stmt->execute([$id, $username]);
        if($stmt->rowCount() > 0)
        {
            header("Location: ../index.php?result=Todo deleted successfully.");
            exit;
        }
        else
        {
            header("Location: ../index.php?result=Restricted Activity Detected");
            exit;
        }
        
    } 
    catch (PDOException $e) 
    {
        header("Location: ../index.php?result=Todo Creation Failed.");
        exit;
    }
}
