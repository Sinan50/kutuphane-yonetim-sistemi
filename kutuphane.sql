-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 09:05 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kutuphane`
--

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int NOT NULL,
  `kitap_adi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitap_yazar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitap_tur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sayfa_sayisi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitap_adi`, `kitap_yazar`, `kitap_tur`, `sayfa_sayisi`) VALUES
(1, 'Suç ve Ceza', 'Fyodor Dostoyevski', 'Dünya Klasikleri', 687),
(2, 'Sefiller', 'Victor Hugo', 'Dünya Klasikleri', 1724),
(3, 'Anna Karenina', 'Lev Tolstoy', 'Dünya Klasikleri', 1062),
(4, 'Kürk Mantolu Madonna', 'Sabahattin Ali', 'Türk Edebiyatı', 160),
(5, '1984', 'George Orwell', 'Distopya', 352),
(6, 'Hayvan Çiftliği', 'George Orwell', 'Hiciv', 152),
(7, 'Küçük Prens', 'Antoine de Saint-Exupéry', 'Masal', 112),
(8, 'Simyacı', 'Paulo Coelho', 'Felsefi Roman', 188),
(9, 'Şeker Portakalı', 'Jose Mauro de Vasconcelos', 'Dram', 182),
(10, 'Satranç', 'Stefan Zweig', 'Modern Klasikler', 84),
(11, 'Dönüşüm', 'Franz Kafka', 'Modern Klasikler', 104),
(12, 'Bülbülü Öldürmek', 'Harper Lee', 'Roman', 355),
(13, 'Yabancı', 'Albert Camus', 'Felsefi Roman', 110),
(14, 'Fareler ve İnsanlar', 'John Steinbeck', 'Roman', 128),
(15, 'Gazap Üzümleri', 'John Steinbeck', 'Roman', 556),
(16, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Türk Edebiyatı', 544),
(17, 'Saatleri Ayarlama Enstitüsü', 'Ahmet Hamdi Tanpınar', 'Türk Edebiyatı', 382),
(18, 'İnce Memed 1', 'Yaşar Kemal', 'Türk Edebiyatı', 436),
(19, 'Tutunamayanlar', 'Oğuz Atay', 'Türk Edebiyatı', 724),
(20, 'Aylak Adam', 'Yusuf Atılgan', 'Türk Edebiyatı', 156),
(21, 'Kuyucaklı Yusuf', 'Sabahattin Ali', 'Türk Edebiyatı', 220),
(22, 'Eylül', 'Mehmet Rauf', 'Psikolojik Roman', 280),
(23, 'Mai ve Siyah', 'Halit Ziya Uşaklıgil', 'Türk Edebiyatı', 300),
(24, 'Aşk-ı Memnu', 'Halit Ziya Uşaklıgil', 'Türk Edebiyatı', 380),
(25, 'Araba Sevdası', 'Recaizade Mahmut Ekrem', 'Türk Edebiyatı', 240),
(26, 'Dokuzuncu Hariciye Koğuşu', 'Peyami Safa', 'Psikolojik Roman', 112),
(27, 'Fatih-Harbiye', 'Peyami Safa', 'Roman', 128),
(28, 'Yaban', 'Yakup Kadri Karaosmanoğlu', 'Roman', 216),
(29, 'Sinekli Bakkal', 'Halide Edib Adıvar', 'Roman', 208),
(30, 'Devlet Ana', 'Kemal Tahir', 'Tarihi Roman', 660),
(31, 'Osmancık', 'Tarık Buğra', 'Tarihi Roman', 380),
(32, 'Huzur', 'Ahmet Hamdi Tanpınar', 'Roman', 420),
(33, 'Kara Kitap', 'Orhan Pamuk', 'Roman', 450),
(34, 'Benim Adım Kırmızı', 'Orhan Pamuk', 'Tarihi Roman', 540),
(35, 'Masumiyet Müzesi', 'Orhan Pamuk', 'Roman', 592),
(36, 'Puslu Kıtalar Atlası', 'İhsan Oktay Anar', 'Fantastik', 238),
(37, 'Nutuk', 'Mustafa Kemal Atatürk', 'Tarih', 650),
(38, 'Semerkant', 'Amin Maalouf', 'Tarihi Roman', 318),
(39, 'Doğunun Limanları', 'Amin Maalouf', 'Roman', 190),
(40, 'Uçurtma Avcısı', 'Khaled Hosseini', 'Dram', 375),
(41, 'Bin Muhteşem Güneş', 'Khaled Hosseini', 'Dram', 430),
(42, 'Harry Potter ve Felsefe Taşı', 'J.K. Rowling', 'Fantastik', 276),
(43, 'Yüzüklerin Efendisi: Yüzük Kardeşliği', 'J.R.R. Tolkien', 'Fantastik', 496),
(44, 'Hobbit', 'J.R.R. Tolkien', 'Fantastik', 336),
(45, 'Taht Oyunları', 'George R.R. Martin', 'Fantastik', 850),
(46, 'Dune', 'Frank Herbert', 'Bilim Kurgu', 712),
(47, 'Fahrenheit 451', 'Ray Bradbury', 'Bilim Kurgu', 208),
(48, 'Cesur Yeni Dünya', 'Aldous Huxley', 'Bilim Kurgu', 270),
(49, 'Otostopçunun Galaksi Rehberi', 'Douglas Adams', 'Bilim Kurgu', 200),
(50, 'Ben, Robot', 'Isaac Asimov', 'Bilim Kurgu', 240),
(51, 'Vakıf', 'Isaac Asimov', 'Bilim Kurgu', 288),
(52, 'Marslı', 'Andy Weir', 'Bilim Kurgu', 416),
(53, 'Zaman Makinesi', 'H.G. Wells', 'Bilim Kurgu', 110),
(54, 'Dünyalar Savaşı', 'H.G. Wells', 'Bilim Kurgu', 150),
(55, 'Denizler Altında Yirmi Bin Fersah', 'Jules Verne', 'Macera', 400),
(56, 'Seksen Günde Devri Alem', 'Jules Verne', 'Macera', 220),
(57, 'Sherlock Holmes: Kızıl Dosya', 'Arthur Conan Doyle', 'Polisiye', 160),
(58, 'Doğu Ekspresinde Cinayet', 'Agatha Christie', 'Polisiye', 208),
(59, 'On Küçük Zenci', 'Agatha Christie', 'Polisiye', 192),
(60, 'Da Vinci Şifresi', 'Dan Brown', 'Gerilim', 520),
(61, 'Melekler ve Şeytanlar', 'Dan Brown', 'Gerilim', 570),
(62, 'Koku', 'Patrick Süskind', 'Gerilim', 260),
(63, 'Gülün Adı', 'Umberto Eco', 'Tarihi Roman', 580),
(64, 'Karamazov Kardeşler', 'Fyodor Dostoyevski', 'Dünya Klasikleri', 840),
(65, 'Budala', 'Fyodor Dostoyevski', 'Dünya Klasikleri', 760),
(66, 'Savaş ve Barış', 'Lev Tolstoy', 'Dünya Klasikleri', 1225),
(67, 'Babalar ve Oğullar', 'İvan Turgenyev', 'Dünya Klasikleri', 240),
(68, 'Ölü Canlar', 'Nikolay Gogol', 'Dünya Klasikleri', 360),
(69, 'Vadideki Zambak', 'Honore de Balzac', 'Dünya Klasikleri', 320),
(70, 'Goriot Baba', 'Honore de Balzac', 'Dünya Klasikleri', 280),
(71, 'Madam Bovary', 'Gustave Flaubert', 'Dünya Klasikleri', 380),
(72, 'Kırmızı ve Siyah', 'Stendhal', 'Dünya Klasikleri', 540),
(73, 'İki Şehrin Hikayesi', 'Charles Dickens', 'Dünya Klasikleri', 460),
(74, 'Büyük Umutlar', 'Charles Dickens', 'Dünya Klasikleri', 560),
(75, 'Oliver Twist', 'Charles Dickens', 'Dünya Klasikleri', 400),
(76, 'Jane Eyre', 'Charlotte Bronte', 'Klasik', 520),
(77, 'Uğultulu Tepeler', 'Emily Bronte', 'Klasik', 410),
(78, 'Gurur ve Önyargı', 'Jane Austen', 'Klasik', 350),
(79, 'Romeo ve Juliet', 'William Shakespeare', 'Tiyatro', 130),
(80, 'Hamlet', 'William Shakespeare', 'Tiyatro', 180),
(81, 'Don Kişot', 'Cervantes', 'Klasik', 900),
(82, 'İlahi Komedya', 'Dante Alighieri', 'Şiir', 750),
(83, 'Faust', 'Johann Wolfgang von Goethe', 'Tiyatro', 550),
(84, 'Genç Werther’in Acıları', 'Johann Wolfgang von Goethe', 'Klasik', 140),
(85, 'Siddhartha', 'Hermann Hesse', 'Felsefi Roman', 148),
(86, 'Bozkırkurdu', 'Hermann Hesse', 'Modern Klasikler', 260),
(87, 'Körlük', 'Jose Saramago', 'Distopya', 330),
(88, 'Yüzyıllık Yalnızlık', 'Gabriel Garcia Marquez', 'Büyülü Gerçekçilik', 460),
(89, 'Kırmızı Pazartesi', 'Gabriel Garcia Marquez', 'Roman', 110),
(90, 'Dava', 'Franz Kafka', 'Modern Klasikler', 230),
(91, 'Milena’ya Mektuplar', 'Franz Kafka', 'Mektup', 340),
(92, 'Bir İdam Mahkumunun Son Günü', 'Victor Hugo', 'Klasik', 120),
(93, 'Notre Dame’ın Kamburu', 'Victor Hugo', 'Klasik', 540),
(94, 'Monte Kristo Kontu', 'Alexandre Dumas', 'Macera', 1500),
(95, 'Üç Silahşorlar', 'Alexandre Dumas', 'Macera', 700),
(96, 'Beyaz Diş', 'Jack London', 'Macera', 220),
(97, 'Vahşetin Çağrısı', 'Jack London', 'Macera', 130),
(98, 'Martin Eden', 'Jack London', 'Roman', 520),
(99, 'Moby Dick', 'Herman Melville', 'Macera', 700),
(100, 'Tom Sawyer’ın Maceraları', 'Mark Twain', 'Çocuk Klasikleri', 240);

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int NOT NULL,
  `kullanici_adi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_soyadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kullanici_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kullanici_sifre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `kullanici_adi`, `kullanici_soyadi`, `kullanici_mail`, `kullanici_sifre`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$bIgUKqw29LOuXiSOJGRBVOR/CG/..EUuIIlrd2RwCcvMpqNgCZWGu'),
(3, 'deneme3', 'deneme3', 'deneme3@gmail.com', '$2y$10$CM8Wez2Bcia0NlhT2d9u5ePch1agM5hPMrXo1yxYDpjSG89xFLoEu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`),
  ADD UNIQUE KEY `kullanici_mail` (`kullanici_mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
