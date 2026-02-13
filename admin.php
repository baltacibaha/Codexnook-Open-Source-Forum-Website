<?php
// Oturumu başlat
session_start();

// Veritabanı ayarları
include 'ayar.php';
include 'ukas.php';
include 'func.php';

// Admin ID listesi
$admin_idler = [1, 2]; // Admin olan kullanıcı ID'leri

// Admin kontrolü
if (!isset($_SESSION["uye_id"]) || !in_array((int)$_SESSION["uye_id"], $admin_idler)) {
    echo '<center><h1>❌ Sadece yöneticiler görebilir</h1></center>';
    echo '<center><a href="index.php" style="color:#3498db; text-decoration:none;">← Ana Sayfaya Dön</a></center>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum.com/Admin</title>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="admin.css" />
</head>

<body>
    <?php include 'header2.php'; ?>

    <div class="container">
        <br><br>
        <h2>⚙️ Admin Paneli</h2>
        <p style="color:#7f8c8d;">Hoş geldiniz, <?= htmlspecialchars($_SESSION['uye_adsoyad']) ?>!</p>
        <hr>
        <h3>Kategori Ekle</h3>
        
        <?php
        if ($_POST) {
            $kategori = htmlspecialchars(trim($_POST["kategori"]));
            $kategoriLink = permalink($kategori);

            if (!empty($kategori)) {
                $dataAdd = $db->prepare("INSERT INTO kategoriler SET k_kategori=?, k_kategori_link=?");
                $dataAdd->execute([$kategori, $kategoriLink]);

                if ($dataAdd) {
                    echo '<p class="alert alert-success">✅ Kategori başarıyla eklendi!</p>';
                    header("REFRESH:1;URL=admin.php");
                } else {
                    echo '<p class="alert alert-danger">❌ Bir sorunla karşılaştık!</p>';
                }
            } else {
                echo '<p class="alert alert-warning">⚠️ Kategori adı boş olamaz!</p>';
            }
        }
        ?>
        
        <form action="" method="post" class="admin-form">
            <div class="form-group">
                <label for="kategori"><strong>Kategori Adı:</strong></label>
                <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Kategori adı giriniz" required>
            </div>
            <button type="submit" class="btn-submit">Kategori Oluştur</button>
        </form>

        <hr>

        <h3>Mevcut Kategoriler</h3>
        <ol class="category-list">
            <?php
            $dataList = $db->prepare("SELECT * FROM kategoriler ORDER BY k_kategori ASC");
            $dataList->execute();
            $dataList = $dataList->fetchALL(PDO::FETCH_ASSOC);

            if (count($dataList) > 0) {
                foreach ($dataList as $row) {
                    echo '<li><a href="kategori.php?q=' . htmlspecialchars($row["k_kategori_link"]) . '">' . htmlspecialchars($row["k_kategori"]) . '</a></li>';
                }
            } else {
                echo '<li>Henüz kategori eklenmemiş.</li>';
            }
            ?>
        </ol>
    </div>

</body>

</html>

