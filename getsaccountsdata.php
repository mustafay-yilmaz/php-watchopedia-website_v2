<?php
require_once("_mysqlconnection.php");

$user_id = $_SESSION['accounts_id'];

$sql = "SELECT * FROM accounts WHERE accounts_id = '$user_id'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $password = $row['password'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $birthdate = $row['birthdate'];
    $usermode = $row['usermode'];
    $description = $row['description'];
}
?>
