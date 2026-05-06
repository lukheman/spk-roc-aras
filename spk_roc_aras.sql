/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-12.1.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: spk_roc_aras
-- ------------------------------------------------------
-- Server version	12.1.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `alternatif` (
  `id_alternatif` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_siswa` bigint(20) unsigned NOT NULL,
  `nilai_akademik` int(11) DEFAULT 0,
  `prestasi_sertifikat` int(11) DEFAULT 0,
  `keaktifan_ekstrakurikuler` int(11) DEFAULT 0,
  `absensi` int(11) DEFAULT 0,
  `point_pelanggaran` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alternatif`),
  KEY `alternatif_id_siswa_foreign` (`id_siswa`),
  CONSTRAINT `alternatif_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alternatif`
--

LOCK TABLES `alternatif` WRITE;
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `alternatif` VALUES
(6,6,89,1,2,97,4,'2026-05-02 06:47:09','2026-05-02 06:48:53'),
(8,8,95,2,4,93,7,'2026-05-02 07:12:58','2026-05-02 08:20:44'),
(9,9,98,2,3,97,7,'2026-05-02 07:14:01','2026-05-03 00:44:58'),
(10,10,91,2,3,94,3,'2026-05-02 07:14:46','2026-05-02 08:20:20'),
(11,11,89,2,3,98,1,'2026-05-02 07:15:53','2026-05-02 08:19:35'),
(12,12,97,2,1,98,0,'2026-05-02 07:17:25','2026-05-02 08:19:10'),
(13,13,96,2,3,97,3,'2026-05-02 07:18:19','2026-05-02 08:18:53'),
(14,14,98,2,1,97,0,'2026-05-02 07:18:57','2026-05-02 08:18:30'),
(15,15,91,2,3,97,7,'2026-05-02 07:19:46','2026-05-02 08:18:05'),
(16,16,93,1,3,95,5,'2026-05-02 07:20:32','2026-05-02 08:17:33'),
(17,17,88,3,2,96,1,'2026-05-02 07:21:29','2026-05-02 08:17:12'),
(19,19,93,2,3,97,0,'2026-05-02 07:24:10','2026-05-02 08:15:25'),
(25,25,88,2,4,95,3,'2026-05-02 07:29:31','2026-05-02 08:12:39'),
(27,27,98,2,1,98,0,'2026-05-02 07:30:58','2026-05-02 08:11:41'),
(28,28,91,1,2,98,0,'2026-05-02 07:31:27','2026-05-02 08:11:19'),
(29,29,95,3,2,97,2,'2026-05-02 07:32:04','2026-05-02 08:10:52'),
(30,30,84,2,2,98,3,'2026-05-02 07:32:44','2026-05-02 16:54:15'),
(31,31,89,3,4,93,5,'2026-05-02 07:33:26','2026-05-02 17:45:08'),
(32,32,96,2,2,98,0,'2026-05-02 07:34:08','2026-05-02 08:07:55'),
(33,33,95,1,2,98,1,'2026-05-02 07:35:01','2026-05-02 08:07:30'),
(34,34,89,2,3,95,6,'2026-05-02 07:35:45','2026-05-02 08:07:02'),
(35,35,93,2,2,97,3,'2026-05-02 07:36:28','2026-05-02 08:06:31'),
(36,36,88,2,4,97,5,'2026-05-02 07:37:20','2026-05-02 08:05:56'),
(37,37,87,3,1,98,2,'2026-05-02 07:38:06','2026-05-02 08:05:16'),
(38,38,89,2,3,94,6,'2026-05-02 07:48:43','2026-05-02 08:04:37'),
(39,39,97,3,2,97,2,'2026-05-02 07:50:44','2026-05-02 08:03:58'),
(40,40,88,2,2,96,3,'2026-05-02 07:52:58','2026-05-02 08:02:47'),
(41,41,91,3,4,96,5,'2026-05-02 07:53:57','2026-05-02 08:01:57'),
(42,42,91,3,2,97,2,'2026-05-02 07:55:34','2026-05-02 08:01:05'),
(43,43,96,2,4,96,4,'2026-05-02 07:56:25','2026-05-02 08:00:11'),
(44,44,98,2,4,90,1,'2026-05-02 07:57:17','2026-05-02 16:55:13'),
(45,45,95,2,4,99,2,'2026-05-02 17:26:12','2026-05-03 00:46:56'),
(46,46,93,3,4,96,3,'2026-05-02 17:27:01','2026-05-03 00:46:29'),
(47,47,88,2,3,96,6,'2026-05-02 17:27:49','2026-05-03 01:03:02'),
(48,48,97,2,3,99,1,'2026-05-02 17:28:36','2026-05-03 00:48:15'),
(49,49,89,2,3,98,0,'2026-05-02 17:29:07','2026-05-03 00:48:45'),
(50,50,91,2,3,98,1,'2026-05-02 17:29:41','2026-05-03 00:49:08'),
(51,51,99,2,2,99,0,'2026-05-02 17:30:26','2026-05-03 00:49:36'),
(52,52,96,2,3,95,3,'2026-05-02 17:31:17','2026-05-03 00:50:13'),
(53,53,89,2,4,99,2,'2026-05-02 17:31:49','2026-05-03 00:51:11'),
(54,54,90,2,3,96,5,'2026-05-02 17:32:26','2026-05-03 00:51:36'),
(55,55,93,2,2,99,3,'2026-05-02 17:33:01','2026-05-03 00:52:01'),
(56,56,92,2,3,95,3,'2026-05-02 17:34:23','2026-05-03 00:52:32'),
(57,57,91,3,2,91,7,'2026-05-02 17:35:19','2026-05-03 00:55:42'),
(59,59,90,2,4,99,5,'2026-05-02 17:36:35','2026-05-03 00:56:08'),
(60,60,98,4,2,97,1,'2026-05-02 17:37:14','2026-05-03 00:56:47'),
(61,61,85,3,2,95,1,'2026-05-02 17:37:50','2026-05-03 00:57:10'),
(62,62,94,2,3,94,5,'2026-05-02 17:38:36','2026-05-03 00:57:41'),
(63,63,89,2,2,92,7,'2026-05-02 17:39:11','2026-05-03 00:58:09'),
(64,64,90,2,3,97,1,'2026-05-02 17:39:51','2026-05-03 00:59:56'),
(65,65,91,2,3,95,3,'2026-05-02 17:40:35','2026-05-03 01:01:36'),
(66,66,93,2,2,89,5,'2026-05-02 17:41:33','2026-05-03 00:59:01'),
(67,67,87,2,4,99,1,'2026-05-02 17:42:12','2026-05-03 00:58:32');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2025_09_24_060253_create_siswa_table',1),
(5,'2025_09_27_085640_create_alternatifs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id_siswa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `siswa` VALUES
(6,'0081880080','Saldi Saputra','L','Wolulu','2008-01-21','11','2026-05-02 06:47:09','2026-05-02 07:11:45','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(8,'0092311250','Andre','L','Kukutio','2009-11-09','11','2026-05-02 07:12:58','2026-05-02 07:12:58','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(9,'0095708453','Arini Julianti','P','Gunung Sari','2009-07-19','11','2026-05-02 07:14:01','2026-05-02 07:14:01','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(10,'0083442727','Asifa Fitria','P','Wowoli','2008-08-04','11','2026-05-02 07:14:46','2026-05-02 07:14:46','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(11,'3105682087','Elfizah Febrianti','P','Tandebura','2009-02-09','11','2026-05-02 07:15:53','2026-05-02 07:15:53','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(12,'0081855082','Elisa Putri','P','Mataosu','0009-12-12','11','2026-05-02 07:17:25','2026-05-02 07:17:25','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(13,'0099596268','Fardan Aditya','L','Sengkang','2009-01-18','11','2026-05-02 07:18:19','2026-05-02 07:18:19','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(14,'0091131793','Feronika','P','Puudongi','2009-02-15','11','2026-05-02 07:18:57','2026-05-03 00:42:04','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(15,'0098318045','Firza Prasela','P','Lelewawo','0009-07-27','11','2026-05-02 07:19:46','2026-05-03 00:41:40','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(16,'3080671759','Haerul Syawal','L','Wolulu','2010-10-16','11','2026-05-02 07:20:32','2026-05-03 00:41:28','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(17,'0093505992','Ikbal','L','Watubangga','2008-09-16','11','2026-05-02 07:21:29','2026-05-03 00:41:12','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(19,'3103824504','Nurul Airin','P','Wolulu','2009-03-30','11','2026-05-02 07:24:10','2026-05-03 00:40:54','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(25,'0083874518','Tegar Sanubari','L','Kolaka','2009-12-04','11','2026-05-02 07:29:31','2026-05-03 00:40:33','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(27,'3092427011','Yuliana','P','Wolulu','2008-05-05','11','2026-05-02 07:30:58','2026-05-03 00:40:09','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(28,'0098836329','Adel Mirasia','P','Toari','2008-10-11','11','2026-05-02 07:31:27','2026-05-03 00:39:46','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(29,'0095257244','Adelia Putri','P','Watubangga','2009-11-29','11','2026-05-02 07:32:04','2026-05-03 00:39:26','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(30,'0095779165','Adhelya Bambang','P','Pomalaa','2009-11-27','11','2026-05-02 07:32:44','2026-05-03 00:39:01','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(31,'0094563806','Aeril Gunawan','L','Toari','2007-08-08','11','2026-05-02 07:33:26','2026-05-02 07:33:26','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(32,'0094691408','Aira Andini','P','Watubangga','2009-09-12','11','2026-05-02 07:34:07','2026-05-02 07:34:07','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(33,'0093166622','Aira Azzahra','P','Kolaka','2009-07-21','11','2026-05-02 07:35:01','2026-05-02 07:35:01','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(34,'0095611147','Akbar','L','Wulonggere','2007-04-06','11','2026-05-02 07:35:45','2026-05-02 07:35:45','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(35,'0091596650','Alda Risma','P','Toari','2010-06-24','11','2026-05-02 07:36:28','2026-05-02 07:36:28','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(36,'0051825741','Aleni','P','Watubangga','2007-12-29','11','2026-05-02 07:37:20','2026-05-02 07:37:20','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(37,'0097472078','Alief Alfathah','L','Polenga','2009-11-11','11','2026-05-02 07:38:06','2026-05-02 07:38:06','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(38,'0092610422','Anan Putra Atwaludin','L','Tandebura','2009-11-04','11','2026-05-02 07:48:43','2026-05-02 07:48:43','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(39,'0086418733','Andi Alyah Adriani Asri','P','Kolaka','2008-04-13','11','2026-05-02 07:50:44','2026-05-02 07:53:08','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(40,'0098172964','Andi Hasrul Ramadhan','L','Kolaka','2008-08-25','11','2026-05-02 07:52:58','2026-05-02 07:52:58','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(41,'0092322887','Andi Muh. Ikram','L','Toari','2009-05-13','11','2026-05-02 07:53:57','2026-05-02 07:53:57','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(42,'0098864877','Andi Sul Hamid','L','Watubangga','2009-12-12','11','2026-05-02 07:55:34','2026-05-02 07:55:34','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(43,'0091794714','Anggi Pratiwi','P','Kukutio','2009-01-31','11','2026-05-02 07:56:25','2026-05-02 07:56:25','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(44,'0089428951','Anti','P','Polinggona','2009-04-21','11','2026-05-02 07:57:17','2026-05-02 07:57:17','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(45,'0098661888','Anwar','L','Lamundre','2009-09-28','12','2026-05-02 17:26:12','2026-05-02 17:26:12','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(46,'0098967946','Arina Eka Saputri','P','Watubangga','2008-06-16','12','2026-05-02 17:27:01','2026-05-02 17:27:01','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(47,'0096050199','Asfurizal Tri Afani','L','Wowoli','2008-02-03','12','2026-05-02 17:27:49','2026-05-02 17:27:49','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(48,'0098286379','Asmaul Husna','P','Kolaka','2008-05-21','12','2026-05-02 17:28:36','2026-05-02 17:28:36','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(49,'0083217612','Astika','P','Wowoli','2008-11-30','12','2026-05-02 17:29:07','2026-05-02 17:29:07','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(50,'0081453125','Ayu','P','Toari','2007-01-02','12','2026-05-02 17:29:41','2026-05-02 17:29:41','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(51,'0096158410','Ayu Wandira','P','Pondouwae','2008-04-13','12','2026-05-02 17:30:26','2026-05-02 17:30:26','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(52,'0095591796','Azizah Juliana Asry','P','Watubangga','2008-07-17','12','2026-05-02 17:31:17','2026-05-02 17:31:17','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(53,'0087853381','Bunga Citra Lestari','P','Lamundre','2008-12-18','12','2026-05-02 17:31:49','2026-05-02 17:31:49','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(54,'0094149778','Choky Ramadan','L','Gunung Sari','2007-09-08','12','2026-05-02 17:32:26','2026-05-02 17:32:26','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(55,'0098155634','Citra Amelia','P','Tandebura','2008-07-09','12','2026-05-02 17:33:01','2026-05-02 17:33:01','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(56,'0098737665','Dewi Farianti','P','Tandebura','2008-05-29','12','2026-05-02 17:34:23','2026-05-02 17:34:23','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(57,'0092952023','Diran','L','Watubangga','2008-08-29','12','2026-05-02 17:35:19','2026-05-02 17:35:19','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(59,'0091555296','Elsa','P','Puudongi','2008-11-12','12','2026-05-02 17:36:35','2026-05-02 17:36:35','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(60,'0093977097','Evank','L','Watubangga','2008-08-02','12','2026-05-02 17:37:14','2026-05-02 17:37:14','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(61,'0094625080','Febi Puspita','P','Watubangga','2008-11-09','12','2026-05-02 17:37:50','2026-05-02 17:37:50','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(62,'0097564835','Febrianti','P','Puundongi','2008-03-08','12','2026-05-02 17:38:36','2026-05-02 17:38:36','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(63,'0095267431','Fikar Algasali','L','Watubangga','2008-06-10','12','2026-05-02 17:39:11','2026-05-02 17:39:11','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(64,'3090362425','Fina Fatma Yanti','P','Wowoli','2008-06-19','12','2026-05-02 17:39:51','2026-05-02 17:39:51','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(65,'0098202796','Gea Asriana','P','Bone','2008-03-04','12','2026-05-02 17:40:35','2026-05-02 17:40:35','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(66,'0091880112','Gede Mustika','L','Tandebura','2008-07-14','12','2026-05-02 17:41:33','2026-05-02 17:41:33','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e'),
(67,'0093572849','Gresya Tandi Lullu','P','Toraja','2008-06-23','12','2026-05-02 17:42:12','2026-05-02 17:42:12','$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','Kepala Sekolah') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$msPw.FUXD0L.xSY9DfjByu6XVjyWDSwyFlWtRiFUWjoYHsIB0dsyW',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Admin','admin@gmail.com','Admin','2026-05-06 04:28:51',NULL,'$2y$12$mgkevhzf94bFflWFdilVa.5vu1KS0eyZDOGlLU5BbEH9lgaHjimgS','fbXFoPw7wo','2026-05-06 04:28:51','2026-05-06 04:28:51'),
(2,'Kepala Sekolah','kepalasekolah@gmail.com','Kepala Sekolah','2026-05-06 04:28:51',NULL,'$2y$12$tU2U2DhqJwKIHXlGXgon1.JaFEUPHdcwbQgg.QrWtH.xzHSIgXqOW','1P0UmRQY0o','2026-05-06 04:28:51','2026-05-06 04:28:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-05-06 20:33:15
