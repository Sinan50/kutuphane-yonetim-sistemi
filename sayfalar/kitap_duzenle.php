<?php
$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM kitaplar WHERE id = ?");
$sorgu->execute([$id]);
$kitap = $sorgu->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ad = $_POST['kitap_adi'];
    $yazar = $_POST['kitap_yazar'];
    $tur = $_POST['kitap_tur'];
    $sayfa = $_POST['sayfa_sayisi'];

    $guncelle = $db->prepare("UPDATE kitaplar SET kitap_adi=?, kitap_yazar=?, kitap_tur=?, sayfa_sayisi=? WHERE id=?");
    $sonuc = $guncelle->execute([$ad, $yazar, $tur, $sayfa, $id]);

    if ($sonuc) {
        echo "<script>alert('Kitap güncellendi!'); window.location.href='index.php?sayfa=kitaplar';</script>";
    } else {
        echo "<script>alert('Hata oluştu!');</script>";
    }
}
?>

<div class="bolum-basligi">
    <h3>Kitap Düzenle</h3>
</div>
<hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">

<form method="POST">
    
    <div class="form-satiri">
        <label class="form-etiketi">Kitap Adı:</label>
        <input type="text" name="kitap_adi" class="form-girdisi" value="<?php echo $kitap['kitap_adi']; ?>" required>
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Yazar:</label>
        <input type="text" name="kitap_yazar" class="form-girdisi" value="<?php echo $kitap['kitap_yazar']; ?>" required>
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Tür:</label>
        <input type="text" name="kitap_tur" class="form-girdisi" value="<?php echo $kitap['kitap_tur']; ?>" required>
    </div>

    <div class="form-satiri">
        <label class="form-etiketi">Sayfa Sayısı:</label>
        <input type="number" name="sayfa_sayisi" class="form-girdisi" value="<?php echo $kitap['sayfa_sayisi']; ?>" required>
    </div>

    <button type="submit" class="kaydet-butonu">Güncelle</button>
</form>