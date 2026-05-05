-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2026 pada 13.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_roc_edas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nilai_akademik` int(11) DEFAULT 0,
  `prestasi_sertifikat` int(11) DEFAULT 0,
  `keaktifan_ekstrakurikuler` int(11) DEFAULT 0,
  `absensi` int(11) DEFAULT 0,
  `point_pelanggaran` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_siswa`, `nilai_akademik`, `prestasi_sertifikat`, `keaktifan_ekstrakurikuler`, `absensi`, `point_pelanggaran`, `created_at`, `updated_at`) VALUES
(6, 6, 89, 1, 2, 97, 4, '2026-05-02 06:47:09', '2026-05-02 06:48:53'),
(8, 8, 95, 2, 4, 93, 7, '2026-05-02 07:12:58', '2026-05-02 08:20:44'),
(9, 9, 98, 2, 3, 97, 7, '2026-05-02 07:14:01', '2026-05-03 00:44:58'),
(10, 10, 91, 2, 3, 94, 3, '2026-05-02 07:14:46', '2026-05-02 08:20:20'),
(11, 11, 89, 2, 3, 98, 1, '2026-05-02 07:15:53', '2026-05-02 08:19:35'),
(12, 12, 97, 2, 1, 98, 0, '2026-05-02 07:17:25', '2026-05-02 08:19:10'),
(13, 13, 96, 2, 3, 97, 3, '2026-05-02 07:18:19', '2026-05-02 08:18:53'),
(14, 14, 98, 2, 1, 97, 0, '2026-05-02 07:18:57', '2026-05-02 08:18:30'),
(15, 15, 91, 2, 3, 97, 7, '2026-05-02 07:19:46', '2026-05-02 08:18:05'),
(16, 16, 93, 1, 3, 95, 5, '2026-05-02 07:20:32', '2026-05-02 08:17:33'),
(17, 17, 88, 3, 2, 96, 1, '2026-05-02 07:21:29', '2026-05-02 08:17:12'),
(19, 19, 93, 2, 3, 97, 0, '2026-05-02 07:24:10', '2026-05-02 08:15:25'),
(25, 25, 88, 2, 4, 95, 3, '2026-05-02 07:29:31', '2026-05-02 08:12:39'),
(27, 27, 98, 2, 1, 98, 0, '2026-05-02 07:30:58', '2026-05-02 08:11:41'),
(28, 28, 91, 1, 2, 98, 0, '2026-05-02 07:31:27', '2026-05-02 08:11:19'),
(29, 29, 95, 3, 2, 97, 2, '2026-05-02 07:32:04', '2026-05-02 08:10:52'),
(30, 30, 84, 2, 2, 98, 3, '2026-05-02 07:32:44', '2026-05-02 16:54:15'),
(31, 31, 89, 3, 4, 93, 5, '2026-05-02 07:33:26', '2026-05-02 17:45:08'),
(32, 32, 96, 2, 2, 98, 0, '2026-05-02 07:34:08', '2026-05-02 08:07:55'),
(33, 33, 95, 1, 2, 98, 1, '2026-05-02 07:35:01', '2026-05-02 08:07:30'),
(34, 34, 89, 2, 3, 95, 6, '2026-05-02 07:35:45', '2026-05-02 08:07:02'),
(35, 35, 93, 2, 2, 97, 3, '2026-05-02 07:36:28', '2026-05-02 08:06:31'),
(36, 36, 88, 2, 4, 97, 5, '2026-05-02 07:37:20', '2026-05-02 08:05:56'),
(37, 37, 87, 3, 1, 98, 2, '2026-05-02 07:38:06', '2026-05-02 08:05:16'),
(38, 38, 89, 2, 3, 94, 6, '2026-05-02 07:48:43', '2026-05-02 08:04:37'),
(39, 39, 97, 3, 2, 97, 2, '2026-05-02 07:50:44', '2026-05-02 08:03:58'),
(40, 40, 88, 2, 2, 96, 3, '2026-05-02 07:52:58', '2026-05-02 08:02:47'),
(41, 41, 91, 3, 4, 96, 5, '2026-05-02 07:53:57', '2026-05-02 08:01:57'),
(42, 42, 91, 3, 2, 97, 2, '2026-05-02 07:55:34', '2026-05-02 08:01:05'),
(43, 43, 96, 2, 4, 96, 4, '2026-05-02 07:56:25', '2026-05-02 08:00:11'),
(44, 44, 98, 2, 4, 90, 1, '2026-05-02 07:57:17', '2026-05-02 16:55:13'),
(45, 45, 95, 2, 4, 99, 2, '2026-05-02 17:26:12', '2026-05-03 00:46:56'),
(46, 46, 93, 3, 4, 96, 3, '2026-05-02 17:27:01', '2026-05-03 00:46:29'),
(47, 47, 88, 2, 3, 96, 6, '2026-05-02 17:27:49', '2026-05-03 01:03:02'),
(48, 48, 97, 2, 3, 99, 1, '2026-05-02 17:28:36', '2026-05-03 00:48:15'),
(49, 49, 89, 2, 3, 98, 0, '2026-05-02 17:29:07', '2026-05-03 00:48:45'),
(50, 50, 91, 2, 3, 98, 1, '2026-05-02 17:29:41', '2026-05-03 00:49:08'),
(51, 51, 99, 2, 2, 99, 0, '2026-05-02 17:30:26', '2026-05-03 00:49:36'),
(52, 52, 96, 2, 3, 95, 3, '2026-05-02 17:31:17', '2026-05-03 00:50:13'),
(53, 53, 89, 2, 4, 99, 2, '2026-05-02 17:31:49', '2026-05-03 00:51:11'),
(54, 54, 90, 2, 3, 96, 5, '2026-05-02 17:32:26', '2026-05-03 00:51:36'),
(55, 55, 93, 2, 2, 99, 3, '2026-05-02 17:33:01', '2026-05-03 00:52:01'),
(56, 56, 92, 2, 3, 95, 3, '2026-05-02 17:34:23', '2026-05-03 00:52:32'),
(57, 57, 91, 3, 2, 91, 7, '2026-05-02 17:35:19', '2026-05-03 00:55:42'),
(59, 59, 90, 2, 4, 99, 5, '2026-05-02 17:36:35', '2026-05-03 00:56:08'),
(60, 60, 98, 4, 2, 97, 1, '2026-05-02 17:37:14', '2026-05-03 00:56:47'),
(61, 61, 85, 3, 2, 95, 1, '2026-05-02 17:37:50', '2026-05-03 00:57:10'),
(62, 62, 94, 2, 3, 94, 5, '2026-05-02 17:38:36', '2026-05-03 00:57:41'),
(63, 63, 89, 2, 2, 92, 7, '2026-05-02 17:39:11', '2026-05-03 00:58:09'),
(64, 64, 90, 2, 3, 97, 1, '2026-05-02 17:39:51', '2026-05-03 00:59:56'),
(65, 65, 91, 2, 3, 95, 3, '2026-05-02 17:40:35', '2026-05-03 01:01:36'),
(66, 66, 93, 2, 2, 89, 5, '2026-05-02 17:41:33', '2026-05-03 00:59:01'),
(67, 67, 87, 2, 4, 99, 1, '2026-05-02 17:42:12', '2026-05-03 00:58:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_24_060253_create_siswa_table', 1),
(5, '2025_09_27_085640_create_alternatifs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cTH2yLka870YYrxbkwGohwAjZ7aOYPVcL561RT1T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1plcVk5QzV6M2F3VGtEd1RocEZaWWpZWEs2WWNzbTR1OGF4NG5ReCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7czo1OiJyb3V0ZSI7czo3OiJsYW5kaW5nIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777797016),
('pqm4IsueWpd9WzFAXxKZbf45CUanGAwphyMj61Wh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVjNiM0wzMFpmOTU1a1VPY1JJZnQ3SkpGblJINWdHUnlCd2N1TG9jMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hbHRlcm5hdGlmIjtzOjU6InJvdXRlIjtzOjEwOiJhbHRlcm5hdGlmIjt9czo1NToibG9naW5fcGVuZ2d1bmFfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1777800085);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `password`, `created_at`, `updated_at`) VALUES
(6, '0081880080', 'Saldi Saputra', 'L', 'Wolulu', '2008-01-21', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 06:47:09', '2026-05-02 07:11:45'),
(8, '0092311250', 'Andre', 'L', 'Kukutio', '2009-11-09', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:12:58', '2026-05-02 07:12:58'),
(9, '0095708453', 'Arini Julianti', 'P', 'Gunung Sari', '2009-07-19', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:14:01', '2026-05-02 07:14:01'),
(10, '0083442727', 'Asifa Fitria', 'P', 'Wowoli', '2008-08-04', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:14:46', '2026-05-02 07:14:46'),
(11, '3105682087', 'Elfizah Febrianti', 'P', 'Tandebura', '2009-02-09', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:15:53', '2026-05-02 07:15:53'),
(12, '0081855082', 'Elisa Putri', 'P', 'Mataosu', '0009-12-12', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:17:25', '2026-05-02 07:17:25'),
(13, '0099596268', 'Fardan Aditya', 'L', 'Sengkang', '2009-01-18', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:18:19', '2026-05-02 07:18:19'),
(14, '0091131793', 'Feronika', 'P', 'Puudongi', '2009-02-15', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:18:57', '2026-05-03 00:42:04'),
(15, '0098318045', 'Firza Prasela', 'P', 'Lelewawo', '0009-07-27', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:19:46', '2026-05-03 00:41:40'),
(16, '3080671759', 'Haerul Syawal', 'L', 'Wolulu', '2010-10-16', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:20:32', '2026-05-03 00:41:28'),
(17, '0093505992', 'Ikbal', 'L', 'Watubangga', '2008-09-16', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:21:29', '2026-05-03 00:41:12'),
(19, '3103824504', 'Nurul Airin', 'P', 'Wolulu', '2009-03-30', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:24:10', '2026-05-03 00:40:54'),
(25, '0083874518', 'Tegar Sanubari', 'L', 'Kolaka', '2009-12-04', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:29:31', '2026-05-03 00:40:33'),
(27, '3092427011', 'Yuliana', 'P', 'Wolulu', '2008-05-05', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:30:58', '2026-05-03 00:40:09'),
(28, '0098836329', 'Adel Mirasia', 'P', 'Toari', '2008-10-11', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:31:27', '2026-05-03 00:39:46'),
(29, '0095257244', 'Adelia Putri', 'P', 'Watubangga', '2009-11-29', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:32:04', '2026-05-03 00:39:26'),
(30, '0095779165', 'Adhelya Bambang', 'P', 'Pomalaa', '2009-11-27', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:32:44', '2026-05-03 00:39:01'),
(31, '0094563806', 'Aeril Gunawan', 'L', 'Toari', '2007-08-08', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:33:26', '2026-05-02 07:33:26'),
(32, '0094691408', 'Aira Andini', 'P', 'Watubangga', '2009-09-12', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:34:07', '2026-05-02 07:34:07'),
(33, '0093166622', 'Aira Azzahra', 'P', 'Kolaka', '2009-07-21', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:35:01', '2026-05-02 07:35:01'),
(34, '0095611147', 'Akbar', 'L', 'Wulonggere', '2007-04-06', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:35:45', '2026-05-02 07:35:45'),
(35, '0091596650', 'Alda Risma', 'P', 'Toari', '2010-06-24', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:36:28', '2026-05-02 07:36:28'),
(36, '0051825741', 'Aleni', 'P', 'Watubangga', '2007-12-29', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:37:20', '2026-05-02 07:37:20'),
(37, '0097472078', 'Alief Alfathah', 'L', 'Polenga', '2009-11-11', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:38:06', '2026-05-02 07:38:06'),
(38, '0092610422', 'Anan Putra Atwaludin', 'L', 'Tandebura', '2009-11-04', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:48:43', '2026-05-02 07:48:43'),
(39, '0086418733', 'Andi Alyah Adriani Asri', 'P', 'Kolaka', '2008-04-13', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:50:44', '2026-05-02 07:53:08'),
(40, '0098172964', 'Andi Hasrul Ramadhan', 'L', 'Kolaka', '2008-08-25', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:52:58', '2026-05-02 07:52:58'),
(41, '0092322887', 'Andi Muh. Ikram', 'L', 'Toari', '2009-05-13', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:53:57', '2026-05-02 07:53:57'),
(42, '0098864877', 'Andi Sul Hamid', 'L', 'Watubangga', '2009-12-12', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:55:34', '2026-05-02 07:55:34'),
(43, '0091794714', 'Anggi Pratiwi', 'P', 'Kukutio', '2009-01-31', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:56:25', '2026-05-02 07:56:25'),
(44, '0089428951', 'Anti', 'P', 'Polinggona', '2009-04-21', '11', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 07:57:17', '2026-05-02 07:57:17'),
(45, '0098661888', 'Anwar', 'L', 'Lamundre', '2009-09-28', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:26:12', '2026-05-02 17:26:12'),
(46, '0098967946', 'Arina Eka Saputri', 'P', 'Watubangga', '2008-06-16', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:27:01', '2026-05-02 17:27:01'),
(47, '0096050199', 'Asfurizal Tri Afani', 'L', 'Wowoli', '2008-02-03', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:27:49', '2026-05-02 17:27:49'),
(48, '0098286379', 'Asmaul Husna', 'P', 'Kolaka', '2008-05-21', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:28:36', '2026-05-02 17:28:36'),
(49, '0083217612', 'Astika', 'P', 'Wowoli', '2008-11-30', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:29:07', '2026-05-02 17:29:07'),
(50, '0081453125', 'Ayu', 'P', 'Toari', '2007-01-02', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:29:41', '2026-05-02 17:29:41'),
(51, '0096158410', 'Ayu Wandira', 'P', 'Pondouwae', '2008-04-13', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:30:26', '2026-05-02 17:30:26'),
(52, '0095591796', 'Azizah Juliana Asry', 'P', 'Watubangga', '2008-07-17', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:31:17', '2026-05-02 17:31:17'),
(53, '0087853381', 'Bunga Citra Lestari', 'P', 'Lamundre', '2008-12-18', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:31:49', '2026-05-02 17:31:49'),
(54, '0094149778', 'Choky Ramadan', 'L', 'Gunung Sari', '2007-09-08', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:32:26', '2026-05-02 17:32:26'),
(55, '0098155634', 'Citra Amelia', 'P', 'Tandebura', '2008-07-09', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:33:01', '2026-05-02 17:33:01'),
(56, '0098737665', 'Dewi Farianti', 'P', 'Tandebura', '2008-05-29', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:34:23', '2026-05-02 17:34:23'),
(57, '0092952023', 'Diran', 'L', 'Watubangga', '2008-08-29', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:35:19', '2026-05-02 17:35:19'),
(59, '0091555296', 'Elsa', 'P', 'Puudongi', '2008-11-12', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:36:35', '2026-05-02 17:36:35'),
(60, '0093977097', 'Evank', 'L', 'Watubangga', '2008-08-02', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:37:14', '2026-05-02 17:37:14'),
(61, '0094625080', 'Febi Puspita', 'P', 'Watubangga', '2008-11-09', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:37:50', '2026-05-02 17:37:50'),
(62, '0097564835', 'Febrianti', 'P', 'Puundongi', '2008-03-08', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:38:36', '2026-05-02 17:38:36'),
(63, '0095267431', 'Fikar Algasali', 'L', 'Watubangga', '2008-06-10', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:39:11', '2026-05-02 17:39:11'),
(64, '3090362425', 'Fina Fatma Yanti', 'P', 'Wowoli', '2008-06-19', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:39:51', '2026-05-02 17:39:51'),
(65, '0098202796', 'Gea Asriana', 'P', 'Bone', '2008-03-04', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:40:35', '2026-05-02 17:40:35'),
(66, '0091880112', 'Gede Mustika', 'L', 'Tandebura', '2008-07-14', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:41:33', '2026-05-02 17:41:33'),
(67, '0093572849', 'Gresya Tandi Lullu', 'P', 'Toraja', '2008-06-23', '12', '$2y$12$XSq6i.S.ltfYOWMFu6v/ku25rHKc1i/2B/7npqSKquK9ZKtHVOo6e', '2026-05-02 17:42:12', '2026-05-02 17:42:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','Kepala Sekolah') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$fd22ggOoARXBGCQlg7xsbuV6lLgVF6yIt644kWhs.aSYazABO1mUe',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `photo`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aldi Renata', 'admin@gmail.com', 'Admin', '2026-05-02 06:16:36', NULL, '$2y$12$NN0Rc38ajIiH10EhEHTFkO5lTVZScqxcbNjTYdPLT7yhdn9wOWvI2', '6CrumsGlWXUbIdhCkrm27jYCplAMAygvPyvzj7Wy3E1i8FVQY6eFdOK6MK0V', '2026-05-02 06:16:36', '2026-05-03 01:16:51'),
(2, 'Kepala Sekolah', 'kepalasekolah@gmail.com', 'Kepala Sekolah', '2026-05-02 06:16:37', NULL, '$2y$12$eTEGyuMohXujkjyBuPyIg.ueHsC9MyBkGJOzbmFBsiNqQNlE.BkTW', 'V3V2r2ZleClhB6s72KwP84nU2HtUuShQbBNZXwOBkJkJ7UurP8XdX26nioRI', '2026-05-02 06:16:37', '2026-05-02 06:16:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `alternatif_id_siswa_foreign` (`id_siswa`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
