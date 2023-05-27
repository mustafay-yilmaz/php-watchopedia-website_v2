<?php
require_once("_mysqlconnection.php");

$accounts_id = $_SESSION['accounts_id'];

// Sorguyu hazırlayın
$query = "SELECT COUNT(*) AS count FROM mymovielist WHERE status <> 0 AND accounts_id = $accounts_id";

// Sorguyu veritabanına gönderin
$result = mysqli_query($connection, $query);

// Sonucu alın
$row = mysqli_fetch_assoc($result);
$count = $row['count'];


// Veritabanı bağlantısını kapatın

?>