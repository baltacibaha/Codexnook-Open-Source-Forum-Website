<?php
// Session'ı başlat (eğer başlatılmamışsa)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="header2.css" />

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>baha</title>
</head>

<body>
    <header>
        <div class="logo-container">
            <h1>baha</h1>
        </div>
    </header>

    <nav>
        <?php
        $girisli = isset($_SESSION["uye_id"]) && !empty($_SESSION["uye_id"]);
        
        if ($girisli) {
            // GİRİŞ YAPMIŞ
            ?>
            <a href="index.php">Anasayfa</a>
            <a href="uyeler.php">Üyelerimiz</a>
            <a href="profil.php?kadi=<?= htmlspecialchars($_SESSION["uye_kadi"]) ?>">Profilime Git</a>
            <a href="uyelik.php?p=cikis" style="background:#e74c3c; color:white; padding:8px 15px; border-radius:5px;">Çıkış</a>
            <?php
        } else {
            // GİRİŞ YAPMEMIŞ
            ?>
            <a href="index.php">Anasayfa</a>
            <a href="uyelik.php?p=kayit">Üye Ol</a>
            <a href="uyelik.php">Giriş Yap</a>
            <a href="uyeler.php">Üyelerimiz</a>
            <?php
        }
        ?>
    </nav>
</body>

</html>

