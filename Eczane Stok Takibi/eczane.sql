-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Oca 2023, 21:26:27
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
-- Veritabanı: `eczane`
--

DELIMITER $$
--
-- Yordamlar
--
DROP PROCEDURE IF EXISTS `proKategoriSil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proKategoriSil` (IN `kategoriid` INT, OUT `sonuc` INT)  NO SQL
BEGIN
DELETE FROM kategori where kategori_id=kategoriid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(7) NOT NULL AUTO_INCREMENT,
  `kategori_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`) VALUES
(1, 'İlaç'),
(2, 'Krem'),
(3, 'Losyon'),
(4, 'Gıda Takviyesi'),
(5, 'Medikal'),
(6, 'Sprey');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

DROP TABLE IF EXISTS `musteri`;
CREATE TABLE IF NOT EXISTS `musteri` (
  `musteri_id` int(7) NOT NULL AUTO_INCREMENT,
  `musteri_ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_yas` date DEFAULT NULL,
  `musteri_telefon` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_adres` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `musteri_cinsiyet` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`musteri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteri_id`, `musteri_ad`, `musteri_soyad`, `musteri_yas`, `musteri_telefon`, `musteri_adres`, `musteri_cinsiyet`) VALUES
(2, 'Tuğçe ', 'Kalender', '2001-02-25', '05347601441', 'Buca', 'Kadın'),
(3, 'Selma', 'Altan', '2000-05-15', '05412589632', 'Buca', 'Kadın'),
(4, 'Türkan', 'Çömlekçi', '1999-06-17', '05389641525', 'Buca', 'Kadın'),
(5, 'Ahmet Remzi', 'Çınar', '1983-01-12', '05078471212', 'Buca', 'Erkek'),
(6, 'Yağmur', 'Sivari', '2002-12-25', '05442116557', 'Konak', 'Kadın'),
(7, 'Buse', 'Çayır', '1998-05-12', '05054856231', 'Konak', 'Kadın'),
(8, 'Volkan', 'İyem', '1997-12-05', '05345033369', 'Konak', 'Erkek'),
(9, 'Neşe', 'Bilgin', '2000-04-26', '05301874652', 'Konak', 'Kadın'),
(10, 'İlayda', 'Ölmez', '1995-12-25', '05417546894', 'Konak', 'Kadın'),
(11, 'İrem', 'Sezgin', '1999-09-12', '05320001547', 'Karşıyaka', 'Kadın'),
(12, 'Emre', 'Alaca', '1974-09-14', '05304455210', 'Karşıyaka', 'Erkek'),
(13, 'Atakan', 'Saçmacı', '2002-08-12', '05412305478', 'Karşıyaka', 'Erkek'),
(14, 'Bahar', 'Uğursal', '1996-12-03', '05054704256', 'Gaziemir', 'Kadın'),
(15, 'Mehmet Faik', 'Barlas', '1998-12-05', '05054102145', 'Gaziemir', 'Erkek'),
(16, 'Gözde', 'Şahin', '1987-05-19', '05341205478', 'Gaziemir', 'Kadın'),
(17, 'Oğuzhan', 'Demir', '1995-02-18', '05053565878', 'Bornova', 'Erkek'),
(18, 'Sinem', 'Babuç', '1994-05-14', '05452302121', 'Bornova', 'Kadın'),
(19, 'Emirhan', 'Doğan', '1994-12-05', '05444525285', 'Bornova', 'Erkek'),
(20, 'Begüm', 'Canbula', '2003-08-16', '05326547800', 'Konak', 'Kadın'),
(21, 'Dilek', 'Altun', '1998-10-12', '05321652035', 'Buca', 'Kadın'),
(22, 'Hayrulnisa', 'Çelikelci', '2001-03-29', '05413562205', 'Buca', 'Kadın');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

DROP TABLE IF EXISTS `siparis`;
CREATE TABLE IF NOT EXISTS `siparis` (
  `musteri_id` int(7) NOT NULL,
  `urun_id` int(7) NOT NULL,
  `siparis_adet` int(7) NOT NULL,
  `siparis_tarih` date NOT NULL,
  `siparis_deger` int(7) NOT NULL,
  KEY `musteri_id` (`musteri_id`),
  KEY `urun_id` (`urun_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`musteri_id`, `urun_id`, `siparis_adet`, `siparis_tarih`, `siparis_deger`) VALUES
(2, 21, 1, '2023-01-01', 4),
(2, 26, 1, '2022-12-13', 5),
(18, 25, 1, '2023-01-02', 5),
(13, 23, 1, '2022-12-13', 3),
(21, 18, 1, '2022-11-15', 5),
(9, 4, 1, '2022-12-19', 4),
(12, 25, 1, '2023-01-03', 5),
(4, 19, 1, '2022-11-14', 4),
(9, 10, 1, '2022-11-06', 5),
(10, 3, 1, '2022-09-05', 5),
(12, 13, 1, '2022-11-07', 2),
(20, 7, 1, '2022-12-04', 5),
(7, 29, 1, '2023-01-04', 5),
(3, 29, 1, '2022-12-04', 5),
(22, 29, 1, '2023-01-02', 5),
(16, 29, 1, '2022-10-02', 5),
(20, 19, 1, '2022-11-01', 5),
(21, 20, 1, '2022-11-06', 4),
(7, 16, 1, '2022-11-07', 4),
(6, 16, 1, '2023-01-01', 5),
(14, 8, 1, '2022-11-07', 3),
(5, 2, 1, '2022-10-03', 3),
(19, 5, 1, '2023-01-01', 2),
(22, 29, 2, '2022-12-05', 5),
(21, 6, 2, '2022-11-06', 4),
(15, 17, 3, '2022-11-02', 4),
(19, 28, 1, '2022-11-01', 5),
(8, 6, 1, '2022-10-10', 4),
(17, 28, 4, '2022-11-07', 5),
(3, 1, 1, '2022-12-04', 5),
(16, 9, 2, '2023-01-04', 5),
(4, 11, 1, '2023-01-02', 3),
(22, 12, 2, '2022-11-06', 5),
(5, 12, 3, '2022-11-14', 4),
(3, 12, 1, '2022-10-09', 3),
(22, 14, 2, '2022-10-03', 4),
(14, 14, 1, '2022-11-21', 4),
(14, 24, 4, '2022-11-13', 5),
(6, 27, 2, '2023-01-02', 5),
(13, 27, 2, '2022-11-07', 4),
(7, 27, 4, '2023-01-02', 3),
(22, 24, 1, '2022-06-05', 4),
(14, 27, 1, '2023-01-01', 4),
(3, 6, 2, '2022-11-07', 5),
(20, 29, 3, '2022-11-06', 4),
(14, 1, 1, '2022-11-07', 4),
(21, 1, 1, '2022-07-04', 3),
(18, 2, 2, '2022-09-04', 5),
(15, 3, 3, '2022-10-02', 3),
(19, 4, 1, '2022-09-11', 4),
(2, 4, 2, '2022-10-02', 4),
(22, 5, 2, '2022-10-11', 5),
(22, 7, 1, '2022-08-07', 5),
(22, 8, 2, '2022-11-07', 4),
(16, 10, 2, '2022-11-08', 4),
(17, 11, 1, '2022-03-07', 4),
(21, 13, 2, '2022-11-07', 4),
(5, 13, 1, '2022-11-07', 4),
(8, 18, 1, '2022-11-06', 4),
(7, 18, 3, '2022-11-06', 5),
(8, 18, 1, '2022-10-24', 4),
(22, 20, 4, '2021-11-02', 5),
(3, 20, 3, '2022-06-07', 5),
(4, 21, 1, '2022-09-06', 2),
(9, 21, 1, '2022-10-09', 2),
(2, 23, 2, '2022-08-01', 5),
(12, 26, 2, '2022-11-07', 5),
(22, 26, 3, '2022-06-13', 4),
(21, 29, 2, '2022-11-06', 5),
(3, 29, 2, '2022-12-05', 5),
(22, 27, 1, '2023-01-02', 5),
(13, 27, 1, '2023-01-06', 4),
(22, 29, 2, '2021-08-08', 5),
(13, 29, 2, '2022-06-05', 5),
(19, 29, 2, '2022-05-08', 4),
(19, 27, 2, '2023-01-07', 4),
(7, 27, 2, '2023-01-04', 4),
(14, 25, 1, '2023-01-06', 3),
(19, 9, 1, '2023-01-06', 3),
(12, 28, 1, '2023-01-04', 3),
(20, 26, 1, '2023-01-07', 4),
(16, 26, 1, '2023-01-07', 4),
(2, 1, 1, '2023-01-07', 5),
(2, 1, 1, '2023-01-08', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `urun_id` int(7) NOT NULL AUTO_INCREMENT,
  `urun_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` int(7) NOT NULL,
  `urun_skt` date DEFAULT NULL,
  `urun_stok` int(7) NOT NULL,
  `kategori_id` int(7) NOT NULL,
  PRIMARY KEY (`urun_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_ad`, `urun_fiyat`, `urun_skt`, `urun_stok`, `kategori_id`) VALUES
(1, 'AKNEFUG BP', 156, '2024-01-26', 14, 1),
(2, 'AKSIL', 119, '2024-06-22', 5, 2),
(3, 'ALOPEXY', 399, '2023-04-06', 34, 6),
(4, 'ANZIBEL EKINEZYALI', 82, '2023-07-12', 9, 1),
(5, 'BALYA', 30, '2024-02-14', 14, 1),
(6, 'BECOVITAL', 17, '2023-04-05', 7, 4),
(7, 'BEPANTHEN', 78, '2023-10-11', 6, 2),
(8, 'BEVITIN-C', 32, '2024-01-19', 24, 4),
(9, 'BISMOMAGNESIE', 22, '2023-03-01', 4, 1),
(10, 'EXCIPIAL HYDRO', 77, '2023-12-13', 14, 3),
(11, 'MINOXIL', 350, '2023-04-13', 16, 6),
(12, 'HAMAZINC', 41, '2023-05-11', 28, 2),
(13, 'GASTREN', 55, '2023-04-14', 22, 1),
(14, 'PELUMM', 143, '2023-04-18', 16, 1),
(15, 'UREDERM HYDRO', 83, '2023-02-09', 14, 3),
(16, 'ROGAN TOPİKAL', 388, '2023-07-07', 26, 3),
(17, 'VENATURA', 93, '2023-02-23', 17, 4),
(18, 'OCEAN', 52, '2023-04-07', 36, 4),
(19, 'SUPRADYN', 150, '2023-08-24', 8, 4),
(20, 'REDOXON', 192, '2023-10-11', 9, 4),
(21, 'ACCU CHECK', 134, NULL, 14, 5),
(22, 'HİDROFİL GAZ STERİL', 34, NULL, 16, 5),
(23, 'ANTİSEPTİK SOLÜSYON', 59, NULL, 17, 5),
(24, 'FLASTER', 19, NULL, 21, 5),
(25, 'CANSIN BANT', 47, NULL, 16, 5),
(26, 'ASPİRİN', 43, '2023-05-11', 28, 1),
(27, 'SARGI BEZİ', 51, NULL, 12, 5),
(28, 'ALKA SELTZER', 378, '2024-04-13', 14, 4),
(29, 'PROBİOTİC OPTİMA', 155, '2023-07-12', 12, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_kadi` varchar(250) NOT NULL,
  `user_sifre` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_kadi`, `user_sifre`) VALUES
(1, 'Muharrem', '123456'),
(2, 'Yelda', '12345'),
(3, 'deneme', '12345');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `siparis`
--
ALTER TABLE `siparis`
  ADD CONSTRAINT `siparis_ibfk_3` FOREIGN KEY (`musteri_id`) REFERENCES `musteri` (`musteri_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparis_ibfk_4` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
