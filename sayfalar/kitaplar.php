<?php
$sorgu = $db->prepare("SELECT * FROM kitaplar");
$sorgu->execute();
$kitaplar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<h3>Kitap Listesi</h3>
<a href="index.php?sayfa=kitap_ekle" class="yesil-buton">+ Yeni Kitap Ekle</a>
<br><br>

<table class="duz-tablo">
    <thead>
        <tr>
            <th>ID</th>
            <th>Kitap Adı</th>
            <th>Yazar</th>
            <th>Tür</th>
            <th>Sayfa Sayısı</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kitaplar as $kitap) { ?>
            <tr>
                <td><?php echo $kitap['id']; ?></td>
                <td><?php echo $kitap['kitap_adi']; ?></td>
                <td><?php echo $kitap['kitap_yazar']; ?></td>
                <td><?php echo $kitap['kitap_tur']; ?></td>
                <td><?php echo $kitap['sayfa_sayisi']; ?></td>
                <td>
                    <a href="index.php?sayfa=kitap_duzenle&id=<?php echo $kitap['id']; ?>" class="sari-buton">Düzenle</a>
                    <a href="index.php?sayfa=kitap_sil&id=<?php echo $kitap['id']; ?>" class="kirmizi-buton"
                        onclick="return confirm('Bu kitabı silmek istediğinize emin misiniz?')">Sil</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>