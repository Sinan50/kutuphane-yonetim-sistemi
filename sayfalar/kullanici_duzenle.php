<?php
$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM uyeler WHERE id = ?");
$sorgu->execute([$id]);
$uye = $sorgu->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['kullanici_adi'];
    $soyad = $_POST['kullanici_soyadi'];
    $mail = $_POST['kullanici_mail'];

    // Şifre alanı boş bırakıldıysa eski şifreyi koru
    if (!empty($_POST['kullanici_sifre'])) {
        $sifre = password_hash($_POST['kullanici_sifre'], PASSWORD_DEFAULT);
        $guncelle = $db->prepare("UPDATE uyeler SET kullanici_adi=?, kullanici_soyadi=?, kullanici_mail=?, kullanici_sifre=? WHERE id=?");
        $sonuc = $guncelle->execute([$ad, $soyad, $mail, $sifre, $id]);
    } else {
        $guncelle = $db->prepare("UPDATE uyeler SET kullanici_adi=?, kullanici_soyadi=?, kullanici_mail=? WHERE id=?");
        $sonuc = $guncelle->execute([$ad, $soyad, $mail, $id]);
    }

    if ($sonuc) {
        echo "<script>alert('Kullanıcı güncellendi!'); window.location.href='index.php?sayfa=kullanicilar';</script>";
    } else {
        echo "<script>alert('Hata oluştu!');</script>";
    }
}
?>

<div class="bolum-basligi">
    <h3>Kullanıcı Düzenle</h3>
</div>
<hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

<form method="POST">
    
    <div class="form-satiri">
        <label class="form-etiketi">Ad:</label>
        <input type="text" name="kullanici_adi" class="form-girdisi" value="<?php echo $uye['kullanici_adi']; ?>" required>
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Soyad:</label>
        <input type="text" name="kullanici_soyadi" class="form-girdisi" value="<?php echo $uye['kullanici_soyadi']; ?>">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">E-posta:</label>
        <input type="email" name="kullanici_mail" class="form-girdisi" value="<?php echo $uye['kullanici_mail']; ?>" required>
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Yeni Şifre:</label>
        <input type="password" name="kullanici_sifre" class="form-girdisi" placeholder="Değiştirmek istemiyorsanız boş bırakın">
    </div>

    <button type="submit" class="kaydet-butonu">Güncelle</button>
</form>