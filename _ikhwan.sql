/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : _ikhwan

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 16/06/2025 00:40:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `bobot` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
BEGIN;
INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES (1, 'Disiplin', 'benefit', 0.3, '2025-06-15 15:46:54', '2025-06-15 15:46:54');
INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES (2, 'Produktif', 'benefit', 0.4, '2025-06-15 15:47:10', '2025-06-15 15:47:10');
INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES (3, 'Kerja sama', 'benefit', 0.2, '2025-06-15 15:47:17', '2025-06-15 15:47:17');
INSERT INTO `kriteria` (`id`, `nama`, `jenis`, `bobot`, `created_at`, `updated_at`) VALUES (4, 'kehadiran', 'benefit', 0.1, '2025-06-15 15:47:28', '2025-06-15 15:47:28');
COMMIT;

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `jkel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
BEGIN;
INSERT INTO `pegawai` (`id`, `nik`, `nama`, `agama`, `alamat`, `telp`, `jkel`, `created_at`, `updated_at`, `jabatan`) VALUES (1, '23454632', 'BUDI', 'ISLAM', 'Jl Pramuka', '0987656789', 'P', '2025-05-13 17:18:55', '2025-06-15 15:42:59', 'sdfsdf');
INSERT INTO `pegawai` (`id`, `nik`, `nama`, `agama`, `alamat`, `telp`, `jkel`, `created_at`, `updated_at`, `jabatan`) VALUES (2, '354678976', 'ABDUL', 'ISLAM', 'kjhsdkjfh', '576890', 'P', '2025-06-15 15:41:56', '2025-06-15 15:42:54', 'kjdhfkjh');
INSERT INTO `pegawai` (`id`, `nik`, `nama`, `agama`, `alamat`, `telp`, `jkel`, `created_at`, `updated_at`, `jabatan`) VALUES (3, '43256521`', 'CACA', 'ISLAM', 'hjgk', 'jhgk', 'L', '2025-06-15 15:43:09', '2025-06-15 15:43:09', 'fytuhgjkl');
INSERT INTO `pegawai` (`id`, `nik`, `nama`, `agama`, `alamat`, `telp`, `jkel`, `created_at`, `updated_at`, `jabatan`) VALUES (4, '678690-', 'DONI', 'ISLAM', 'vhjbk', 'uhvbjkn', 'L', '2025-06-15 15:43:15', '2025-06-15 15:43:15', 'ghjkl');
COMMIT;

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kriteria_id` int(10) unsigned DEFAULT NULL,
  `nilai` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
BEGIN;
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (3, 1, '2025-06-15 16:06:15', '2025-06-15 16:25:33', 1, 8);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (4, 1, '2025-06-15 16:06:15', '2025-06-15 16:10:34', 2, 3);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (5, 1, '2025-06-15 16:06:15', '2025-06-15 16:10:34', 3, 3);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (6, 1, '2025-06-15 16:06:15', '2025-06-15 16:10:34', 4, 4);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (11, 2, '2025-06-15 16:17:08', '2025-06-15 16:17:08', 1, 8);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (12, 2, '2025-06-15 16:17:08', '2025-06-15 16:17:08', 2, 7);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (13, 2, '2025-06-15 16:17:08', '2025-06-15 16:17:08', 3, 6);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (14, 2, '2025-06-15 16:17:08', '2025-06-15 16:17:08', 4, 7);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (15, 3, '2025-06-15 16:17:13', '2025-06-15 16:17:13', 1, 8);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (16, 3, '2025-06-15 16:17:13', '2025-06-15 16:17:13', 2, 7);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (17, 3, '2025-06-15 16:17:13', '2025-06-15 16:17:13', 3, 6);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (18, 3, '2025-06-15 16:17:13', '2025-06-15 16:17:13', 4, 8);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (19, 4, '2025-06-15 16:17:18', '2025-06-15 16:17:18', 1, 5);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (20, 4, '2025-06-15 16:17:18', '2025-06-15 16:17:18', 2, 6);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (21, 4, '2025-06-15 16:17:18', '2025-06-15 16:17:18', 3, 7);
INSERT INTO `penilaian` (`id`, `pegawai_id`, `created_at`, `updated_at`, `kriteria_id`, `nilai`) VALUES (22, 4, '2025-06-15 16:17:18', '2025-06-15 16:17:18', 4, 8);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (1, 'superadmin', 'superadmin', '$2y$12$r0HAFQIZdiAabhk3HwCdVub716cax1jMnmwKnv76nJz8sJx0M3TB6', NULL, NULL, '2024-12-20 02:49:44', 'superadmin');
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (11, 'adi', 'adi2', '$2y$12$S8y2eXzZhf7OMrScCfdwT.9EZo6yv7EBZUkrk/faHh3DNzW/7zhPu', NULL, '2025-05-12 23:54:44', '2025-05-12 23:56:31', 'superadmin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
