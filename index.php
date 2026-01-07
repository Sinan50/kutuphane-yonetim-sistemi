<?php
require_once 'kontrol.php';
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="images/logo/logo.png" />

    <link rel="stylesheet" href="css/index.css">

    <title>Kütüphane Yönetimi</title>
</head>

<body>
    <header class="ust-kisim">
        <div class="kapsayici">
            <div class="logo-kutusu">
                <a href='index.php'>
                    <img src="images/logo/logo.png" alt="Kütüphane Logosu">
                </a>
            </div>

            <nav class="menu-alani">
                <div class="sayfa-linkleri">
                    <a href="index.php"
                        class="<?php echo (!isset($_GET['sayfa']) || $_GET['sayfa'] == 'anasayfa') ? 'secili-sayfa' : ''; ?>">
                        Ana Sayfa
                    </a>

                    <a href="index.php?sayfa=kullanicilar"
                        class="<?php echo (isset($_GET['sayfa']) && $_GET['sayfa'] == 'kullanicilar') ? 'secili-sayfa' : ''; ?>">
                        Kullanıcı Listesi
                    </a>

                    <a href="index.php?sayfa=kitaplar"
                        class="<?php echo (isset($_GET['sayfa']) && $_GET['sayfa'] == 'kitaplar') ? 'secili-sayfa' : ''; ?>">
                        Kitap Listesi
                    </a>
                </div>
                <a href="cikis.php" class="cikis-yap-btn">Çıkış Yap</a>
            </nav>
        </div>
    </header>

    <div class="icerik-alani">
        <div class="kapsayici beyaz-kutu">
            <?php
            $sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 'anasayfa';

            switch ($sayfa) {
                case 'anasayfa':
                    $kitap_sor = $db->prepare("SELECT COUNT(*) FROM kitaplar");
                    $kitap_sor->execute();
                    $kitap_sayisi = $kitap_sor->fetchColumn();

                    $uye_sor = $db->prepare("SELECT COUNT(*) FROM uyeler");
                    $uye_sor->execute();
                    $uye_sayisi = $uye_sor->fetchColumn();
                    ?>
                    
                    <div class="panel-genel">
                        <div class="hosgeldin-yazisi">
                            <div>
                                <h2>Hoşgeldin, <?php echo $_SESSION['kullanici_adi']; ?>!</h2>
                                <p>Kütüphane yönetim paneline tekrar hoşgeldiniz.</p>
                            </div>
                            <div class="tarih-etiketi"><?php echo date("d.m.Y"); ?></div>
                        </div>

                        <div class="kutu-listesi">
                            
                            <a href="index.php?sayfa=kitaplar" class="istatistik-kutu" style="text-decoration: none; color: inherit;">
                                <div class="ikon-kutusu mavi">
                                    📖 
                                </div>
                                <div class="istatistik-bilgi">
                                    <span class="etiket">Toplam Kitap</span>
                                    <span class="deger"><?php echo $kitap_sayisi; ?></span>
                                </div>
                            </a>

                            <a href="index.php?sayfa=kullanicilar" class="istatistik-kutu" style="text-decoration: none; color: inherit;">
                                <div class="ikon-kutusu turuncu">
                                    👥
                                </div>
                                <div class="istatistik-bilgi">
                                    <span class="etiket">Toplam Kullanıcı</span>
                                    <span class="deger"><?php echo $uye_sayisi; ?></span>
                                </div>
                            </a>
                            
                            <div class="istatistik-kutu islem-karti">
                                <div class="istatistik-bilgi">
                                    <span class="etiket">Hızlı İşlem</span>
                                    <p>Yeni bir kitap eklemek ister misin?</p>
                                </div>
                                <a href="index.php?sayfa=kitap_ekle" class="islem-butonu">Kitap Ekle +</a>
                            </div>
                        </div>
                        
                        <br><br>

                        <div class="bolum-basligi">
                            <h3>Son Eklenen 5 Kitap</h3>
                            <a href="index.php?sayfa=kitaplar" class="tumunu-gor">Tümünü Gör →</a>
                        </div>
                        
                        <?php
                        $son_kitaplar = $db->prepare("SELECT * FROM kitaplar ORDER BY id DESC LIMIT 5");
                        $son_kitaplar->execute();
                        $sonuclar = $son_kitaplar->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        
                        <table class="yeni-tablo">
                            <thead>
                                <tr>
                                    <th>Kitap Adı</th>
                                    <th>Yazar</th>
                                    <th>Tür</th>
                                    <th>Sayfa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($sonuclar) > 0) { ?>
                                    <?php foreach($sonuclar as $k){ ?>
                                    <tr>
                                        <td><?php echo $k['kitap_adi']; ?></td>
                                        <td><?php echo $k['kitap_yazar']; ?></td>
                                        <td><span class="rozet"><?php echo $k['kitap_tur']; ?></span></td>
                                        <td><?php echo $k['sayfa_sayisi']; ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4" style="text-align:center;">Henüz kitap eklenmemiş.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <?php
                    break;

                case 'kullanicilar':
                    require_once('sayfalar/kullanicilar.php');
                    break;
                case 'kullanici_ekle':
                    require_once('sayfalar/kullanici_ekle.php');
                    break;
                case 'kullanici_duzenle':
                    require_once('sayfalar/kullanici_duzenle.php');
                    break;
                case 'kullanici_sil':
                    require_once('sayfalar/kullanici_sil.php');
                    break;

                case 'kitaplar':
                    require_once('sayfalar/kitaplar.php');
                    break;
                case 'kitap_ekle':
                    require_once('sayfalar/kitap_ekle.php');
                    break;
                case 'kitap_duzenle':
                    require_once('sayfalar/kitap_duzenle.php');
                    break;
                case 'kitap_sil':
                    require_once('sayfalar/kitap_sil.php');
                    break;

                default:
                    echo "<div class='uyari-kutusu hata-durumu'>Aradığınız sayfa bulunamadı!</div>";
                    break;
            }
            ?>
        </div>
    </div>


</body>

</html>