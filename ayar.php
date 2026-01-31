<?php
// 1. Veritabanı Bilgileri
$host     = "localhost";
$dbname   = "forumsitesi"; // Veritabanı adının doğruluğundan emin ol
$charset  = "utf8";
$username = "root";       // Yerel sunucularda varsayılan kullanıcı her zaman root'tur
$password = "";           // Şifre genelde boştur

try {
    // 2. PDO Bağlantısı
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
    
    // 3. Hata Yakalama Modu (Üniversite başvurusu için çok kritik: Hataları görmemizi sağlar)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $error) {
    // Bağlantı hatası varsa kodu durdur ve hatayı söyle
    die("Veritabanı bağlantı hatası: " . $error->getMessage());
}

// 4. Çerez (Cookie) ile Oturum Kontrolü
if (!empty($_COOKIE["uye_eposta"])) {
    try {
        $uyecek = $db->prepare("SELECT * FROM uyeler WHERE uye_eposta = ?");
        $uyecek->execute([$_COOKIE["uye_eposta"]]);
        $fetch = $uyecek->fetch(PDO::FETCH_ASSOC);
        
        // Eğer veritabanında bu maille bir kullanıcı varsa session'a ata
        if ($fetch) {
            $_SESSION["uye_id"] = $fetch["uye_id"];
            $_SESSION["uye_kadi"] = $fetch["uye_kadi"];
        }
    } catch (PDOException $e) {
        // Sessizce hata raporla veya logla
    }
}
?>
