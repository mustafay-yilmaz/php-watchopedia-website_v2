<?php
require_once("_mysqlconnection.php");
session_start();
$accounts_id = $_SESSION['accounts_id'];
$deleteMovieListQuery = "DELETE FROM mymovielist WHERE accounts_id = '$accounts_id'";
mysqli_query($connection, $deleteMovieListQuery);
$deleteAccountsQuery1 = "DELETE FROM accounts WHERE accounts_id = '$accounts_id'";

mysqli_query($connection, $deleteAccountsQuery1);


    // Oturumu kapat
    session_unset();
    session_destroy();
  
    session_start();
    session_regenerate_id();

    // Yönlendirme yap
    header('Location: index.php');
    exit();
?>