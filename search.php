<?php
// Veritabanı bağlantısı ve diğer gerekli işlemler
require_once("_mysqlconnection.php");

// Formdan gelen arama değerini al
$arama = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($arama)) {
  // Veritabanında arama sorgusunu gerçekleştir
  $sql = "SELECT movie_id FROM movies WHERE name = '$arama'";

  // Sorguyu çalıştır ve sonucu al
  $result = mysqli_query($connection, $sql);

  // Eğer eşleşen bir film bulunduysa
  if ($result && mysqli_num_rows($result) > 0) {
    // Eşleşen film için movie_id değerini al
    $row = mysqli_fetch_assoc($result);
    $eslesenFilmID = $row['movie_id'];

    // Linki oluştur ve yönlendirme yap
    $link = 'moviepage.php?movie_id=' . $eslesenFilmID;
    header("Location: $link");
    exit();
  } else {
    header('Location: index.php');
    exit;
  }
}
?>