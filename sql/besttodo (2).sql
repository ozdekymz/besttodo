-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 26 Ara 2021, 22:07:23
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `besttodo`
--

DELIMITER $$
--
-- Yordamlar
--
DROP PROCEDURE IF EXISTS `etkinlikler`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `etkinlikler` ()  NO SQL
SELECT etkinlikler.etkinlik_id , etkinlikler.etkinlik_adi , etkinlikler.etkinlik_yeri , etkinlikler.etkinlik_tarihi , etkinlikler.logo 
FROM etkinlikler$$

DROP PROCEDURE IF EXISTS `gorev_bilgi`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gorev_bilgi` ()  NO SQL
SELECT concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad , gorev.gorev_id , gorev.gorev , gorev.gorev_tarih
FROM personel , gorev 
WHERE gorev.per_id = personel.per_id$$

DROP PROCEDURE IF EXISTS `müdüriyet`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `müdüriyet` ()  NO SQL
SELECT concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad 
FROM personel , departman 
WHERE departman.departman_id = 6 AND personel.departman_id = departman.departman_id$$

DROP PROCEDURE IF EXISTS `personel_bilgi`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `personel_bilgi` ()  NO SQL
SELECT personel.per_id , concat(personel.per_ad,' ',personel.per_soyad) as personel_ad_soyad , departman.departman_adi , maas.maas_miktar 
FROM personel , maas , departman 
WHERE personel.maas_id = maas.maas_id AND departman.departman_id=personel.departman_id
GROUP BY personel.per_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departman`
--

DROP TABLE IF EXISTS `departman`;
CREATE TABLE IF NOT EXISTS `departman` (
  `departman_id` int(11) NOT NULL AUTO_INCREMENT,
  `departman_adi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`departman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `departman`
--

INSERT INTO `departman` (`departman_id`, `departman_adi`) VALUES
(1, 'Ön Büro '),
(2, 'Muhasebe Müdürü'),
(3, 'Personel Müdürü'),
(4, 'Housekeeper'),
(5, 'Mutfak '),
(6, 'Teknik Müdür'),
(7, 'Güvenlik Müdürü'),
(8, 'Yiyecek ve İçecek '),
(9, 'Aktivite '),
(10, 'Müşteri İlişkileri Müdürü');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eklenen_gorev_kaydi`
--

DROP TABLE IF EXISTS `eklenen_gorev_kaydi`;
CREATE TABLE IF NOT EXISTS `eklenen_gorev_kaydi` (
  `gorev_id` int(11) NOT NULL,
  `gorev` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `per_id` int(11) NOT NULL,
  `gorev_tarih` date NOT NULL,
  `eklenme_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `eklenen_gorev_kaydi`
--

INSERT INTO `eklenen_gorev_kaydi` (`gorev_id`, `gorev`, `per_id`, `gorev_tarih`, `eklenme_tarihi`) VALUES
(7, 'ddfsd', 0, '2021-12-17', '2021-12-27'),
(8, 'dddf', 5, '2021-12-17', '2021-12-27'),
(7, 'dfdfdf', 5, '2021-12-22', '2021-12-27'),
(7, 'Can Kurtaranlık Yapmak', 7, '2021-06-09', '2021-12-27'),
(8, 'Çöp Toplamak', 6, '2021-12-24', '2021-12-27'),
(9, 'Valiz Taşımak', 8, '2021-12-25', '2021-12-27'),
(10, 'Servis Açmak ', 4, '2021-12-13', '2021-12-27'),
(11, 'Oda Toplamak', 6, '2021-12-15', '2021-12-27'),
(12, 'Barmenlik Yapmak', 1, '2021-11-17', '2021-12-27'),
(13, 'Bulaşık Yıkamak', 5, '2021-10-27', '2021-12-27'),
(14, 'Çöp Toplamak', 3, '2021-12-13', '2021-12-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

DROP TABLE IF EXISTS `etkinlikler`;
CREATE TABLE IF NOT EXISTS `etkinlikler` (
  `etkinlik_id` int(11) NOT NULL AUTO_INCREMENT,
  `etkinlik_adi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `etkinlik_yeri` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `etkinlik_tarihi` date NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`etkinlik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `etkinlikler`
--

INSERT INTO `etkinlikler` (`etkinlik_id`, `etkinlik_adi`, `etkinlik_yeri`, `etkinlik_tarihi`, `logo`) VALUES
(1, 'Havuz Partisi', 'Otel Havuzu', '2021-07-06', ''),
(2, 'Animasyon Gösterisi', 'Çok Amaçlı Salon', '2021-07-01', ''),
(3, 'Köpük Partisi', 'Otel Teknesi', '2021-06-19', NULL),
(4, 'Alev Dans Gösterisi', 'Havuz Başı', '2021-09-08', NULL),
(5, 'Yüzme Yarışı', 'Otel Havuzu', '2021-06-11', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorev`
--

DROP TABLE IF EXISTS `gorev`;
CREATE TABLE IF NOT EXISTS `gorev` (
  `gorev_id` int(11) NOT NULL,
  `gorev` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `per_id` int(11) NOT NULL,
  `gorev_tarih` date NOT NULL,
  PRIMARY KEY (`gorev_id`),
  KEY `per_id` (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gorev`
--

INSERT INTO `gorev` (`gorev_id`, `gorev`, `per_id`, `gorev_tarih`) VALUES
(1, 'Çöp Toplamak', 5, '2021-12-01'),
(2, 'Oda Servisi Yapmak', 1, '2021-12-05'),
(3, 'Oda Temizliği Yapmak', 2, '2021-12-09'),
(4, 'Valiz Taşımak', 3, '2021-12-18'),
(5, 'Anahtar Teslimi', 4, '2021-12-19'),
(6, 'Servis Açmak', 6, '2021-12-29');

--
-- Tetikleyiciler `gorev`
--
DROP TRIGGER IF EXISTS `eklenen_gorev_kaydi`;
DELIMITER $$
CREATE TRIGGER `eklenen_gorev_kaydi` BEFORE INSERT ON `gorev` FOR EACH ROW INSERT INTO eklenen_gorev_kaydi VALUES(new.gorev_id,new.gorev,new.per_id,new.gorev_tarih,now())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `silinen_gorev_kaydi`;
DELIMITER $$
CREATE TRIGGER `silinen_gorev_kaydi` AFTER DELETE ON `gorev` FOR EACH ROW INSERT INTO silinen_gorev_kaydi VALUES(old.gorev_id,old.gorev,old.per_id,old.gorev_tarih,now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maas`
--

DROP TABLE IF EXISTS `maas`;
CREATE TABLE IF NOT EXISTS `maas` (
  `maas_id` int(11) NOT NULL,
  `maas_miktar` int(11) NOT NULL,
  PRIMARY KEY (`maas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `maas`
--

INSERT INTO `maas` (`maas_id`, `maas_miktar`) VALUES
(1, 2826),
(2, 3560),
(3, 4800),
(4, 6000);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

DROP TABLE IF EXISTS `personel`;
CREATE TABLE IF NOT EXISTS `personel` (
  `per_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `departman_id` int(11) DEFAULT NULL,
  `per_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `per_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `p_dg_tarih` date NOT NULL,
  `maas_id` int(11) NOT NULL,
  PRIMARY KEY (`per_id`),
  KEY `maas_id` (`maas_id`),
  KEY `user_id` (`user_id`),
  KEY `departman_id` (`departman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`per_id`, `user_id`, `departman_id`, `per_ad`, `per_soyad`, `p_dg_tarih`, `maas_id`) VALUES
(1, 3, 4, 'Yağız', 'Cenk', '1997-12-22', 1),
(2, 4, 1, 'Yelda', 'Korkmaz', '1994-02-25', 2),
(3, 5, 4, 'Bahri', 'Çağlayan', '1990-01-16', 3),
(4, 6, 1, 'Gizem', 'Cevher', '2000-09-16', 4),
(5, 7, 8, 'Tuğçe', 'Topçu', '1999-12-24', 1),
(6, 8, 7, 'Ege', 'Arıcı', '1998-02-16', 2),
(7, 1, 6, 'Ömer ', 'Kars', '1995-08-19', 3),
(8, 2, 6, 'Furkan', 'Anter', '1993-12-28', 1),
(9, 11, 10, 'Özde Naz', 'Kaymaz', '1999-12-13', 4),
(10, 12, 10, 'Aybüke Mislina', 'Kalıcı', '2000-12-16', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `silinen_gorev_kaydi`
--

DROP TABLE IF EXISTS `silinen_gorev_kaydi`;
CREATE TABLE IF NOT EXISTS `silinen_gorev_kaydi` (
  `gorev_id` int(11) NOT NULL,
  `gorev` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `per_id` int(11) NOT NULL,
  `gorev_tarih` date NOT NULL,
  `silinme_tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `silinen_gorev_kaydi`
--

INSERT INTO `silinen_gorev_kaydi` (`gorev_id`, `gorev`, `per_id`, `gorev_tarih`, `silinme_tarih`) VALUES
(7, 'ddfsd', 0, '2021-12-17', '2021-12-27'),
(8, 'dddf', 5, '2021-12-17', '2021-12-27'),
(7, 'dfdfdf', 5, '2021-12-22', '2021-12-27'),
(7, 'Can Kurtaranlık Yapmak', 7, '2021-06-09', '2021-12-27'),
(8, 'Çöp Toplamak', 6, '2021-12-24', '2021-12-27'),
(9, 'Valiz Taşımak', 8, '2021-12-25', '2021-12-27'),
(10, 'Servis Açmak ', 4, '2021-12-13', '2021-12-27'),
(11, 'Oda Toplamak', 6, '2021-12-15', '2021-12-27'),
(12, 'Barmenlik Yapmak', 1, '2021-11-17', '2021-12-27'),
(13, 'Bulaşık Yıkamak', 5, '2021-10-27', '2021-12-27'),
(14, 'Çöp Toplamak', 3, '2021-12-13', '2021-12-27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `create_datetime` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'omer.kars', 'omer@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(2, 'furkan.anter', 'furkan@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', '2021-12-26'),
(3, 'yagiz.cenk', 'yagiz@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(4, 'yelda.korkmaz', 'yelda@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(5, 'bahri.caglayan', 'bahri@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(6, 'gizem.cevher', 'gizem@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(7, 'tugce.topcu', 'tugce@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(8, 'ege.arici', 'ege@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(11, 'ozde.kaymaz', 'ozde@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26'),
(12, 'aybuke.kalici', 'aybuke@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-26');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `gorev`
--
ALTER TABLE `gorev`
  ADD CONSTRAINT `kisit2` FOREIGN KEY (`per_id`) REFERENCES `personel` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `personel`
--
ALTER TABLE `personel`
  ADD CONSTRAINT `kisit1` FOREIGN KEY (`maas_id`) REFERENCES `maas` (`maas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personel_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personel_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman` (`departman_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
