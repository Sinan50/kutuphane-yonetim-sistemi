<?php
$hata_mesaji = null;
$yonLink = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['giris_yapti'])) {
    $hata_mesaji = "Bu sayfayı görüntüleyebilmek için önce giriş yapmanız gerekmektedir!";
    $yonLink = 'giris.php';
} elseif ($_SESSION['kullanici_adi'] !== 'admin') {
    $hata_mesaji = "Bu sayfaya erişim yetkiniz bulunmamaktadır. Güvenli çıkış yapılıyor.";

    $yonLink = 'cikis.php';
}

if ($hata_mesaji !== null) {
    echo "<script type='text/javascript'>";
    echo "alert('" . addslashes($hata_mesaji) . "');";
    echo "window.location.href = '" . $yonLink . "';";
    echo "</script>";
    exit();
}
?>