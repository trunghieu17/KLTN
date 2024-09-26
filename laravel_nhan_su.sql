-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 26, 2024 lúc 11:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_nhan_su`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ca_lams`
--

CREATE TABLE `ca_lams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gio_vao` time NOT NULL,
  `gio_ra` time NOT NULL,
  `is_open` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ca_lams`
--

INSERT INTO `ca_lams` (`id`, `name`, `gio_vao`, `gio_ra`, `is_open`, `created_at`, `updated_at`) VALUES
(1, 'Ca Sáng', '07:00:00', '12:00:00', 1, NULL, '2024-09-26 01:25:22'),
(2, 'Ca Chiều', '12:00:00', '17:00:00', 1, NULL, '2024-09-26 01:25:24'),
(3, 'Ca Tối', '17:00:00', '22:00:00', 1, NULL, NULL),
(4, 'Ca Khuya', '22:00:00', '03:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_phan_lich_nhan_viens`
--

CREATE TABLE `chi_tiet_phan_lich_nhan_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ca` int(11) NOT NULL,
  `id_phong_ban` int(11) NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `ngay_lam` date NOT NULL,
  `is_check` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_nangs`
--

CREATE TABLE `chuc_nangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_nangs`
--

INSERT INTO `chuc_nangs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Loại nhân viên - Xem', NULL, NULL),
(2, 'Loại nhân viên - Tạo mới', NULL, NULL),
(3, 'Loại nhân viên - Đổi trạng thái', NULL, NULL),
(4, 'Loại nhân viên - Cập nhật', NULL, NULL),
(5, 'Loại nhân viên - Xóa', NULL, NULL),
(6, 'Chức vụ - Xem', NULL, NULL),
(7, 'Chức vụ - Tạo mới', NULL, NULL),
(8, 'Chức vụ - Đổi trạng thái', NULL, NULL),
(9, 'Chức vụ - Cập nhật', NULL, NULL),
(10, 'Chức vụ - Xóa', NULL, NULL),
(11, 'Phòng ban - Xem', NULL, NULL),
(12, 'Phòng ban - Tạo mới', NULL, NULL),
(13, 'Phòng ban - Đổi trạng thái', NULL, NULL),
(14, 'Phòng ban - Cập nhật', NULL, NULL),
(15, 'Phòng ban - Xóa', NULL, NULL),
(16, 'Phân quyền - Xem', NULL, NULL),
(17, 'Phân quyền - Tạo mới', NULL, NULL),
(18, 'Phân quyền - Đổi trạng thái', NULL, NULL),
(19, 'Phân quyền - Xóa', NULL, NULL),
(20, 'Nhân viên - Xem', NULL, NULL),
(21, 'Nhân viên - Tạo mới', NULL, NULL),
(22, 'Nhân viên - Đổi trạng thái', NULL, NULL),
(23, 'Nhân viên - Cập nhật', NULL, NULL),
(24, 'Nhân viên - Xóa', NULL, NULL),
(25, 'Ca làm - Xem', NULL, NULL),
(26, 'Ca làm - Tạo mới', NULL, NULL),
(27, 'Ca làm - Đổi trạng thái', NULL, NULL),
(28, 'Ca làm - Cập nhật', NULL, NULL),
(29, 'Ca làm - Xóa', NULL, NULL),
(30, 'Phân lịch làm - Xem', NULL, NULL),
(31, 'Phân lịch làm - Phân lịch tháng', NULL, NULL),
(32, 'Phân lịch làm - Chấm công', NULL, NULL),
(35, 'Chấm công - Xem', NULL, NULL),
(36, 'Chấm công - Chấm công nhân viên', NULL, NULL),
(40, 'Lương - Xem', NULL, NULL),
(45, 'Thưởng phạt - Xem', NULL, NULL),
(46, 'Thưởng phạt - Tạo mới', NULL, NULL),
(47, 'Thưởng phạt - Cập nhật', NULL, NULL),
(48, 'Thưởng phạt - Xóa', NULL, NULL),
(49, 'Tài khoản - Xem', NULL, NULL),
(50, 'Tài khoản - Phân tài khoản', NULL, NULL),
(51, 'Tài khoản - Cấp mật khẩu', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `luong_co_ban` double NOT NULL DEFAULT 0,
  `is_open` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `name`, `mo_ta`, `luong_co_ban`, `is_open`, `created_at`, `updated_at`) VALUES
(1, 'Giám đốc', 'Quản lý tổng thể các hoạt động của khách sạn, đảm bảo hiệu quả hoạt động và chất lượng dịch vụ', 600000, 1, '2024-09-24 17:00:00', NULL),
(2, 'Phó giám đốc', 'Hỗ trợ Giám đốc trong việc quản lý và điều hành các hoạt động của khách sạn', 560000, 1, '2024-09-24 17:00:00', NULL),
(3, 'Trưởng phòng', 'Quản lý tổng thể các hoạt động và nhân viên trong phòng ban mình phụ trách', 310000, 1, '2024-09-24 17:00:00', NULL),
(4, 'Phó phòng', 'Hỗ trợ Trưởng phòng trong việc quản lý và điều hành các hoạt động của phòng', 270000, 1, '2024-09-24 17:00:00', NULL),
(5, 'Quản lý', 'Chịu trách nhiệm quản lý các ca làm việc của nhân viên, đảm bảo hoạt động suôn sẻ trong ca của mình', 230000, 1, '2024-09-24 17:00:00', NULL),
(6, 'Nhân viên', 'Thực hiện các nhiệm vụ hàng ngày theo sự phân công của Trưởng phòng hoặc Phó phòng', 200000, 1, '2024-09-24 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
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
-- Cấu trúc bảng cho bảng `job_batches`
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
-- Cấu trúc bảng cho bảng `loai_nhan_viens`
--

CREATE TABLE `loai_nhan_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `is_open` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_nhan_viens`
--

INSERT INTO `loai_nhan_viens` (`id`, `name`, `mo_ta`, `is_open`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên toàn thời gian', 'Nhân viên làm việc toàn thời gian, có mức lương cố định và các quyền lợi đầy đủ', 1, '2024-09-24 17:00:00', NULL),
(2, 'Nhân viên bán thời gian', 'Nhân viên làm việc theo giờ, linh hoạt thời gian và không bao gồm đầy đủ các quyền lợi', 0, '2024-09-24 17:00:00', '2024-09-26 01:29:26'),
(3, 'Nhân viên hợp đồng', 'Nhân viên làm việc theo hợp đồng cho dự án hoặc mùa vụ, không có cam kết dài hạn', 1, '2024-09-24 17:00:00', NULL),
(4, 'Nhân viên thời vụ', 'Nhân viên làm việc trong các khoảng thời gian nhất định của năm, thường là mùa cao điểm du lịch', 1, '2024-09-24 17:00:00', NULL),
(5, 'Nhân viên thực tập', 'Sinh viên hoặc người mới tốt nghiệp đang thực tập để học hỏi và tích lũy kinh nghiệm', 1, '2024-09-24 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_09_121339_create_personal_access_tokens_table', 1),
(5, '2024_05_09_121835_create_nhan_viens_table', 1),
(6, '2024_05_09_122633_create_phongbans_table', 1),
(7, '2024_05_09_123336_create_chuc_vus_table', 1),
(8, '2024_05_09_123813_create_loai_nhan_viens_table', 1),
(9, '2024_05_10_081028_create_ca_lams_table', 1),
(10, '2024_05_10_115625_add_is_open_to_nhan_vien', 1),
(11, '2024_05_10_122305_create_chi_tiet_phan_lich_nhan_viens_table', 1),
(12, '2024_05_11_113237_create_thuong_phats_table', 1),
(13, '2024_05_12_014659_create_phan_quyens_table', 1),
(14, '2024_05_12_021300_create_chuc_nangs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_viens`
--

CREATE TABLE `nhan_viens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `so_can_cuoc` varchar(255) NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` int(11) NOT NULL,
  `que_quan` text NOT NULL,
  `thuong_tru` text NOT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `id_phong_ban` int(11) NOT NULL,
  `id_loai_nhan_vien` int(11) NOT NULL,
  `is_tai_khoan` int(11) NOT NULL DEFAULT 0,
  `is_master` int(11) NOT NULL DEFAULT 0,
  `id_bang_cap` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_open` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_viens`
--

INSERT INTO `nhan_viens` (`id`, `ho_ten`, `email`, `code`, `so_dien_thoai`, `so_can_cuoc`, `ngay_sinh`, `gioi_tinh`, `que_quan`, `thuong_tru`, `id_chuc_vu`, `id_phong_ban`, `id_loai_nhan_vien`, `is_tai_khoan`, `is_master`, `id_bang_cap`, `password`, `created_at`, `updated_at`, `is_open`) VALUES
(1, 'Admin', 'admin@master.com', 'NVFF10052025', '0123456789', '123456789', '1985-01-01', 1, 'Hà Nội', 'Hà Nội', 1, 1, 1, 1, 1, NULL, '$2y$12$d9Nv9Sm899r.Amex1Ev5oeC9DPhjVTGJOC8UkHxaoVn4K.6A8CEA6', NULL, '2024-09-25 12:41:25', 1),
(2, 'Nguyễn Văn A', 'nguyenvana@gmail.com', 'NVFF10052026', '0123456789', '123456789', '1985-01-01', 1, 'Hà Nội', 'Hà Nội', 1, 1, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(3, 'Trần Thị B', 'tran_thib@yahoo.com', 'NVFF10052027', '0123456790', '223456789', '1990-02-02', 0, 'TP HCM', 'TP HCM', 2, 1, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(4, 'Lê Văn C', 'levanc@outlook.com', 'NVFF10052028', '0123456791', '323456789', '1988-03-03', 1, 'Đà Nẵng', 'Đà Nẵng', 3, 1, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(5, 'Phạm Văn D', 'phamvand@gmail.com', 'NVFF10052029', '0123456792', '423456789', '1992-04-04', 1, 'Nha Trang', 'Nha Trang', 4, 2, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(6, 'Hoàng Thị E', 'hoangthie@hotmail.com', 'NVFF10052030', '0123456793', '523456789', '1989-05-05', 0, 'Huế', 'Huế', 5, 2, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(7, 'Nguyễn Thị F', 'nguyenthi_f@yahoo.com', 'NVFF10052031', '0123456794', '623456789', '1987-06-06', 0, 'Bình Định', 'Bình Định', 6, 3, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(8, 'Bùi Văn G', 'buivang@gmail.com', 'NVFF10052032', '0123456795', '723456789', '1991-07-07', 1, 'Vĩnh Phúc', 'Vĩnh Phúc', 1, 3, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(9, 'Đỗ Thị H', 'dothih@gmail.com', 'NVFF10052033', '0123456796', '823456789', '1984-08-08', 0, 'Quảng Ninh', 'Quảng Ninh', 2, 4, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(10, 'Lưu Văn I', 'luuvani@outlook.com', 'NVFF10052034', '0123456797', '923456789', '1990-09-09', 1, 'Lâm Đồng', 'Lâm Đồng', 3, 4, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(11, 'Trịnh Thị J', 'trinhthij@yahoo.com', 'NVFF10052035', '0123456798', '1023456789', '1993-10-10', 0, 'Thái Nguyên', 'Thái Nguyên', 4, 5, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(12, 'Mai Văn K', 'maivank@gmail.com', 'NVFF10052036', '0123456701', '1123456789', '1986-11-11', 1, 'Cần Thơ', 'Cần Thơ', 5, 5, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(13, 'Vũ Thị L', 'vuthil@gmail.com', 'NVFF10052037', '0123456702', '1223456789', '1995-12-12', 0, 'Bắc Giang', 'Bắc Giang', 6, 6, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(14, 'Ngô Văn M', 'ngovanm@outlook.com', 'NVFF10052038', '0123456703', '1323456789', '1996-01-01', 1, 'Hải Phòng', 'Hải Phòng', 1, 6, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(15, 'Phan Thị N', 'phanthin@yahoo.com', 'NVFF10052039', '0123456704', '1423456789', '1994-02-02', 0, 'Thanh Hóa', 'Thanh Hóa', 2, 7, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(16, 'Chu Văn O', 'chuvano@gmail.com', 'NVFF10052040', '0123456705', '1523456789', '1989-03-03', 1, 'Bình Thuận', 'Bình Thuận', 3, 7, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(17, 'Lý Thị P', 'lythip@hotmail.com', 'NVFF10052041', '0123456706', '1623456789', '1991-04-04', 0, 'Lào Cai', 'Lào Cai', 4, 8, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(18, 'Đặng Văn Q', 'dangvanq@yahoo.com', 'NVFF10052042', '0123456707', '1723456789', '1982-05-05', 1, 'Hà Tĩnh', 'Hà Tĩnh', 5, 8, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(19, 'Trương Thị R', 'truongthir@gmail.com', 'NVFF10052043', '0123456708', '1823456789', '1993-06-06', 0, 'Đồng Nai', 'Đồng Nai', 6, 9, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(20, 'Nguyễn Văn S', 'nguyenvans@outlook.com', 'NVFF10052044', '0123456709', '1923456789', '1992-07-07', 1, 'Cà Mau', 'Cà Mau', 1, 9, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(21, 'Phạm Thị T', 'phamthit@yahoo.com', 'NVFF10052045', '0123456710', '2023456789', '1995-08-08', 0, 'Kiên Giang', 'Kiên Giang', 2, 10, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(22, 'Lê Văn U', 'levanu@gmail.com', 'NVFF10052046', '0123456711', '2123456789', '1987-09-09', 1, 'Quảng Bình', 'Quảng Bình', 3, 10, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(23, 'Ngô Thị V', 'ngothiv@outlook.com', 'NVFF10052047', '0123456712', '2223456789', '1988-10-10', 0, 'Sơn La', 'Sơn La', 4, 1, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(24, 'Trần Văn W', 'tranvanw@yahoo.com', 'NVFF10052048', '0123456713', '2323456789', '1989-11-11', 1, 'Hải Dương', 'Hải Dương', 5, 2, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(25, 'Phan Thị X', 'phanthix@gmail.com', 'NVFF10052049', '0123456714', '2423456789', '1990-12-12', 0, 'Gia Lai', 'Gia Lai', 6, 3, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(26, 'Chu Văn Y', 'chuvany@hotmail.com', 'NVFF10052050', '0123456715', '2523456789', '1984-01-01', 1, 'Long An', 'Long An', 1, 4, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(27, 'Lý Thị Z', 'lythiz@yahoo.com', 'NVFF10052051', '0123456716', '2623456789', '1983-02-02', 0, 'Ninh Bình', 'Ninh Bình', 2, 5, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(28, 'Đặng Văn AA', 'dangvanaa@gmail.com', 'NVFF10052052', '0123456717', '2723456789', '1991-03-03', 1, 'Bạc Liêu', 'Bạc Liêu', 3, 6, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(29, 'Trương Thị BB', 'truongthibb@gmail.com', 'NVFF10052053', '0123456718', '2823456789', '1985-04-04', 0, 'Bến Tre', 'Bến Tre', 4, 7, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(30, 'Nguyễn Văn CC', 'nguyenvancc@outlook.com', 'NVFF10052054', '0123456719', '2923456789', '1986-05-05', 1, 'Phú Thọ', 'Phú Thọ', 5, 8, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1),
(31, 'Phạm Thị DD', 'phamthidd@yahoo.com', 'NVFF10052055', '0123456720', '3023456789', '1982-06-06', 0, 'Hà Giang', 'Hà Giang', 6, 9, 1, 0, 0, NULL, NULL, NULL, '2024-09-25 12:41:25', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_quyens`
--

CREATE TABLE `phan_quyens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `id_chuc_nang` int(11) NOT NULL,
  `is_open` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongbans`
--

CREATE TABLE `phongbans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `is_open` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongbans`
--

INSERT INTO `phongbans` (`id`, `name`, `mo_ta`, `is_open`, `created_at`, `updated_at`) VALUES
(1, 'Lễ tân', 'Phòng ban phụ trách tiếp đón và hỗ trợ khách hàng khi đến và rời khách sạn, giải quyết các yêu cầu và thắc mắc của khách hàng', 1, '2024-09-24 17:00:00', NULL),
(2, 'Quản lý phòng', 'Phòng ban chịu trách nhiệm quản lý các phòng nghỉ, đảm bảo các phòng luôn sạch sẽ và thoải mái cho khách', 1, '2024-09-24 17:00:00', NULL),
(3, 'Nhà hàng', 'Phòng ban điều hành nhà hàng và bar trong khách sạn, phục vụ thực phẩm và đồ uống cho khách', 1, '2024-09-24 17:00:00', NULL),
(4, 'Bảo trì', 'Phòng ban phụ trách bảo trì và sửa chữa các thiết bị, đảm bảo mọi thứ trong khách sạn hoạt động trơn tru', 1, '2024-09-24 17:00:00', NULL),
(5, 'Kế toán', 'Phòng ban xử lý các giao dịch tài chính, báo cáo tài chính và quản lý ngân sách của khách sạn', 1, '2024-09-24 17:00:00', NULL),
(6, 'Tiếp thị', 'Phòng ban phụ trách các chiến dịch quảng cáo và tiếp thị, nâng cao hình ảnh và thương hiệu của khách sạn', 1, '2024-09-24 17:00:00', NULL),
(7, 'Sự kiện', 'Phòng ban tổ chức các sự kiện và hội nghị, đảm bảo các sự kiện diễn ra suôn sẻ và chuyên nghiệp', 1, '2024-09-24 17:00:00', NULL),
(8, 'An ninh', 'Phòng ban chịu trách nhiệm đảm bảo an toàn và bảo mật cho khách sạn và khách lưu trú', 1, '2024-09-24 17:00:00', NULL),
(9, 'Nhân sự', 'Phòng ban quản lý tuyển dụng, đào tạo và phát triển nhân viên, cũng như xử lý các vấn đề liên quan đến nhân sự', 1, '2024-09-24 17:00:00', NULL),
(10, 'Spa và Thể thao', 'Phòng ban quản lý spa và các tiện ích thể thao, cung cấp các dịch vụ chăm sóc sức khỏe và thư giãn cho khách', 1, '2024-09-24 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
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
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FgOx277fbiWt5jGRLRBGbbh5Qx9QDoMdJ41SWATx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN1lZQndWNm1OUTRLRVNSTkFkTGU0aUxKVEcwUUhnenVQTGVmOGxpayI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NjoibG9naW5fbmhhbl92aWVuXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1727339591),
('GBAgL96CkzKRQzNK96GNGSVIr4sfD4EQ8xeFIqGo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUZDdEVTenNyRmVud00zaTdJV1M1SldzdVZFcktUUnAzQVdlMHNJUyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvYWktbmhhbi12aWVuL2RhdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU2OiJsb2dpbl9uaGFuX3ZpZW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1727294953);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_phats`
--

CREATE TABLE `thuong_phats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nhan_vien` int(11) NOT NULL,
  `the_loai` int(11) NOT NULL COMMENT '1: Thưởng, 0: Phạt',
  `ngay_ghi_nhan` date NOT NULL,
  `tien_thuong` double NOT NULL,
  `ly_do` varchar(255) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `ca_lams`
--
ALTER TABLE `ca_lams`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_phan_lich_nhan_viens`
--
ALTER TABLE `chi_tiet_phan_lich_nhan_viens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_nhan_viens`
--
ALTER TABLE `loai_nhan_viens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phan_quyens`
--
ALTER TABLE `phan_quyens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phongbans`
--
ALTER TABLE `phongbans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `thuong_phats`
--
ALTER TABLE `thuong_phats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ca_lams`
--
ALTER TABLE `ca_lams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_phan_lich_nhan_viens`
--
ALTER TABLE `chi_tiet_phan_lich_nhan_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuc_nangs`
--
ALTER TABLE `chuc_nangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_nhan_viens`
--
ALTER TABLE `loai_nhan_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `nhan_viens`
--
ALTER TABLE `nhan_viens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phan_quyens`
--
ALTER TABLE `phan_quyens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phongbans`
--
ALTER TABLE `phongbans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `thuong_phats`
--
ALTER TABLE `thuong_phats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
