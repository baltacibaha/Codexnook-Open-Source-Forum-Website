<?php
session_start();
include 'ayar.php';
include 'ukas.php';
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CodexNook | Giriş & Kayıt</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="uyelik.css" />
</head>

<body>

    <?php
    $p = isset($_GET["p"]) ? $_GET["p"] : '';

    switch ($p) {
        case 'cikis':
            // Session'ı temizle
            $_SESSION = array();
            
            // Session cookie'sini sil
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
            
            // Session'ı yok et
            session_destroy();
            
            // Ana sayfaya yönlendir
            header("Location: index.php");
            exit();
            break;

        case 'kayit':
            if (isset($_SESSION["uye_id"])) {
                header("Location: index.php");
                exit();
            } else {
                ukas_kayit("ayar.php", "<div class='alert alert-warning'>⚠️ Lütfen tüm alanları doldurunuz!</div>", "<div class='alert alert-danger'>❌ Bu e-posta adresi kullanılıyor!</div>", "<div class='alert alert-warning'>⚠️ Bu kullanıcı adı alınmış!</div>", "<div class='alert alert-success'>✅ Başarıyla kayıt oldunuz! Yönlendiriliyorsunuz...</div>", "index.php", "<div class='alert alert-danger'>❌ Kullanıcı adı veya şifre hatalı!</div>", "<div class='alert alert-danger'>❌ Kayıt işlemi başarısız!</div>", "<div class='alert alert-warning'>⚠️ Şifreler eşleşmiyor!</div>", "<div class='alert alert-danger'>❌ Geçerli bir e-posta adresi giriniz!</div>");
                ?>
                
                <div class="auth-container">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="auth-icon">👤</div>
                            <h1>Kayıt Ol</h1>
                            <p>CodexNook'a hoş geldiniz!</p>
                        </div>
                        
                        <form action="" method="POST" class="auth-form">
                            <div class="form-group">
                                <label for="adsoyad">
                                    <span class="label-icon">👨</span>
                                    Ad Soyad
                                </label>
                                <input type="text" id="adsoyad" class="form-input" name="adsoyad" placeholder="Ad Soyadınız" required>
                            </div>

                            <div class="form-group">
                                <label for="kadi">
                                    <span class="label-icon">🔤</span>
                                    Kullanıcı Adı
                                </label>
                                <input type="text" id="kadi" class="form-input" name="kadi" placeholder="Kullanıcı adınız" required>
                            </div>

                            <div class="form-group">
                                <label for="sifre">
                                    <span class="label-icon">🔒</span>
                                    Şifre
                                </label>
                                <input type="password" id="sifre" class="form-input" name="sifre" placeholder="••••••••" required>
                            </div>

                            <div class="form-group">
                                <label for="sifret">
                                    <span class="label-icon">🔐</span>
                                    Şifre (Tekrar)
                                </label>
                                <input type="password" id="sifret" class="form-input" name="sifret" placeholder="••••••••" required>
                            </div>

                            <div class="form-group">
                                <label for="eposta">
                                    <span class="label-icon">✉️</span>
                                    E-Posta
                                </label>
                                <input type="email" id="eposta" class="form-input" name="eposta" placeholder="ornek@email.com" required>
                            </div>

                            <button type="submit" class="btn-submit" name="kayit">
                                <span>Kayıt Ol</span>
                                <span class="btn-arrow">→</span>
                            </button>
                        </form>

                        <div class="auth-footer">
                            <p>Zaten hesabınız var mı?</p>
                            <a href="uyelik.php?p=giris" class="link-alt">Giriş Yap</a>
                            <a href="index.php" class="link-home">← Ana Sayfaya Dön</a>
                        </div>
                    </div>
                </div>
                
                <?php
            }
            break;

        default:
            if (isset($_SESSION["uye_id"])) {
                header("Location: index.php");
                exit();
            } else {
                ukas_giris("ayar.php", "index.php", "<div class='alert alert-warning'>⚠️ Lütfen tüm alanları doldurunuz!</div>", "<div class='alert alert-danger'>❌ Kullanıcı adı veya şifre hatalı!</div>");
                ?>
                
                <div class="auth-container">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="auth-icon">🔐</div>
                            <h1>Giriş Yap</h1>
                            <p>Hesabınıza giriş yapın</p>
                        </div>
                        
                        <form action="" method="POST" class="auth-form">
                            <div class="form-group">
                                <label for="kadi">
                                    <span class="label-icon">👤</span>
                                    Kullanıcı Adı
                                </label>
                                <input type="text" id="kadi" class="form-input" name="kadi" placeholder="Kullanıcı adınız" required>
                            </div>

                            <div class="form-group">
                                <label for="sifre">
                                    <span class="label-icon">🔒</span>
                                    Şifre
                                </label>
                                <input type="password" id="sifre" class="form-input" name="sifre" placeholder="••••••••" required>
                            </div>

                            <button type="submit" class="btn-submit" name="giris">
                                <span>Giriş Yap</span>
                                <span class="btn-arrow">→</span>
                            </button>
                        </form>

                        <div class="auth-footer">
                            <p>Hesabınız yok mu?</p>
                            <a href="uyelik.php?p=kayit" class="link-alt">Kayıt Ol</a>
                            <a href="index.php" class="link-home">← Ana Sayfaya Dön</a>
                        </div>
                    </div>
                </div>
                
                <?php
            }
            break;
    }
    ?>

</body>
</html>
