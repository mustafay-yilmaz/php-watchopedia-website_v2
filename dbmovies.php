<?php
require_once("_mysqlconnection.php");

$sql = "SELECT * FROM movies ORDER BY rank";
$result = mysqli_query($connection, $sql);

?>