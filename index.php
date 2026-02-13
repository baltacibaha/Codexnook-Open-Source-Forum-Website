<?php
session_start();

// DEBUG: Session durumunu kontrol et
echo "<!-- Session Durumu: ";
echo isset($_SESSION['uye_id']) ? "GİRİŞLİ - ID: " . $_SESSION['uye_id'] : "ÇIKIŞ YAPILMIŞ";
echo " -->";

require_once 'ayar.php';
require_once 'ukas.php';
require_once 'func.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yazılım-Teknoloji Forumu</title>
    <link rel="stylesheet" href="main.css" />
</head>
<body>

    <?php include 'header.php'; ?>

   <main class="container main-content">
    
    <div class="left-column">
        
        <section class="card">
            <div class="card-header highlight">
                <span class="icon">🔥</span>
                <h3>Yeni Açılan Konular</h3>
            </div>
            <div class="card-body">
                <div class="topics-list">
                    <?php
                    $topics = $db->query("SELECT konu_ad, konu_link FROM konular ORDER BY konu_id DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($topics as $row): ?>
                        <div class="topic-row">
                            <a href="konu.php?link=<?= htmlspecialchars($row["konu_link"]) ?>">
                                <span class="bullet">#</span> <?= htmlspecialchars($row["konu_ad"]) ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="card">
            <div class="card-header">
                <span class="icon">💬</span>
                <h3>Son Cevaplar</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php
                    $sql = "SELECT DISTINCT k.konu_ad, k.konu_link FROM yorumlar y JOIN konular k ON y.y_konu_id = k.konu_id ORDER BY y.y_id DESC LIMIT 8";
                    $replies = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($replies as $reply): ?>
                        <li class="list-item">
                            <a href="konu.php?link=<?= htmlspecialchars($reply["konu_link"]) ?>"><?= htmlspecialchars($reply["konu_ad"]) ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

    </div>

    <div class="right-column">
        <section class="card">
            <div class="card-header">
                <span class="icon">📂</span>
                <h3>Kategoriler</h3>
            </div>
            <div class="category-vertical-grid">
                <?php
                $categories = $db->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $cat): ?>
                    <a href="kategori.php?q=<?= htmlspecialchars($cat["k_kategori_link"]) ?>" class="category-box">
                        <span class="cat-name"><?= htmlspecialchars($cat["k_kategori"]) ?></span>
                        <span class="cat-arrow">→</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

</main>

</body>
</html>

