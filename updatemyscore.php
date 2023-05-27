<?php
// Veritabanı bağlantısı yapılacak dosyayı dahil edin
require_once("_mysqlconnection.php");
session_start();

// Formdan gönderilen verileri alın
$movieId = $_POST['movie_id'];
$oldScore = $_POST['myscore'];
$oldUserCount = $_POST['usercount'];
$oldTotalScore = $_POST['score']*$oldUserCount;

// Yeni puanı hesaplayın
$newScore = $_POST['rating'];
$newUserCount = ($newScore == 0 && $oldScore != 0) ? $oldUserCount - 1 : (($newScore != 0 && $oldScore == 0) ? $oldUserCount + 1 : $oldUserCount);
if($newUserCount!=0)
    $newTotalScore = number_format(($oldTotalScore - $oldScore + $newScore) / $newUserCount, 1, '.', '');
    else
    $newTotalScore=0;

// Güncelleme sorgularını hazırlayın
$updateQuery1 = "UPDATE mymovielist SET myscore = '$newScore', movie_score = '$newTotalScore'  WHERE movie_id = $movieId AND accounts_id = " . $_SESSION['accounts_id'];
$updateQuery2 = "UPDATE movies SET usercount = $newUserCount, score = $newTotalScore WHERE movie_id = $movieId";
$updateQuery3 = "UPDATE mymovielist SET movie_score = '$newTotalScore'  WHERE movie_id = '$movieId'";

// Güncelleme sorgularını çalıştırın
if (mysqli_query($connection, $updateQuery1) && mysqli_query($connection, $updateQuery2) && mysqli_query($connection, $updateQuery3)) {
    // Güncelleme başarılıysa kullanıcıyı yönlendirin
    header("Location: mymovielist.php");
    exit();
} else {
    // Güncelleme başarısızsa hata mesajını görüntüleyin
    echo "Veritabanında güncelleme yapılırken bir hata oluştu: " . mysqli_error($connection);
}
header("Refresh:0");
?>