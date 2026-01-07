<?php
require_once 'db.php';
$mesaj = null;
$yonlendirme_adresi = null;
$basari = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['kullanici_adi'];
    $soyad = $_POST['kullanici_soyadi'];
    $email = $_POST['email'];
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

    $kontrol = $db->prepare("SELECT * FROM uyeler WHERE kullanici_mail=?");
    $kontrol->execute([$email]);

    if ($kontrol->rowCount() > 0) {
        $mesaj = '<div class="uyari-kutusu hata-durumu"> Bu e-posta zaten kullanılıyor.</div>';
    } else {
        $sql = "INSERT INTO uyeler (kullanici_adi, kullanici_soyadi, kullanici_mail, kullanici_sifre) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$ad, $soyad, $email, $sifre])) {
            $mesaj = 'Kayıt başarılı! Giriş sayfasına yönlendiriliyorsunuz...';
            $basari = true;
            $yonLink = 'giris.php';
        } else {
            $mesaj = 'Kayıt sırasında bir hata oluştu.';
        }
    }

    if ($mesaj !== null) {
    echo "<script type='text/javascript'>";
    echo "alert('" . addslashes($mesaj) . "');";
    
    if ($basari == true) {
        echo "window.location.href = '" . $yonLink . "';";
        exit();
    }
    echo "</script>";
}
    

}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kütüphane - Kayıt Ol</title>
    <link rel="stylesheet" href="css/giris.css">
</head>

<body>
    <h2 class="sayfa-basligi">Kayıt ol</h2>
    <hr class="ayirac-cizgi">
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <label for="kullanici_adi">Ad:</label>
                </td>
                <td>
                    <input type="text" name="kullanici_adi" required placeholder="Ad">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kullanici_soyadi">Soyad:</label>
                </td>
                <td>
                    <input type="text" name="kullanici_soyadi" placeholder="Soyad">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">E-posta:</label>
                </td>
                <td>
                    <input type="email" id="email" name="email" required placeholder="example@mail.com">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sifre">Şifre:</label>
                </td>
                <td>
                    <input type="password" id="sifre" name="sifre" required placeholder="ruhi123">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Kayıt Ol</button>
                </td>
            </tr>
        </table>
    </form>
    <div class="alt-link"><a href="giris.php">Hesabınız var mı? Giriş yapın.</a></div>
</body>

</html>