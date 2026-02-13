<?php
session_start();
include 'ayar.php';
include 'ukas.php';
include 'func.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Üyelerimiz</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="main.css" />
</head>

<?php
    // Oturumu güvenli başlat
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Dosyaları bir kez dahil et
    include_once 'ayar.php';
    include_once 'ukas.php';
    include_once 'func.php';

    // Kullanıcı adı
    $kadi = @$_GET["kadi"];

    // Üye bilgilerini çek
    $data = $db->prepare("SELECT * FROM uyeler WHERE uye_kadi=?");
    $data->execute([$kadi]);
    $_data = $data->fetch(PDO::FETCH_ASSOC);

    // Eğer kullanıcı bulunamadıysa hata verebilirsin
    if (!$_data) {
        die("Kullanıcı bulunamadı.");
    }

    // Avatar için baş harfi al
    $basHarf = mb_substr($_data["uye_adsoyad"], 0, 1, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $_data["uye_adsoyad"] ?> - Profil</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>

    <?php include 'header.php'; ?>

    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 20px;">
        
        <div class="profil-card">
            <div class="profil-header">
                <div class="profil-avatar">
                    <?= $basHarf ?>
                </div>
                <div class="profil-bilgi">
                    <h2 class="profil-isim"><?= $_data["uye_adsoyad"] ?></h2>
                    <p class="profil-eposta">
                        <span class="icon">📧</span> <?= $_data["uye_eposta"] ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="profil-icerik">
            
            <div class="icerik-kutu">
                <div class="kutu-baslik">
                    <span class="baslik-icon">📝</span>
                    <h3>Açtığı Konular</h3>
                </div>
                <ul class="liste">
                    <?php
                    $konular = $db->prepare("SELECT * FROM konular WHERE konu_uye_id=?");
                    $konular->execute([$_data["uye_id"]]);
                    $konuListesi = $konular->fetchAll(PDO::FETCH_ASSOC);

                    if ($konuListesi) {
                        foreach ($konuListesi as $row) {
                            echo '<li><a href="konu.php?link=' . $row["konu_link"] . '">' . $row["konu_ad"] . '</a></li>';
                        }
                    } else {
                        echo "<li>Henüz konu açılmamış.</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="icerik-kutu">
                <div class="kutu-baslik">
                    <span class="baslik-icon">💬</span>
                    <h3>Son Yorumlar</h3>
                </div>
                <ul class="liste">
                    <?php
                    // Yorum yapılan benzersiz konuları çek
                    $yorumlar = $db->prepare("SELECT DISTINCT y_konu_id FROM yorumlar WHERE y_uye_id=? ORDER BY y_id DESC LIMIT 10");
                    $yorumlar->execute([$_data["uye_id"]]);
                    $yorumListesi = $yorumlar->fetchAll(PDO::FETCH_ASSOC);

                    if ($yorumListesi) {
                        foreach ($yorumListesi as $yorum) {
                            $konu_cek = $db->prepare("SELECT konu_ad, konu_link FROM konular WHERE konu_id=?");
                            $konu_cek->execute([$yorum["y_konu_id"]]);
                            $_konu = $konu_cek->fetch(PDO::FETCH_ASSOC);
                            
                            if ($_konu) {
                                echo '<li><a href="konu.php?link=' . $_konu["konu_link"] . '">' . $_konu["konu_ad"] . '</a></li>';
                            }
                        }
                    } else {
                        echo "<li>Henüz yorum yapılmamış.</li>";
                    }
                    ?>
                </ul>
            </div>

        </div> </div> </body>
</html>
</html>
