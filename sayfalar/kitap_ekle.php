<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['kitap_adi'];
    $yazar = $_POST['kitap_yazar'];
    $tur = $_POST['kitap_tur'];
    $sayfa = $_POST['sayfa_sayisi'];

    $ekle = $db->prepare("INSERT INTO kitaplar (kitap_adi, kitap_yazar, kitap_tur, sayfa_sayisi) VALUES (?, ?, ?, ?)");
    $sonuc = $ekle->execute([$ad, $yazar, $tur, $sayfa]);

    if ($sonuc) {
        echo "<script>alert('Kitap başarıyla eklendi!'); window.location.href='index.php?sayfa=kitaplar';</script>";
    } else {
        echo "<script>alert('Hata oluştu!');</script>";
    }
}
?>

<div class="bolum-basligi">
    <h3>Yeni Kitap Ekle</h3>
</div>
<hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

<form method="POST">
    
    <div class="form-satiri">
        <label class="form-etiketi">Kitap Adı:</label>
        <input type="text" name="kitap_adi" class="form-girdisi" required placeholder="Kitabın adı">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Yazar:</label>
        <input type="text" name="kitap_yazar" class="form-girdisi" required placeholder="Yazarın adı">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Tür:</label>
        <input type="text" name="kitap_tur" class="form-girdisi" required placeholder="Örn: Roman, Tarih">
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Sayfa Sayısı:</label>
        <input type="number" name="sayfa_sayisi" class="form-girdisi" required placeholder="120">
    </div>

    <button type="submit" class="kaydet-butonu">Kaydet</button>
</form>