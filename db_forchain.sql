/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411 (10.4.11-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_forchain

 Target Server Type    : MySQL
 Target Server Version : 100411 (10.4.11-MariaDB)
 File Encoding         : 65001

 Date: 15/05/2023 03:07:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for gejala
-- ----------------------------
DROP TABLE IF EXISTS `gejala`;
CREATE TABLE `gejala`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_gejala` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_gejala` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_gejala` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gejala
-- ----------------------------
INSERT INTO `gejala` VALUES (1, 'Bercak hitam kecoklatan/kemerahan pada daun', 'G001 ', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (2, 'Bunga menjadi mengering dan berguguran', 'G002 ', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (3, 'Bercak hitam pada buah dan berguguran', 'G003 ', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (4, 'Kulit batang/ranting pecah-pecah', 'G004 ', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (5, 'Mengelurakan cairan getah berwarana coklat kehitaman pada batang', 'G005 ', 'gambar-1683811970131logo.png', NULL, NULL);
INSERT INTO `gejala` VALUES (6, 'Kulit batang menglupas dan akhirnya bisa mati', 'G006 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (7, 'Daun berbintik hitam dan menggulung', 'G007 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (8, 'Bunga menjadi layu', 'G008 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (9, 'Buah busuk', 'G009 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (10, 'Daun berubah menjadi hitam', 'G010 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (11, 'Bercak kuning yang akan berubah menjadi abu-abu', 'G011 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (12, 'Mempengaruhi proses pembuahan', 'G012 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (13, 'Bercak coklat kemerahan pada daun dan bunga', 'G013 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (14, 'Pohon menjadi susah besar alias pertumbuhannya lambat', 'G014 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (15, 'Daun mulai berkurang sehingga pohon terlihat gersang', 'G015 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (16, 'Kematian Tanaman', 'G016 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (17, 'Kulit buah terdapat titik noda hitam', 'G017 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (18, 'Buah jatuh/berguguran', 'G018 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (19, 'Permukaan daun berbintil-bintil menyerupai bisul', 'G019 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (20, 'Daun Memucat', 'G020 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (21, 'Serbuk gergaji pada pucuk atau cabang mangga', 'G021 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (22, 'Tunas daun layu', 'G022 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (23, 'Tanaman mati', 'G023 ', 'gejala.png', NULL, NULL);
INSERT INTO `gejala` VALUES (24, 'Mati pucuk', 'G024 ', 'gejala.png', NULL, NULL);

-- ----------------------------
-- Table structure for konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_konsultasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rule_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------
INSERT INTO `konsultasi` VALUES (70, '6460a45c032d1', 19, 1, NULL, NULL);
INSERT INTO `konsultasi` VALUES (71, '6460a54d010c5', 19, 1, NULL, NULL);
INSERT INTO `konsultasi` VALUES (72, '6460a57c461a0', 19, 13, NULL, NULL);
INSERT INTO `konsultasi` VALUES (73, '6460da3eec3bd', 19, 13, NULL, NULL);

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` bigint NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (5, 13, 'lutfi', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', 'v1SKuagoBC16wVhhDs4rSGfKkpHBTyrd4FbJuLQ2zXMlYIq2KXdQmegdCOu0sWl9XjE1HAoYsehdr3S5', NULL, NULL, NULL);
INSERT INTO `login` VALUES (6, 14, 'riris', '$2y$10$/5iTPNir.eXKq1HPgpu94urwQMxmFWdiMGoM7/696hqR0gzbYVmK6', 'BidKgqskU0J7idCGasRzRf7cVnz0z6xk3Hbc2PkqLKwWhSFVkA4dClzaH7X7YkyaR1T1R8ssLJJVhBov', NULL, NULL, NULL);
INSERT INTO `login` VALUES (7, 15, 'adi', '$2y$10$V4X/0GJy4kK8evXoMif5heSPJ4K1fuYQ91uOjFyZcfc/DQXZsRcey', 'GaIyZxWs5YMjrdH1qpu1svm4p0s0XzI1Kdqzw2Wd3nSCgc4AvOEGjlnqLvyRERfRolE3plQsnI9cpQuN', NULL, NULL, NULL);
INSERT INTO `login` VALUES (8, 16, 'yudi', '$2y$10$.Z7jL.ygAr7tepLZA0bcJuj//y1P26C7OPQnuOD1/JYgMbtNo76Zi', '7Fr4C0AXoddsC9QVzD2lerIgMwemOQBsOolQRcIU6c29kkseUMudc1qJ4sIGsBazrPVppuKNdivteCzO', NULL, NULL, NULL);
INSERT INTO `login` VALUES (9, 17, 'arif', '$2y$10$QRzVFI.EMjvbmMXWdXZ6c.jCcqT.3unkqGAB8QggposdCerjQATVO', 'qExN1QPZHiaD2aj3Loz66Kst09i4bkGOyglKou5CA9QZxD3ehNQHhouKY1DaLFiHUpu9m7kdHqNsGFGL', NULL, NULL, NULL);
INSERT INTO `login` VALUES (10, 18, 'ahmad', '$2y$10$s9Mx9HuCEkC2e1wHRgwmzerjeBsI226qw1YNRiUCZKRcMlrTb6F4K', 'or7xa0U2idaaguMDdFqpv0CRnAgY4s1dyUxlL4BxEsL4LrWd7zZs5t8fQiSMX3lMrnNKA1CBund8XjsV', NULL, NULL, NULL);
INSERT INTO `login` VALUES (11, 19, 'abcd', '$2y$10$wcQqtqtnsykTznDWIdQYGeyaSX0HoQgq/9y/vEhgRBZPT6g/MM4Hm', 'YsNK1qAPUYegfsBDkWoSf51dUgU6gfEGuenWXsRfnsBLOVKLss97li6K9qYQsDNvaJ8zdTkwzaE4bd9j', NULL, NULL, NULL);
INSERT INTO `login` VALUES (12, 20, 'ayu', '$2y$10$uvM5LiqyxhGtDnEEGrL56.h/hpah68zJwi2kYao80PJZTu5VJE3xG', 'uJAuRox20kOc5zz85Zl5iJPcv9ldCWAUYdGssXv7idrbE6hqZeK2giLYKkv0xds3i6oIzf7e2dHOdc3p', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_02_17_071725_create_konsultasis_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_02_17_071859_create_penyakits_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_02_17_073343_create_pengetahuans_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_02_17_121631_create_pengetahuan2s_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_02_17_150924_create_gejalas_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for pengetahuan
-- ----------------------------
DROP TABLE IF EXISTS `pengetahuan`;
CREATE TABLE `pengetahuan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_rule` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyakit_id` bigint UNSIGNED NOT NULL,
  `gejala_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengetahuan
-- ----------------------------
INSERT INTO `pengetahuan` VALUES (13, 'R001', 1, '1,2,3,4', NULL, NULL);
INSERT INTO `pengetahuan` VALUES (14, 'R002', 2, '8,9,10', NULL, NULL);

-- ----------------------------
-- Table structure for pengetahuan2
-- ----------------------------
DROP TABLE IF EXISTS `pengetahuan2`;
CREATE TABLE `pengetahuan2`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `penyakit_id` bigint UNSIGNED NOT NULL,
  `G001` int NOT NULL,
  `G002` int NOT NULL,
  `G003` int NOT NULL,
  `G004` int NOT NULL,
  `G005` int NOT NULL,
  `G006` int NOT NULL,
  `G007` int NOT NULL,
  `G008` int NOT NULL,
  `G009` int NOT NULL,
  `G010` int NOT NULL,
  `G011` int NOT NULL,
  `G012` int NOT NULL,
  `G013` int NOT NULL,
  `G014` int NOT NULL,
  `G015` int NOT NULL,
  `G016` int NOT NULL,
  `G017` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengetahuan2
-- ----------------------------

-- ----------------------------
-- Table structure for penyakit
-- ----------------------------
DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE `penyakit`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `penyakit_kode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit_nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit_sebab` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit_solusi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penyakit
-- ----------------------------
INSERT INTO `penyakit` VALUES (1, 'P001 ', 'Antraknose', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);
INSERT INTO `penyakit` VALUES (2, 'P002 ', 'Diplodia', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);
INSERT INTO `penyakit` VALUES (3, 'P003 ', 'Bercak Karat Merah', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);
INSERT INTO `penyakit` VALUES (4, 'P004', 'Ulat Penggerek Buah', 'SEBAB PENYAKIT', 'solusi penyakit', NULL, NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for rules
-- ----------------------------
DROP TABLE IF EXISTS `rules`;
CREATE TABLE `rules`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `parent_id` int NULL DEFAULT NULL,
  `gejala_id` int NOT NULL,
  `ya` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tidak` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rules
-- ----------------------------
INSERT INTO `rules` VALUES (4, NULL, 1, 'G002', 'P001');
INSERT INTO `rules` VALUES (7, NULL, 2, 'G003', 'P001');
INSERT INTO `rules` VALUES (8, NULL, 3, 'P003', 'G002');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emails` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`emails` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'lutfirudianto', 'Lutfi Rudianto', 'test@example.com', '2023-03-14 11:55:38', 'admin', '$2y$10$F9rhXvY.ghAwmm2V0m2VZ.FKq7Ktdq9DQnHRP5bHJ5fyOYS9Jp2J.', '27r2GECl4d', '2023-03-14 11:55:38', '2023-03-14 11:55:38', 'wcd4WZdz30L8olRqsvSQh64XRrIq5Moo2RInob6Yf8cReUFsdKGfnK6UtorrOZERPjESKgLwd82lAQb0');
INSERT INTO `users` VALUES (7, 'aji', 'aji', NULL, NULL, 'admin', '$2y$10$6v5.RNMe3UNII/XHBWMDzehsZAjVCzi.yN6xX3ubIciuW.sekq8te', NULL, '2023-03-14 13:02:09', '2023-03-14 13:02:09', '');
INSERT INTO `users` VALUES (11, 'fatun nida', 'fatun nida', NULL, NULL, 'admin', '$2y$10$K3GyzdBgh2hkCLEdo.m2au13I1woPxVymwL4NstxJk6qA7jh2WRny', NULL, '2023-03-14 14:02:08', '2023-03-14 14:02:08', '');
INSERT INTO `users` VALUES (13, 'lutfi', 'lutfirudianto', NULL, NULL, 'admin', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', NULL, '2023-03-22 03:53:56', '2023-03-22 03:53:56', 'rByuXnusxNSnd9lwPrBqdN9EB1g4OhiDd5yeRNff2W0PBcYlmdPNJ1a0r0fvAijas2kfcTBd3CXk5Oop');
INSERT INTO `users` VALUES (14, 'riris', 'riris z', NULL, NULL, 'admin', '$2y$10$JQJyTOkYwGx8Kj1CfLilWui2pARLMwNkw5Ov5GPd0ECK3/7l484au', NULL, '2023-03-23 19:54:41', '2023-03-23 19:54:41', 'nKlPgJPC3s1duokseLkZdk4drjtLA4sEh4c9xi0IPqIvZWtQSHGIKhkXdNssSdxWsSK4XHxOJ5Sd8dsr');
INSERT INTO `users` VALUES (15, 'adi', 'adi s', NULL, NULL, 'peserta', '', NULL, '2023-03-23 21:17:45', '2023-03-23 21:17:45', '');
INSERT INTO `users` VALUES (16, 'yudi', 'yudi', NULL, NULL, 'peserta', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', NULL, '2023-03-24 01:36:56', '2023-03-24 01:36:56', 'W5fStIPs7ui9nfw9epzCOp2r9EhdnUqkzi7TA3NGSU71Ve8sjgYCCKo0SOp213AxdABekWtssDwilDmF');
INSERT INTO `users` VALUES (17, 'arif', 'arif', NULL, NULL, 'peserta', '$2y$10$YKEcBZ3cIx2FeDXZv00LH.6MB45tod6GIVi/GJLj7l.YRgiWsD7eO', NULL, '2023-03-24 02:26:26', '2023-03-24 02:26:26', 'dCJ01PZh0ESMtsKXlvtws7AwctzZjSYsFs9L3cSL4ffbVZN0sZ0edh7OVFiiZkHChoVIbdBuOucbJKcp');
INSERT INTO `users` VALUES (18, 'ahmad', 'ahmad setiaji', NULL, NULL, 'peserta', '$2y$10$N7D8TrwsKP6qiW5CJHeokeheaw1tyXzTUdBBqneDld6OoUBtZW8Ba', NULL, '2023-03-25 20:10:02', '2023-03-25 20:10:02', '');
INSERT INTO `users` VALUES (19, 'abcd', 'abcd', NULL, NULL, 'peserta', '$2y$10$JQJyTOkYwGx8Kj1CfLilWui2pARLMwNkw5Ov5GPd0ECK3/7l484au', NULL, '2023-04-14 13:53:49', '2023-04-14 13:53:49', '30BG1sb2UaNTRvHb93erB7UGGFfsZYdWKEMhRdnuRRGljr8RKeHHEu2soCq3lAdTaSdOeC10pdU0dx98');
INSERT INTO `users` VALUES (20, 'ayu', 'ayu wulandari', NULL, NULL, 'peserta', '$2y$10$b0VtLJt0fCds7ufnwBPXNuiOw88pw8DtolIOdWLW8E5EKThtA0VeK', NULL, '2023-05-14 19:24:30', '2023-05-14 19:24:30', 'GaQzLHUdcQoBocidddmLyLsodWUsXZWSuFx4HORptmNoqWz20ViOELCxEL8PxSIT0TOebWYx3Drims0C');

-- ----------------------------
-- View structure for v_login
-- ----------------------------
DROP VIEW IF EXISTS `v_login`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_login` AS SELECT `l`.`id` AS `id`, `l`.`user_id` AS `user_id`, `u`.`name` AS `name`, `u`.`level` AS `level`, `l`.`username` AS `username`, `l`.`password` AS `password`, `l`.`created_at` AS `created_at`, `l`.`updated_at` AS `updated_at`, `l`.`created_by` AS `created_by` FROM (`login` `l` left join `users` `u` on(`u`.`id` = `l`.`user_id`)) ;

SET FOREIGN_KEY_CHECKS = 1;
