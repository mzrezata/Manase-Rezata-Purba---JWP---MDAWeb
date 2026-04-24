-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2026 pada 18.09
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
-- Database: `mitra_data_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `application_logs`
--

CREATE TABLE `application_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_type` varchar(191) NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `application_logs`
--

INSERT INTO `application_logs` (`id`, `application_type`, `application_id`, `action`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'job', 1, 'created', 'Lamaran pekerjaan baru dibuat', 1, '2025-12-21 20:23:34', '2025-12-21 20:23:34'),
(2, 'job', 1, 'email_sent', 'Email konfirmasi dikirim ke pelamar', 1, '2025-12-21 20:23:35', '2025-12-21 20:23:35'),
(3, 'job', 1, 'email_sent', 'Email notifikasi dikirim ke HR', 1, '2025-12-21 20:23:35', '2025-12-21 20:23:35'),
(4, 'internship', 7, 'status_changed', 'Status diubah dari accepted ke accepted', 2, '2025-12-23 22:23:28', '2025-12-23 22:23:28'),
(5, 'internship', 7, 'status_changed', 'Status diubah dari accepted ke accepted', 2, '2025-12-23 22:23:33', '2025-12-23 22:23:33'),
(6, 'job', 1, 'status_changed', 'Status diubah dari pending ke reviewed', 2, '2025-12-23 22:26:30', '2025-12-23 22:26:30'),
(7, 'internship', 7, 'deleted', 'Aplikasi dihapus', 2, '2025-12-23 23:03:46', '2025-12-23 23:03:46'),
(8, 'internship', 1, 'status_changed', 'Status diubah dari pending ke rejected', 2, '2025-12-23 23:04:41', '2025-12-23 23:04:41'),
(9, 'job', 2, 'created', 'Lamaran pekerjaan baru dibuat', 7, '2025-12-23 23:13:52', '2025-12-23 23:13:52'),
(10, 'job', 3, 'created', 'Lamaran pekerjaan baru dibuat', 7, '2025-12-24 05:01:18', '2025-12-24 05:01:18'),
(11, 'job', 3, 'email_sent', 'Email konfirmasi dikirim ke pelamar', 7, '2025-12-24 05:01:21', '2025-12-24 05:01:21'),
(12, 'job', 3, 'email_sent', 'Email notifikasi dikirim ke HR', 7, '2025-12-24 05:01:21', '2025-12-24 05:01:21'),
(13, 'job', 3, 'status_changed', 'Status diubah dari pending ke pending', 3, '2025-12-24 05:03:56', '2025-12-24 05:03:56'),
(14, 'job', 3, 'status_changed', 'Status diubah dari pending ke rejected', 3, '2025-12-24 05:04:02', '2025-12-24 05:04:02'),
(15, 'job', 3, 'status_changed', 'Status diubah dari rejected ke rejected', 3, '2025-12-24 05:04:08', '2025-12-24 05:04:08'),
(16, 'internship', 9, 'status_changed', 'Status diubah dari pending ke accepted', 3, '2025-12-29 11:27:52', '2025-12-29 11:27:52'),
(17, 'internship', 11, 'deleted', 'Aplikasi dihapus', 3, '2025-12-29 11:32:48', '2025-12-29 11:32:48'),
(18, 'internship', 9, 'status_changed', 'Status diubah dari accepted ke accepted', 3, '2025-12-29 11:32:58', '2025-12-29 11:32:58'),
(19, 'job', 5, 'status_changed', 'Status diubah dari pending ke reviewed', 3, '2025-12-29 11:36:59', '2025-12-29 11:36:59'),
(20, 'internship', 12, 'status_changed', 'Status diubah dari pending ke reviewed', 3, '2025-12-29 11:38:35', '2025-12-29 11:38:35'),
(21, 'internship', 12, 'status_changed', 'Status diubah dari reviewed ke accepted', 3, '2025-12-29 22:38:13', '2025-12-29 22:38:13'),
(22, 'internship', 12, 'deleted', 'Aplikasi dihapus', 3, '2025-12-29 22:59:29', '2025-12-29 22:59:29'),
(23, 'internship', 13, 'status_changed', 'Status diubah dari pending ke accepted', 3, '2025-12-30 02:48:07', '2025-12-30 02:48:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `internship_applications`
--

CREATE TABLE `internship_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `birth_place` varchar(191) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `institution_name` varchar(191) NOT NULL,
  `major` varchar(191) NOT NULL,
  `current_semester` int(11) NOT NULL,
  `gpa` decimal(3,2) NOT NULL,
  `entry_year` int(11) NOT NULL,
  `graduation_year` int(11) NOT NULL,
  `recommendation_letter` varchar(191) NOT NULL,
  `desired_position` varchar(191) NOT NULL,
  `internship_purpose` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_mandatory` enum('Ya','Tidak') NOT NULL,
  `availability` enum('Full-time','Part-time','Hybrid') NOT NULL,
  `skills` text NOT NULL,
  `status` enum('pending','reviewed','accepted','rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `reviewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internship_applications`
--

INSERT INTO `internship_applications` (`id`, `full_name`, `birth_place`, `birth_date`, `gender`, `address`, `phone`, `email`, `photo`, `institution_name`, `major`, `current_semester`, `gpa`, `entry_year`, `graduation_year`, `recommendation_letter`, `desired_position`, `internship_purpose`, `start_date`, `end_date`, `is_mandatory`, `availability`, `skills`, `status`, `admin_notes`, `reviewed_at`, `reviewed_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aida', 'karnaganyar', '2004-05-25', 'Perempuan', 'karnaganyar', '082280998904', 'manaserezata@gmail.com', 'internships/photos/zVzaA3aQHLRHmQwg5TkmG47uqVLhLknfGFibm9Ac.jpg', 'Universitas Duta Bangsa', 'Sistem Informasi', 7, 3.50, 2021, 2026, 'internships/letters/9XplxAUKh4XfjKG9xQX6LMYCmUyIyM5CPEBYvOSH.pdf', 'Project Management', 'pengalaman', '2026-01-01', '2026-04-01', 'Ya', 'Full-time', 'coding', 'rejected', NULL, '2025-12-23 23:04:41', 2, '2025-12-21 19:35:21', '2025-12-23 23:04:41', NULL),
(7, 'Manase Rezata Purba', 'Medan', '2003-06-06', 'Laki-laki', 'Manahan', '082280998901', 'manaserezata@gmail.com', 'internships/photos/tOixZab0cGd2p0WjZawzPBKETmiZPutI3DnQddKO.jpg', 'Universitas Duta Bangsa', 'Sistem Informasi', 7, 3.50, 2021, 2026, 'internships/letters/cWjya6xJD0RswMg9bCI59lY7xh4MP14AnKUvTWIJ.pdf', 'UI/UX Designer', 'dsad', '2026-01-12', '2026-04-12', 'Ya', 'Part-time', 'html', 'accepted', NULL, '2025-12-23 22:23:33', 2, '2025-12-23 18:50:38', '2025-12-23 23:03:46', '2025-12-23 23:03:46'),
(8, 'VISITOR', 'medan', '2004-12-12', 'Laki-laki', 'Manahan', '082280998901', 'manaserezata@gmail.com', 'internships/photos/BxgvhQW6pX1JB1A2gppQHvCywaGYHW0N00YRtWN3.jpg', 'Universitas Duta Bangsa', 'Sistem Informasi', 7, 3.50, 2021, 2026, 'internships/letters/9bEukupndvdgl95EVERcGVESBhg8EDALxf41rNKv.pdf', 'UI/UX Designer', 'pengalaman', '2026-01-12', '2026-04-12', 'Ya', 'Full-time', 'html', 'pending', NULL, NULL, NULL, '2025-12-23 23:43:30', '2025-12-23 23:43:30', NULL),
(9, 'Yoga sugianto', 'aceh', '1988-12-12', 'Laki-laki', 'Manahan', '082280998901', 'manaserezata@gmail.com', 'internships/photos/JAnKczdyi1yDYhoKMSU0RPJpvGIEofmwIsNDfqsE.jpg', 'Universitas Duta Bangsa', 'Sistem Informasi', 7, 3.50, 2021, 2026, 'internships/letters/P1Yz8DxnNd1vHEBynIza6xIGS91d1JrO91OxQS84.pdf', 'Digital Marketing', 'semangat', '2026-12-12', '2027-12-12', 'Ya', 'Full-time', 'html', 'accepted', NULL, '2025-12-29 11:32:58', 3, '2025-12-24 04:22:12', '2025-12-29 11:32:58', NULL),
(10, 'jambi andre', 'jambi', '2003-03-30', 'Laki-laki', 'jambi', '081373253577', 'andreasobrien123@gmail.com', 'internships/photos/vKJ6nexT6wrf8txkKTNU1gn4z5QbswsYLKEzhPPX.jpg', 'Dutabangsa', 'Sistem Informasi', 7, 3.50, 2022, 2027, 'internships/letters/aLV033NDrQe14ydJI6L04T7KBOs9YUIDRae2InAP.pdf', 'Web Developer', 'Semangat', '2026-12-12', '2027-12-12', 'Ya', 'Full-time', 'html', 'pending', NULL, NULL, NULL, '2025-12-26 08:04:34', '2025-12-26 08:04:34', NULL),
(11, 'jambi andre', 'jambi', '2003-03-30', 'Laki-laki', 'manahan', '081373253577', 'andreasobrien123@gmail.com', 'internships/photos/XVVqmrqi8DnmS7INQLAxucwdHd9ic4BKK4OGcijQ.jpg', 'Dutabangsa', 'Sistem Informasi', 7, 3.50, 2022, 2027, 'internships/letters/6BlkSyDXMJhBYGIHFHocMDJQnOLPlLvlEjE1CpZV.pdf', 'Web Developer', 'semangat', '2026-12-12', '2027-12-12', 'Ya', 'Full-time', 'html', 'pending', NULL, NULL, NULL, '2025-12-26 08:45:42', '2025-12-29 11:32:48', '2025-12-29 11:32:48'),
(12, 'reza medan', 'jambi', '2003-03-30', 'Laki-laki', 'Manahan', '081373253577', 'rezapurba123@gmail.com', 'internships/photos/0oUhM00m8fB7X1uCOopJtF8NsyESxI3SifEorm6d.jpg', 'Dutabangsa', 'Sistem Informasi', 7, 3.50, 2022, 2027, 'internships/letters/lGIds5szJbKLRVglqIvlECMgfbBlO3Zws9v4T0RX.pdf', 'Mobile Developer', 'pengalaman', '2026-12-12', '2027-12-12', 'Ya', 'Full-time', 'HTML', 'accepted', 'Bagus', '2025-12-29 22:38:13', 3, '2025-12-29 03:42:37', '2025-12-29 22:59:29', '2025-12-29 22:59:29'),
(13, 'Merry Chocita br. Purba', 'Medan', '2003-12-20', 'Perempuan', 'Medan', '082280998901', 'manaserezata12@gmail.com', 'internships/photos/sMTRv8yfn8pwz0ceN5pGjfL9eeDs1GG8Sxg8KvFN.jpg', 'Telkom University', 'Teknik Komputer Jaringan', 7, 3.50, 2021, 2026, 'internships/letters/ndwKpsJhVyifQDN0lokbTFs0HM3dnJlmwVZqEYok.pdf', 'Web Developer', 'Mencari Pengalaman', '2026-01-01', '2026-05-01', 'Ya', 'Full-time', 'HTML', 'accepted', NULL, '2025-12-30 02:48:07', 3, '2025-12-30 02:30:38', '2025-12-30 02:48:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `birth_place` varchar(191) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `marital_status` enum('Belum Menikah','Menikah','Cerai') NOT NULL,
  `photo` varchar(191) NOT NULL,
  `last_education` varchar(191) NOT NULL,
  `institution_name` varchar(191) NOT NULL,
  `major` varchar(191) NOT NULL,
  `graduation_year` int(11) NOT NULL,
  `work_experience` text DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `applied_position` varchar(191) NOT NULL,
  `expected_salary` decimal(12,2) DEFAULT NULL,
  `available_from` date NOT NULL,
  `reason_to_apply` text NOT NULL,
  `willing_to_relocate` enum('Ya','Tidak') NOT NULL,
  `technical_skills` text NOT NULL,
  `soft_skills` text NOT NULL,
  `portfolio_link` varchar(191) DEFAULT NULL,
  `cv_file` varchar(191) NOT NULL,
  `cover_letter_file` varchar(191) NOT NULL,
  `status` enum('pending','reviewed','interview','accepted','rejected') NOT NULL DEFAULT 'pending',
  `admin_notes` text DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `reviewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `job_applications`
--

INSERT INTO `job_applications` (`id`, `full_name`, `birth_place`, `birth_date`, `gender`, `address`, `phone`, `email`, `marital_status`, `photo`, `last_education`, `institution_name`, `major`, `graduation_year`, `work_experience`, `certifications`, `applied_position`, `expected_salary`, `available_from`, `reason_to_apply`, `willing_to_relocate`, `technical_skills`, `soft_skills`, `portfolio_link`, `cv_file`, `cover_letter_file`, `status`, `admin_notes`, `reviewed_at`, `reviewed_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aida', 'karnaganyar', '2004-05-25', 'Perempuan', 'karanganyar', '082280998901', 'manaserezata@gmail.com', 'Belum Menikah', 'jobs/photos/cByY3ZbKGkNVazBoOkhfoIpfVvqDrszZCFTgAeJ0.jpg', 'S1', 'Universitas Duta Bangsa', 'Sistem Informasi', 2021, NULL, 'coding', 'Quality Assurance', 4000000.00, '2026-01-07', 'bagus', 'Ya', 'php', 'kominikasi', 'https://drive.google.com/drive/folders/1BuhDKxYaTSc4JpQ0qNWE7KFTHp5nLErc', 'jobs/cvs/nfviS7GbgRoz6QbKU9i5MLUkf4D26xNcFxfJsAhK.pdf', 'jobs/cover-letters/4OFwYJ3nNYwtcUGWg9kVu3ZY2KqhXAh2HtT3AQ9L.pdf', 'reviewed', NULL, '2025-12-23 22:26:30', 2, '2025-12-21 20:23:34', '2025-12-23 22:26:30', NULL),
(2, 'VISITOR', 'Solo', '2003-02-10', 'Laki-laki', 'solo', '082280998901', 'visitor@gmail.com', 'Belum Menikah', 'jobs/photos/4ogiKcvy2Fivkldp05fOt7LOCsyj0d5PYC09Pv0u.jpg', 'SMA/SMK', 'Dutabangsa', 'Sistem Informasi', 2024, NULL, 'aws', 'Quality Assurance', 6000000.00, '2026-02-12', 'bagus', 'Tidak', 'php', 'komuniasi', 'https://claude.ai/chat/a8790944-a1b3-4d6e-b218-3843388455e8', 'jobs/cvs/49y9LRlP3WWe0fy2GndeYqOUtfNOlCV4sB1uc5gv.pdf', 'jobs/cover-letters/8O64t2qlp7GalNBon9nN8cqS7dWjV5P5xwIZQRJk.pdf', 'pending', NULL, NULL, NULL, '2025-12-23 23:13:52', '2025-12-23 23:13:52', NULL),
(3, 'VISITOR', 'Solo', '2003-02-10', 'Perempuan', 'SOLO', '082280998901', '220101061@gmail.com', 'Belum Menikah', 'jobs/photos/itrDUuz6NfobHFeypTfGl3Obbm6l2GWrEOORWmXF.jpg', 'SMA/SMK', 'Dutabangsa', 'Sistem Informasi', 2024, NULL, 'CLOUD', 'Frontend Developer', 300000.00, '2026-02-12', 'BAGUS', 'Tidak', 'LARAVEL', 'KOMUNIKASI', 'https://claude.ai/chat/a8790944-a1b3-4d6e-b218-3843388455e8', 'jobs/cvs/YddD0kp0uQ2RCjZhLplzk8YVdki8ZdPhIon1TR8m.pdf', 'jobs/cover-letters/JYHj3mulFrdxLR78WeO6eM3wvw0SMV7Q5knArefT.pdf', 'rejected', NULL, '2025-12-24 05:04:08', 3, '2025-12-24 05:01:18', '2025-12-24 05:04:08', NULL),
(4, 'VISITOR Dua', 'Solo', '2003-02-10', 'Laki-laki', 'Medan', '082280998901', '220101061@gmail.com', 'Cerai', 'jobs/photos/YM6cMM1TOWCtDOpO3uzZXaVLxAd3RcFIyHjtk80V.jpg', 'D3', 'Dutabangsa', 'Sistem Informasi', 2024, '\"barista\"', 'Aws', 'Backend Developer', 7000000.00, '2026-02-12', 'Bagus', 'Ya', 'php', 'leadership', 'https://claude.ai/chat/a8790944-a1b3-4d6e-b218-3843388455e8', 'jobs/cvs/ckhoFiLvoQrAEWFo8d1lEWGYgoOBEkwmPHcoqZVM.pdf', 'jobs/cover-letters/EnFfWhqUlRgET4w3SKHdoZSzczagBrwwM6mDuiKH.pdf', 'pending', NULL, NULL, NULL, '2025-12-25 08:31:26', '2025-12-25 08:31:26', NULL),
(5, 'Faiz', 'sukoharjo', '2004-10-09', 'Laki-laki', 'Solo raya', '082280998901', 'manaserezata@gmail.com', 'Menikah', 'jobs/photos/t0bEEFI003QqcKm5iNz9M1mTh51vBNyOBnooVo0o.jpg', 'SMA/SMK', 'Telkom', 'TKJ', 2021, '\"BArista\"', 'AWS', 'Full Stack Developer', 5000000.00, '2026-02-10', 'Bagus', 'Ya', 'PHP', 'Leadershi[', 'https://claude.ai/chat/c94d781b-2b40-4624-9772-e042b8cae2b8', 'jobs/cvs/3Q9rtawLF8CpfsME8SIUVE20mCMOu4uJRj8JLP1v.pdf', 'jobs/cover-letters/INHtlcbLSBkPv6FID9huV4mheHwIgElma0idQoOE.pdf', 'reviewed', NULL, '2025-12-29 11:36:59', 3, '2025-12-26 08:49:13', '2025-12-29 11:36:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2024_01_01_000001_create_internship_applications_table', 1),
(12, '2024_01_01_000002_create_job_applications_table', 1),
(13, '2024_01_01_000003_create_application_logs_table', 1),
(14, '2024_01_01_000004_create_users_table', 1),
(15, '2025_01_01_000005_add_avatar_to_users_table', 1),
(16, '2025_01_02_000006_update_users_role_enum', 1),
(17, '2025_12_22_032651_add_role_to_users_table', 2),
(18, '2025_12_22_043605_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role` enum('visitor','admin','hr','superadmin') DEFAULT 'visitor',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `phone`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aida', 'adia@gmail.com', '2025-12-21 19:30:57', NULL, NULL, '$2y$12$H/doYiTGmTII2g1AzBTHf.RXFphVuDhowJjKaf8k1NFFLCAb8s20u', 'visitor', NULL, '2025-12-21 19:30:57', '2025-12-21 19:30:57'),
(2, 'Admin HR', 'hr@mitradata.com', '2025-12-21 20:28:30', NULL, NULL, '$2y$12$fFVqUBCjG6DQGsc2Appg3eyhRfEqhqYIlEDJuZm4LvMYbc.2ASXoS', 'hr', 'Vr7fgr0nkxFneeeCfnkncV2pceZYDad4mUGRt6yHO4tQpBqaX6cNNl4H93NU', '2025-12-21 20:28:30', '2025-12-21 20:28:30'),
(3, 'Admin Reza', 'admin@mitradata.com', '2025-12-21 20:28:30', NULL, NULL, '$2y$12$HBOFIJ31yEtr4nyO1wsTTOXvIHgpgh9EM2yLJS1Gr7sBYQkRVcwFq', 'admin', 'scgLaNqS85XqDWxFQFPNM6U2o5txLI8oDKR3s76bw2rgGUPIllxDGfiEHACE', '2025-12-21 20:28:30', '2025-12-29 11:38:11'),
(5, 'manase rezata purba', 'manaserezata@gmail.com', '2025-12-22 01:39:37', NULL, NULL, '$2y$12$D3QE8.4uaRCP2T9NjBuv/uQ.nL8fVyN9dwDGIBz2JakJdqDjWPYk2', 'visitor', NULL, '2025-12-22 01:39:37', '2025-12-22 01:39:37'),
(7, 'visitor', 'visitor@gmail.com', NULL, NULL, NULL, '$2y$12$7uaSb5Jd9tI3bEEPwxWDHuhZsJ0PNXx1OrAEB783rNh35fUYVakUW', 'hr', 'fRDMVC2Np9jDlKHk0IU8nL62Ll4i1t4TxHXwsTumbqkRIFSuefcBwrBLaoFD', '2025-12-23 00:59:16', '2026-04-24 07:40:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `application_logs`
--
ALTER TABLE `application_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_logs_application_type_application_id_index` (`application_type`,`application_id`);

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
-- Indeks untuk tabel `internship_applications`
--
ALTER TABLE `internship_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internship_applications_email_index` (`email`),
  ADD KEY `internship_applications_status_index` (`status`),
  ADD KEY `internship_applications_desired_position_index` (`desired_position`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_email_index` (`email`),
  ADD KEY `job_applications_status_index` (`status`),
  ADD KEY `job_applications_applied_position_index` (`applied_position`);

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
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `application_logs`
--
ALTER TABLE `application_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `internship_applications`
--
ALTER TABLE `internship_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
