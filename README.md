# 🌐 CodexNook - Forum Website

CodexNook is a modern forum platform developed using PHP and MySQL. It's a community site where users can open topics, make comments, and interact with each other.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

---

## 📸 Screenshots

### 🏠 Home Page
<img width="1919" height="904" alt="Image" src="https://github.com/user-attachments/assets/909f4d04-9a8f-4e7f-8ef1-dccc668314bf" />

### 🔐 Login & Register
<div align="center">
  <img width="1919" height="900" alt="Image" src="https://github.com/user-attachments/assets/83cee2d6-12d8-4361-ad4d-312ac8e84509" width="45%">
  <img width="1919" height="905" alt="Image" src="https://github.com/user-attachments/assets/d4e09a30-cbb4-4f44-8a45-3ee5fd67981d" width="45%">
</div>

### 👤 Profile Page
<img width="1919" height="903" alt="Image" src="https://github.com/user-attachments/assets/ab21084b-0280-4669-bb0d-e9a0dad540d2" />

### 👥 Members List
<img width="1919" height="905" alt="Image" src="https://github.com/user-attachments/assets/fabd6fea-5a4b-432e-8909-2a027d28549e" />

---

## ✨ Features

### 👤 User Management
- ✅ Secure registration system
- ✅ User login and logout
- ✅ Personalized profile pages
- ✅ Members list and profile viewing
- ✅ Session management

### 💬 Forum Features
- ✅ Create and edit topics
- ✅ Comment on topics
- ✅ Category-based content organization
- ✅ User activity tracking
- ✅ Latest topics and replies

### ⚙️ Admin Panel
- ✅ Add and manage categories
- ✅ Content moderation
- ✅ User management
- ✅ Permission control

### 🎨 Modern Design
- ✅ Responsive (mobile-friendly) design
- ✅ Minimalist and clean interface
- ✅ User-friendly experience
- ✅ Smooth animations
- ✅ Modern color palette (#3498db blue theme)

---

## 🚀 Installation

### Requirements

- **PHP** 7.4 or higher
- **MySQL** 5.7 or higher
- **Apache/Nginx** web server
- **XAMPP/WAMP** (for local development)

### 📥 Step by Step Installation

#### 1️⃣ Clone the Project
```bash
git clone https://github.com/baltacibaha/codexnook.git
cd codexnook
```

#### 2️⃣ Create the Database

- Go to **phpMyAdmin**
- Create a new database: `forumsitesi`
- Import the `database.sql` file
```sql
CREATE DATABASE forumsitesi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### 3️⃣ Configure Database Settings

Open the `ayar.php` file and enter your information:
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
    die("Connection error: " . $e->getMessage());
}
?>
```

#### 4️⃣ Create Admin User

To grant admin privileges in the database:
```sql
UPDATE uyeler SET uye_onay = 1 WHERE uye_id = 1;
```

#### 5️⃣ Run the Project

- Start XAMPP/WAMP
- Turn on Apache and MySQL services
- Open in your browser: `http://localhost/index.php`

---

## 📁 Project Structure
```
codexnook/
│
├── 📄 index.php              # Home page
├── 📄 uyelik.php             # Login/Register page
├── 📄 profil.php             # User profile page
├── 📄 uyeler.php             # Members list
├── 📄 admin.php              # Admin panel
├── 📄 konu.php               # Topic detail page
├── 📄 kategori.php           # Category page
│
├── ⚙️ ayar.php               # Database settings
├── 🔐 ukas.php               # Authentication system
├── 🛠️ func.php               # Helper functions
│
├── 📱 header.php             # Header component
├── 📱 header2.php            # Alternative header
│
├── 🎨 main.css               # Main stylesheet
├── 🎨 uyelik.css             # Login/Register styles
├── 🎨 admin.css              # Admin panel styles
│
├── 📸 screenshots/           # Screenshots
│   ├── home.png
│   ├── login.png
│   ├── profile.png
│   └── ...
│
├── 🖼️ icon.png               # Site icon
└── 📖 README.md              # This file
```

---

## 🗄️ Database Structure

### Tables

| Table | Description |
|-------|-------------|
| **uyeler** | User information (id, name, surname, email, password, approval) |
| **konular** | Forum topics (id, title, content, category, author) |
| **yorumlar** | Topic comments (id, topic_id, author, content) |
| **kategoriler** | Category list (id, category_name, link) |

### Database Schema
```sql
-- Users Table
CREATE TABLE uyeler (
    uye_id INT AUTO_INCREMENT PRIMARY KEY,
    uye_adsoyad VARCHAR(100),
    uye_kadi VARCHAR(50) UNIQUE,
    uye_sifre VARCHAR(255),
    uye_eposta VARCHAR(100) UNIQUE,
    uye_onay TINYINT DEFAULT 0
);

-- Categories Table
CREATE TABLE kategoriler (
    k_id INT AUTO_INCREMENT PRIMARY KEY,
    k_kategori VARCHAR(100),
    k_kategori_link VARCHAR(100)
);

-- Topics Table
CREATE TABLE konular (
    konu_id INT AUTO_INCREMENT PRIMARY KEY,
    konu_ad VARCHAR(255),
    konu_link VARCHAR(255),
    konu_icerik TEXT,
    konu_uye_id INT,
    konu_kategori_id INT,
    konu_tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Comments Table
CREATE TABLE yorumlar (
    y_id INT AUTO_INCREMENT PRIMARY KEY,
    y_konu_id INT,
    y_uye_id INT,
    y_icerik TEXT,
    y_tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🔐 Security Features

- ✅ **Encryption:** MD5 + SHA1 double hash
- ✅ **SQL Injection Protection:** PDO prepared statements
- ✅ **XSS Protection:** `htmlspecialchars()` filtering
- ✅ **Session Management:** Secure session control
- ✅ **Email Validation:** Real email verification

---

### ⚙️ Admin Panel

To access the admin panel:
```sql
UPDATE uyeler SET uye_onay = 1 WHERE uye_id = YOUR_ID;
```

Then visit `/admin.php`.

---

## 🛠️ Technologies Used

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 7.4+ | Backend development |
| MySQL | 5.7+ | Database management |
| PDO | - | Secure database connection |
| HTML5 | - | Page structure |
| CSS3 | - | Styling and design |

### Libraries and Tools

- **UKAS** - User authentication system
- **PDO** - MySQL connection
- **MD5 + SHA1** - Password hashing

---

## 🤝 Contributing

We welcome your contributions! 🎉

### How to Contribute?

1. **Fork** the repository
2. Create a new **branch**
```bash
   git checkout -b feature/NewFeature
```
3. **Commit** your changes
```bash
   git commit -m 'feat: Add new feature'
```
4. **Push** your branch
```bash
   git push origin feature/NewFeature
```
5. Open a **Pull Request**

---

## 📧 Contact

**Baha Baltacı**

- 📧 Email: baltacibaha476@gmail.com
- 🐙 GitHub: [@baltacibaha](https://github.com/baltacibaha)
- 🔗 Project: [CodexNook](https://github.com/baltacibaha/Codexnook-Open-Source-Forum-Website)

---

## 🙏 Thanks

- **MorphaxTheDeveloper** - [MorphaxTheDeveloper](https://github.com/MorphaxTheDeveloper) For all the support 💙
- **All contributors** - For their support

---

## ⭐ Give a Star!

If you like this project, don't forget to give it a **star** ⭐!

---

<div align="center">

**Made with ❤️ by [Baha Baltacı](https://github.com/baltacibaha)**

[⬆ Back to Top](#-codexnook---forum-website)

</div>
