<?php
$id = $_GET['id'];
$sil = $db->prepare("DELETE FROM uyeler WHERE id = ?");
$sonuc = $sil->execute([$id]);

if ($sonuc) {
    echo "<script>alert('Kullanıcı silindi!'); window.location.href='index.php?sayfa=kullanicilar';</script>";
} else {
    echo "<script>alert('Silme işleminde hata oldu!'); window.location.href='index.php?sayfa=kullanicilar';</script>";
}
?>