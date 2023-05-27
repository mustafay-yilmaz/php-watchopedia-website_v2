<?php
// Veritabanı bağlantısı yapılacak dosyayı dahil edin
require_once("_mysqlconnection.php");
session_start();
// Formdan gönderilen puanı alın
$newstatus = $_POST['status'];

if($newstatus==0){
    $movieId = $_POST['movie_id'];
    $oldScore = $_POST['myscore'];
    $oldUserCount = $_POST['usercount'];
    $oldTotalScore = $_POST['score']*$oldUserCount;

    if($oldUserCount!=0)
    $newUserCount=$oldUserCount-1;
    else{
        $newUserCount=0;
    }

    $newScore = 0;
    if($newUserCount!=0)
    $newTotalScore = number_format(($oldTotalScore - $oldScore + $newScore) / $newUserCount, 1, '.', '');
    else
    $newTotalScore=0;

    $updateQuery1 = "UPDATE movies SET usercount = $newUserCount, score = $newTotalScore WHERE movie_id = $movieId";
    $updateQuery2 = "UPDATE mymovielist SET status = '".$newstatus."', myscore = '$newScore' WHERE movie_id = ".$_POST['movie_id']." AND accounts_id = " . $_SESSION['accounts_id'];
    $updateQuery3 = "UPDATE mymovielist SET movie_score = '$newTotalScore'  WHERE movie_id = '$movieId'";

    // Güncelleme sorgusunu çalıştırın
    if (mysqli_query($connection, $updateQuery1) && mysqli_query($connection, $updateQuery2) && mysqli_query($connection, $updateQuery3)) {
    // Güncelleme başarılıysa kullanıcıyı yönlendirin
    header("Location: mymovielist.php");
    exit();
    } else {
    // Güncelleme başarısızsa hata mesajını görüntüleyin
    echo "Veritabanında güncelleme yapılırken bir hata oluştu: " . mysqli_error($connection);
    }
}
else{
// Güncelleme sorgusunu hazırlayın
$updateQuery = "UPDATE mymovielist SET status = '".$newstatus."' WHERE movie_id = ".$_POST['movie_id']." AND accounts_id = " . $_SESSION['accounts_id'];

// Güncelleme sorgusunu çalıştırın
if (mysqli_query($connection, $updateQuery)) {
    // Güncelleme başarılıysa kullanıcıyı yönlendirin
    header("Location: mymovielist.php");
    exit();
} else {
    // Güncelleme başarısızsa hata mesajını görüntüleyin
    echo "Veritabanında güncelleme yapılırken bir hata oluştu: " . mysqli_error($connection);
}
}
header("Refresh:0");
?>