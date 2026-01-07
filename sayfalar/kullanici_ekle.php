<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['kullanici_adi'];
    $soyad = $_POST['kullanici_soyadi'];
    $mail = $_POST['kullanici_mail'];
    $sifre = password_hash($_POST['kullanici_sifre'], PASSWORD_DEFAULT);

    $ekle = $db->prepare("INSERT INTO uyeler (kullanici_adi, kullanici_soyadi, kullanici_mail, kullanici_sifre) VALUES (?, ?, ?, ?)");
    $sonuc = $ekle->execute([$ad, $soyad, $mail, $sifre]);

    if ($sonuc) {
        echo "<script>alert('Kullanıcı başarıyla eklendi!'); window.location.href='index.php?sayfa=kullanicilar';</script>";
    } else {
        echo "<script>alert('Hata oluştu!');</script>";
    }
}
?>

<div class="bolum-basligi">
    <h3>Yeni Kullanıcı Ekle</h3>
</div>
<hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

<form method="POST">
    
    <div class="form-satiri">
        <label class="form-etiketi">Ad:</label>
        <input type="text" name="kullanici_adi" class="form-girdisi" required placeholder="Kullanıcının adı">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Soyad:</label>
        <input type="text" name="kullanici_soyadi" class="form-girdisi" placeholder="Kullanıcının soyadı">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">E-posta:</label>
        <input type="email" name="kullanici_mail" class="form-girdisi" required placeholder="ornek@mail.com">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Şifre:</label>
        <input type="password" name="kullanici_sifre" class="form-girdisi" required placeholder="******">
    </div>

    <button type="submit" class="kaydet-butonu">Kaydet</button>

</form>