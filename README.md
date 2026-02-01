# 🌐 CodexNook - Forum Sitesi

CodexNook, PHP ve MySQL kullanılarak geliştirilmiş modern bir forum platformudur. Kullanıcıların konu açabileceği, yorum yapabileceği ve etkileşimde bulunabileceği bir topluluk sitesidir.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

---

## 📸 Ekran Görüntüleri

### 🏠 Ana Sayfa
<img width="1919" height="904" alt="Image" src="https://github.com/user-attachments/assets/909f4d04-9a8f-4e7f-8ef1-dccc668314bf" />

### 🔐 Giriş & Kayıt
<div align="center">
  <img width="1919" height="900" alt="Image" src="https://github.com/user-attachments/assets/83cee2d6-12d8-4361-ad4d-312ac8e84509" width="45%">
  <img width="1919" height="905" alt="Image" src="https://github.com/user-attachments/assets/d4e09a30-cbb4-4f44-8a45-3ee5fd67981d" width="45%">
</div>

### 👤 Profil Sayfası
<img width="1919" height="903" alt="Image" src="https://github.com/user-attachments/assets/ab21084b-0280-4669-bb0d-e9a0dad540d2" />

### 👥 Üyeler Listesi
<img width="1919" height="905" alt="Image" src="https://github.com/user-attachments/assets/fabd6fea-5a4b-432e-8909-2a027d28549e" />

---

## ✨ Özellikler

### 👤 Kullanıcı Yönetimi
- ✅ Güvenli kayıt olma sistemi
- ✅ Kullanıcı girişi ve çıkışı
- ✅ Kişiselleştirilmiş profil sayfaları
- ✅ Üye listesi ve profil görüntüleme
- ✅ Oturum yönetimi

### 💬 Forum Özellikleri
- ✅ Konu açma ve düzenleme
- ✅ Yorum yapma
- ✅ Kategori bazlı içerik organizasyonu
- ✅ Kullanıcı aktivite takibi
- ✅ Son konular ve yanıtlar

### ⚙️ Admin Paneli
- ✅ Kategori ekleme ve yönetimi
- ✅ İçerik moderasyonu
- ✅ Kullanıcı yönetimi
- ✅ Yetki kontrolü

### 🎨 Modern Tasarım
- ✅ Responsive (mobil uyumlu) tasarım
- ✅ Minimalist ve temiz arayüz
- ✅ Kullanıcı dostu deneyim
- ✅ Smooth animasyonlar
- ✅ Modern renk paleti (#3498db mavi teması)

---

## 🚀 Kurulum

### Gereksinimler

- **PHP** 7.4 veya üzeri
- **MySQL** 5.7 veya üzeri
- **Apache/Nginx** web sunucusu
- **XAMPP/WAMP** (yerel geliştirme için)

### 📥 Adım Adım Kurulum

#### 1️⃣ Projeyi İndirin
```bash
git clone https://github.com/baltacibaha/codexnook.git
cd codexnook
```

#### 2️⃣ Veritabanını Oluşturun

- **phpMyAdmin**'e gidin
- Yeni bir veritabanı oluşturun: `forumsitesi`
- `database.sql` dosyasını import edin
```sql
CREATE DATABASE forumsitesi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### 3️⃣ Veritabanı Ayarlarını Yapın

`ayar.php` dosyasını açın ve bilgilerinizi girin:
```php
<?php
$host = "localhost";
$dbname = "forumsitesi";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}
?>
```

#### 4️⃣ Admin Kullanıcı Oluşturun

Veritabanında admin yetkisi vermek için:
```sql
UPDATE uyeler SET uye_onay = 1 WHERE uye_id = 1;
```

#### 5️⃣ Projeyi Çalıştırın

- XAMPP/WAMP'ı başlatın
- Apache ve MySQL servislerini açın
- Tarayıcınızda açın: `http://localhost/index.php`

---

## 📁 Proje Yapısı
```
codexnook/
│
├── 📄 index.php              # Ana sayfa
├── 📄 uyelik.php             # Giriş/Kayıt sayfası
├── 📄 profil.php             # Kullanıcı profil sayfası
├── 📄 uyeler.php             # Üye listesi
├── 📄 admin.php              # Admin paneli
├── 📄 konu.php               # Konu detay sayfası
├── 📄 kategori.php           # Kategori sayfası
│
├── ⚙️ ayar.php               # Veritabanı ayarları
├── 🔐 ukas.php               # Kimlik doğrulama sistemi
├── 🛠️ func.php               # Yardımcı fonksiyonlar
│
├── 📱 header.php             # Header componenti
├── 📱 header2.php            # Alternatif header
│
├── 🎨 main.css               # Ana stil dosyası
├── 🎨 uyelik.css             # Giriş/Kayıt stilleri
├── 🎨 admin.css              # Admin paneli stilleri
│
├── 📸 screenshots/           # Ekran görüntüleri
│   ├── home.png
│   ├── login.png
│   ├── profile.png
│   └── ...
│
├── 🖼️ icon.png               # Site ikonu
└── 📖 README.md              # Bu dosya
```

---

## 🗄️ Veritabanı Yapısı

### Tablolar

| Tablo | Açıklama |
|-------|----------|
| **uyeler** | Kullanıcı bilgileri (id, ad, soyad, email, şifre, onay) |
| **konular** | Forum konuları (id, başlık, içerik, kategori, yazar) |
| **yorumlar** | Konu yorumları (id, konu_id, yazar, içerik) |
| **kategoriler** | Kategori listesi (id, kategori_adı, link) |

### Veritabanı Şeması
```sql
-- Kullanıcılar Tablosu
CREATE TABLE uyeler (
    uye_id INT AUTO_INCREMENT PRIMARY KEY,
    uye_adsoyad VARCHAR(100),
    uye_kadi VARCHAR(50) UNIQUE,
    uye_sifre VARCHAR(255),
    uye_eposta VARCHAR(100) UNIQUE,
    uye_onay TINYINT DEFAULT 0
);

-- Kategoriler Tablosu
CREATE TABLE kategoriler (
    k_id INT AUTO_INCREMENT PRIMARY KEY,
    k_kategori VARCHAR(100),
    k_kategori_link VARCHAR(100)
);

-- Konular Tablosu
CREATE TABLE konular (
    konu_id INT AUTO_INCREMENT PRIMARY KEY,
    konu_ad VARCHAR(255),
    konu_link VARCHAR(255),
    konu_icerik TEXT,
    konu_uye_id INT,
    konu_kategori_id INT,
    konu_tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Yorumlar Tablosu
CREATE TABLE yorumlar (
    y_id INT AUTO_INCREMENT PRIMARY KEY,
    y_konu_id INT,
    y_uye_id INT,
    y_icerik TEXT,
    y_tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🔐 Güvenlik Özellikleri

- ✅ **Şifreleme:** MD5 + SHA1 double hash
- ✅ **SQL Injection Koruması:** PDO prepared statements
- ✅ **XSS Koruması:** `htmlspecialchars()` filtreleme
- ✅ **Session Yönetimi:** Güvenli oturum kontrolü
- ✅ **Email Validasyon:** Gerçek email kontrolü

---

### ⚙️ Admin Paneli

Admin paneline erişmek için:
```sql
UPDATE uyeler SET uye_onay = 1 WHERE uye_id = YOUR_ID;
```

Sonra `/admin.php` adresine gidin.

---

## 🛠️ Kullanılan Teknolojiler

| Teknoloji | Versiyon | Kullanım Amacı |
|-----------|----------|----------------|
| PHP | 7.4+ | Backend geliştirme |
| MySQL | 5.7+ | Veritabanı yönetimi |
| PDO | - | Güvenli veritabanı bağlantısı |
| HTML5 | - | Sayfa yapısı |
| CSS3 | - | Stil ve tasarım |

### Kütüphaneler ve Araçlar

- **UKAS** - Kullanıcı kimlik doğrulama sistemi
- **PDO** - MySQL bağlantısı
- **MD5 + SHA1** - Şifre hashleme

---


## 🤝 Katkıda Bulunma

Katkılarınızı bekliyoruz! 🎉

### Nasıl Katkıda Bulunurum?

1. **Fork** yapın
2. Yeni bir **branch** oluşturun
```bash
   git checkout -b feature/YeniOzellik
```
3. Değişikliklerinizi **commit** edin
```bash
   git commit -m 'feat: Yeni özellik eklendi'
```
4. Branch'inizi **push** edin
```bash
   git push origin feature/YeniOzellik
```
5. **Pull Request** açın

---

## 📧 İletişim

**Baha Baltacı**

- 📧 Email: baltacibaha476@gmail.com
- 🐙 GitHub: [@baltacibaha](https://github.com/baltacibaha)
- 🔗 Proje: [CodexNook](https://github.com/baltacibaha/Codexnook-Open-Source-Forum-Website)

---

## 🙏 Teşekkürler

- **MorphaxTheDeveloper** - [MorphaxTheDeveloper](https://github.com/MorphaxTheDeveloper) Tüm Destekleri İçin 💙
- **Tüm katkıda bulunanlara** - Destekleri için 

---

## ⭐ Yıldız Verin!

Bu projeyi beğendiyseniz **yıldız** ⭐ vermeyi unutmayın!

---

<div align="center">

**Made with ❤️ by [Baha Baltacı](https://github.com/kullanici-adiniz)**

[⬆ Yukarı Çık](#-codexnook---forum-sitesi)

</div>
