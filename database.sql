-- Codexnook Full Database Schema
-- Version: 1.0
-- Description: Unified database for forum system including categories, users, topics, and comments.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- 1. Tablo: kategoriler
-- --------------------------------------------------------
CREATE TABLE `kategoriler` (
  `k_id` int(11) NOT NULL,
  `k_kategori` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `k_kategori_link` varchar(200) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `kategoriler` (`k_id`, `k_kategori`, `k_kategori_link`) VALUES
(1, 'Konu Dışı', 'konu-disi'),
(2, 'PHP Kütüphanesi', 'php-kutuphanesi'),
(3, 'Kendinizi Tanıtın', 'kendinizi-tanitin'),
(4, 'HTML', 'html'),
(5, 'CSS', 'css'),
(6, 'Pyhton', 'Pyhton'),
(7, 'Ruby', 'ruby'),
(8, 'Unity', 'unity'),
(9, 'C#', 'c'),
(10, 'Çikolatalı gofret', 'cikolatali-gofret'),
(13, 'Reklam', 'reklam');

-- --------------------------------------------------------
-- 2. Tablo: uyeler
-- --------------------------------------------------------
CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_adsoyad` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_kadi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_eposta` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `uye_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `uyeler` (`uye_id`, `uye_adsoyad`, `uye_kadi`, `uye_sifre`, `uye_eposta`, `uye_onay`) VALUES
(1, 'Admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@example.com', 1);

-- --------------------------------------------------------
-- 3. Tablo: konular
-- --------------------------------------------------------
CREATE TABLE `konular` (
  `konu_id` int(11) NOT NULL,
  `konu_uye_id` int(11) NOT NULL,
  `konu_kategori_link` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `konu_ad` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `konu_link` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `konu_mesaj` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `konu_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `konular` (`konu_id`, `konu_uye_id`, `konu_kategori_link`, `konu_ad`, `konu_link`, `konu_mesaj`, `konu_tarih`) VALUES
(1, 1, 'genel', 'Codexnook Forumuna Hoş Geldiniz!', 'hos-geldiniz-1', 'Bu bir test konusudur.', CURRENT_TIMESTAMP);

-- --------------------------------------------------------
-- 4. Tablo: yorumlar
-- --------------------------------------------------------
CREATE TABLE `yorumlar` (
  `y_id` int(11) NOT NULL,
  `y_uye_id` int(11) NOT NULL,
  `y_konu_id` int(11) NOT NULL,
  `y_yorum` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `y_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `yorumlar` (`y_id`, `y_uye_id`, `y_konu_id`, `y_yorum`, `y_tarih`) VALUES
(1, 1, 1, 'Harika bir proje, başarılar!', CURRENT_TIMESTAMP);

-- --------------------------------------------------------
-- İndeksler ve Otomatik Artırma (Indexes & Auto Increment)
-- --------------------------------------------------------
ALTER TABLE `kategoriler` ADD PRIMARY KEY (`k_id`);
ALTER TABLE `uyeler` ADD PRIMARY KEY (`uye_id`);
ALTER TABLE `konular` ADD PRIMARY KEY (`konu_id`);
ALTER TABLE `yorumlar` ADD PRIMARY KEY (`y_id`);

ALTER TABLE `kategoriler` MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `uyeler` MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `konular` MODIFY `konu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `yorumlar` MODIFY `y_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;