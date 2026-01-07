<?php
$id = $_GET['id'];
$sil = $db->prepare("DELETE FROM kitaplar WHERE id = ?");
$sonuc = $sil->execute([$id]);

if ($sonuc) {
    echo "<script>alert('Kitap silindi!'); window.location.href='index.php?sayfa=kitaplar';</script>";
} else {
    echo "<script>alert('Hata oluştu!'); window.location.href='index.php?sayfa=kitaplar';</script>";
}
?>