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

<body>
    <?php include 'header.php'; ?>
    
    <div class="uyeler-container">
        <div class="uyeler-box">
            <h2>Üyelerimiz</h2>
            <ul class="uyeler-liste">
                <?php
                $dataList = $db->prepare("SELECT * FROM uyeler");
                $dataList->execute();
                $dataList = $dataList->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dataList as $row) {
                    echo '<li class="uye-item">
                            <a href="profil.php?kadi=' . htmlspecialchars($row["uye_kadi"]) . '">
                                <span class="uye-icon">👤</span>
                                <span class="uye-isim">' . htmlspecialchars($row["uye_adsoyad"]) . '</span>
                                <span class="uye-arrow">→</span>
                            </a>
                          </li>';
                }
                ?>
            </ul>
        </div>
    </div>

</body>
</html>
