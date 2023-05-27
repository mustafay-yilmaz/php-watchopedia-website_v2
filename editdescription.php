<?php

require_once("_mysqlconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST["description"];

    session_start();
    
    $sql = "UPDATE accounts SET description = '$description' WHERE accounts_id=$_SESSION[accounts_id]";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location: profile.php');
        exit();
    } 
}
?>