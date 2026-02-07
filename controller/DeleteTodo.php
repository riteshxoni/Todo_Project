<?php
require '../config/db.php';
if (isset($_GET['id'])) {
    try 
    {
        $id = $_GET['id'];
        // SQL to delete a record
        $sql = "DELETE FROM todo WHERE id=?";
        $stmt = $conn->prepare($sql);
        // Execute with values
        $stmt->execute([$id]);
        $stmt = null;
        header("Location: ../index.php?result=Todo deleted successfully.");
        exit;
    } 
    catch (PDOException $e) 
    {
        header("Location: ../index.php?result=Todo Creation Failed.");
        exit;
    }
}
