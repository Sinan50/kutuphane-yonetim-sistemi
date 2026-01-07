<?php
require_once 'db.php';

if (isset($_SESSION['kullanici_adi'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    $stmt = $db->prepare("SELECT * FROM uyeler WHERE kullanici_mail = ?");
    $stmt->execute([$email]);
    $uye = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($uye && password_verify($sifre, $uye['kullanici_sifre'])) {
        $_SESSION['giris_yapti'] = true;
        $_SESSION['kullanici_adi'] = $uye['kullanici_adi'];
        $_SESSION['uye_id'] = $uye['id'];

        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Hatalı e-posta veya şifre!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kütüphane - Giriş yap</title>
    <link rel="stylesheet" href="css/giris.css">
</head>

<body>
    <h2>Giriş Yap</h2>
    <hr>
    <form action="giris.php" method="POST">
        <table>
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
                    <button type="submit">Giriş Yap</button>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>