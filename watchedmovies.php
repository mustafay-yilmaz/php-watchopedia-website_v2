<?php
require_once("_mysqlconnection.php");

$sql = "SELECT movie_id FROM watched_movies WHERE account_id = 328;";
$result = mysqli_query($connection, $sql);
