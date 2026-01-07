<?php
$sorgu = $db->prepare("SELECT * FROM uyeler");
$sorgu->execute();
$uyeler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<h3>Kullanıcı Listesi</h3>
<a href="index.php?sayfa=kullanici_ekle" class="yesil-buton">+ Yeni Kullanıcı Ekle</a>
<br><br>

<table class="duz-tablo">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ad</th>
            <th>Soyad</th>
            <th>E-posta</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($uyeler as $uye) { ?>
            <tr>
                <td><?php echo $uye['id']; ?></td>
                <td><?php echo $uye['kullanici_adi']; ?></td>
                <td><?php echo $uye['kullanici_soyadi']; ?></td>
                <td><?php echo $uye['kullanici_mail']; ?></td>
                <td>
                    <a href="index.php?sayfa=kullanici_duzenle&id=<?php echo $uye['id']; ?>" class="sari-buton">Düzenle</a>
                    <a href="index.php?sayfa=kullanici_sil&id=<?php echo $uye['id']; ?>" class="kirmizi-buton"
                        onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')">Sil</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>