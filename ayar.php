<?php
// Codexnook - Database Configuration
// Not: GitHub'a yüklerken şifre gibi hassas bilgileri temizlemeyi unutmayın!

$host    = "localhost";
$dbname  = "forumsitesi";
$charset = "utf8";
$root    = "root";     // Kendi kullanıcı adınızla değiştirin
$password = "";         // Şifrenizi buraya boş bırakıp yerelinizde doldurun

try {
    // Veritabanı bağlantısı
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root, $password);
    
    // Hata modunu aktifleştirelim (Geliştirme aşamasında hataları görmek için iyidir)
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
    // Hata mesajını kullanıcıya çok detaylı göstermek güvenlik açığı yaratabilir
    // Mühendislik yaklaşımı: Hata varsa "Bağlantı Hatası" yazdır, detayı logla.
    die("Veritabanı bağlantı hatası oluştu.");
}

// Oturum/Cookie Kontrolü
if(isset($_COOKIE["uye_eposta"])) {
    $uyecek = $db->prepare("SELECT * FROM uyeler WHERE uye_eposta=?");
    $uyecek->execute([$_COOKIE["uye_eposta"]]);
    $fetch = $uyecek->fetch(PDO::FETCH_ASSOC);
}
?>
