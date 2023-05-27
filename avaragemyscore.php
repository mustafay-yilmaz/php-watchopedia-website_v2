<?php
// MySQL bağlantısı ve gerekli diğer ayarları yapın

require_once("_mysqlconnection.php");
$accounts_id = $_SESSION['accounts_id'];

// Sorguyu hazırlayın
$query = "SELECT myscore FROM mymovielist WHERE accounts_id = $accounts_id";

// Sorguyu veritabanına gönderin
$result = mysqli_query($connection, $query);

// Toplam puanı ve film sayısını başlangıç değerleriyle tanımlayın
$total_score = 0;
$total_count = 0;

// Sonuçları döngüyle dolaşarak toplam puanı ve film sayısını hesaplayın
while ($row = mysqli_fetch_assoc($result)) {
    if($row['myscore']!=0){
    $total_score += $row['myscore'];
    $total_count++;
    }
}

// Ortalamayı hesaplayın
$average_score = ($total_count > 0) ? $total_score / $total_count : 0;

$average_score = number_format($average_score, 1);

?>