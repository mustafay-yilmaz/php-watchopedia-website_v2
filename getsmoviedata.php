<?php
require_once("_mysqlconnection.php");

$sql = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $date = $row['date'];
    $description = $row['description'];
    $img = $row['img'];
    $name = $row['name'];
    $score= $row['score'];
    $trailer = $row['trailer'];
    $genre = $row['genre'];
}
?>