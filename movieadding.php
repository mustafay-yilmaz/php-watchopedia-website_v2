<?php
require_once("_mysqlconnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $filmAdi = $_POST['filmAdi'];
    $cikisTarihi = $_POST['cikisTarihi'];
    $resim = $_POST['resim'];
    $konu = $_POST['konu'];
    $trailer = $_POST['trailer'];
    $genre = $_POST['genre'];

    // Insert data into the database
    $sql = "INSERT INTO movies (name, date, img, description, trailer, genre) VALUES ('$filmAdi', '$cikisTarihi', '$resim', '$konu', '$trailer', '$genre')";
    $response = mysqli_query($connection, $sql);

    if ($response ) {
        // Yeni eklenen filmin ID'sini al
        $movieId = mysqli_insert_id($connection);

        // Tüm kullanıcılar için mymovielist tablosuna filmi ekle
        $userSql = "SELECT accounts_id FROM accounts";
        $userResponse = mysqli_query($connection, $userSql);

        while ($user = mysqli_fetch_assoc($userResponse)) {
            $userId = $user['accounts_id'];
            $mymovielistSql = "INSERT INTO mymovielist (accounts_id, movie_id) VALUES ('$userId', '$movieId')";
            mysqli_query($connection, $mymovielistSql);
        }

        session_start();
        $_SESSION['movieadding_succes'] = "Başarıyla eklendi.";
      
        header('Location: addmovie.php');
        exit();
      } else {
        session_start();
        $_SESSION['movieadding_danger']= "Veritabanına eklenemedi!";
      
        header('Location: addmovie.php');
        exit();
      }
}
?>