<?php
require_once("_mysqlconnection.php");

$username = $_POST['username'];
$password = hash("sha256", $_POST['password']);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];

session_start();
$sql = "UPDATE accounts SET username='$username', password='$password', firstname='$firstname', lastname='$lastname', email='$email', birthdate='$birthdate' WHERE accounts_id=$_SESSION[accounts_id]";
$response = mysqli_query($connection, $sql);

if ($response ) {
  
    header('Location: profile.php');
    exit();
  } else {
  
    header('Location: profile2.php');
    exit();
  }
?>