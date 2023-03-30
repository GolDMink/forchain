/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_forchain

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 30/03/2023 20:26:26
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
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gejala
-- ----------------------------
INSERT INTO `gejala` VALUES (1, 'Gejala 1', 'G001', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (2, 'GEJALA 2', 'G002', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (3, 'GEJALA 3', 'G003', 'gambar-1679622341401logopemkot1.png', NULL, NULL);
INSERT INTO `gejala` VALUES (4, 'GEJALA 4', 'G004', 'gambar-1679622341401logopemkot1.png', NULL, NULL);

-- ----------------------------
-- Table structure for konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_konsultasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `penyakit_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------
INSERT INTO `konsultasi` VALUES (1, '641cc2a9e00f2', 15, 0, NULL, NULL);
INSERT INTO `konsultasi` VALUES (2, '641cc2cf9461b', 15, 1, NULL, NULL);
INSERT INTO `konsultasi` VALUES (3, '641cc62386893', 15, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (4, '641cff132fb9f', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (5, '641d0a2b59087', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (6, '641d0a59f281f', 9, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (7, '641d0b27d747b', 17, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (8, '641d0b644827e', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (9, '641d6b58d315c', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (10, '641d6c85e5917', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (11, '641d6cd721565', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (12, '641d6d5edb4ff', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (13, '641d75a32b64b', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (14, '641dd5f57a41e', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (15, '641ddbef282ab', 16, 1, NULL, NULL);
INSERT INTO `konsultasi` VALUES (16, '641de3f8470af', 16, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (17, '641f5556335cb', 10, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (18, '641f55ed30e36', 18, 3, NULL, NULL);
INSERT INTO `konsultasi` VALUES (19, '641f56b712213', 18, 3, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES (5, 13, 'lutfi', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', 'v1SKuagoBC16wVhhDs4rSGfKkpHBTyrd4FbJuLQ2zXMlYIq2KXdQmegdCOu0sWl9XjE1HAoYsehdr3S5', NULL, NULL, NULL);
INSERT INTO `login` VALUES (6, 14, 'riris', '$2y$10$/5iTPNir.eXKq1HPgpu94urwQMxmFWdiMGoM7/696hqR0gzbYVmK6', 'BidKgqskU0J7idCGasRzRf7cVnz0z6xk3Hbc2PkqLKwWhSFVkA4dClzaH7X7YkyaR1T1R8ssLJJVhBov', NULL, NULL, NULL);
INSERT INTO `login` VALUES (7, 15, 'adi', '$2y$10$V4X/0GJy4kK8evXoMif5heSPJ4K1fuYQ91uOjFyZcfc/DQXZsRcey', 'GaIyZxWs5YMjrdH1qpu1svm4p0s0XzI1Kdqzw2Wd3nSCgc4AvOEGjlnqLvyRERfRolE3plQsnI9cpQuN', NULL, NULL, NULL);
INSERT INTO `login` VALUES (8, 16, 'yudi', '$2y$10$.Z7jL.ygAr7tepLZA0bcJuj//y1P26C7OPQnuOD1/JYgMbtNo76Zi', '7Fr4C0AXoddsC9QVzD2lerIgMwemOQBsOolQRcIU6c29kkseUMudc1qJ4sIGsBazrPVppuKNdivteCzO', NULL, NULL, NULL);
INSERT INTO `login` VALUES (9, 17, 'arif', '$2y$10$QRzVFI.EMjvbmMXWdXZ6c.jCcqT.3unkqGAB8QggposdCerjQATVO', 'qExN1QPZHiaD2aj3Loz66Kst09i4bkGOyglKou5CA9QZxD3ehNQHhouKY1DaLFiHUpu9m7kdHqNsGFGL', NULL, NULL, NULL);
INSERT INTO `login` VALUES (10, 18, 'ahmad', '$2y$10$s9Mx9HuCEkC2e1wHRgwmzerjeBsI226qw1YNRiUCZKRcMlrTb6F4K', 'or7xa0U2idaaguMDdFqpv0CRnAgY4s1dyUxlL4BxEsL4LrWd7zZs5t8fQiSMX3lMrnNKA1CBund8XjsV', NULL, NULL, NULL);

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
  INDEX `password_resets_email_index`(`email`) USING BTREE
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
  `penyakit_id` bigint UNSIGNED NOT NULL,
  `gejala_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengetahuan
-- ----------------------------
INSERT INTO `pengetahuan` VALUES (1, 1, 1, NULL, NULL);
INSERT INTO `pengetahuan` VALUES (2, 2, 2, NULL, NULL);
INSERT INTO `pengetahuan` VALUES (4, 3, 1, NULL, NULL);
INSERT INTO `pengetahuan` VALUES (5, 3, 3, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of penyakit
-- ----------------------------
INSERT INTO `penyakit` VALUES (1, 'P001', 'PENYAKIT 1', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);
INSERT INTO `penyakit` VALUES (2, 'P002', 'PENYAKIT 2', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);
INSERT INTO `penyakit` VALUES (3, 'P003', 'PENYAKIT 3', 'SEBAB PENYAKIT', 'SOLUSI PENYAKIT', NULL, NULL);

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
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
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
  UNIQUE INDEX `users_email_unique`(`emails`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'lutfirudianto', 'Lutfi Rudianto', 'test@example.com', '2023-03-14 11:55:38', 'admin', '$2y$10$F9rhXvY.ghAwmm2V0m2VZ.FKq7Ktdq9DQnHRP5bHJ5fyOYS9Jp2J.', '27r2GECl4d', '2023-03-14 11:55:38', '2023-03-14 11:55:38', 'wcd4WZdz30L8olRqsvSQh64XRrIq5Moo2RInob6Yf8cReUFsdKGfnK6UtorrOZERPjESKgLwd82lAQb0');
INSERT INTO `users` VALUES (7, 'aji', 'aji', NULL, NULL, 'admin', '$2y$10$6v5.RNMe3UNII/XHBWMDzehsZAjVCzi.yN6xX3ubIciuW.sekq8te', NULL, '2023-03-14 13:02:09', '2023-03-14 13:02:09', '');
INSERT INTO `users` VALUES (11, 'fatun nida', 'fatun nida', NULL, NULL, 'admin', '$2y$10$K3GyzdBgh2hkCLEdo.m2au13I1woPxVymwL4NstxJk6qA7jh2WRny', NULL, '2023-03-14 14:02:08', '2023-03-14 14:02:08', '');
INSERT INTO `users` VALUES (13, 'lutfi', 'lutfirudianto', NULL, NULL, 'admin', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', NULL, '2023-03-22 03:53:56', '2023-03-22 03:53:56', 'rIeSeCvUHNL6doLdIhIsREnYfRgFTc7s67YKdJa1OjCssQASMg1kECJLcxVKt57JYiZlXWsaMyH7fqDP');
INSERT INTO `users` VALUES (14, 'riris', 'riris z', NULL, NULL, 'peserta', '', NULL, '2023-03-23 19:54:41', '2023-03-23 19:54:41', '');
INSERT INTO `users` VALUES (15, 'adi', 'adi s', NULL, NULL, 'peserta', '', NULL, '2023-03-23 21:17:45', '2023-03-23 21:17:45', '');
INSERT INTO `users` VALUES (16, 'yudi', 'yudi', NULL, NULL, 'peserta', '$2y$10$DAl.v/3Dh/.RZJ2GJHT2vO89hPur163Qg07NqKMJHDc38fthWz8By', NULL, '2023-03-24 01:36:56', '2023-03-24 01:36:56', 'W5fStIPs7ui9nfw9epzCOp2r9EhdnUqkzi7TA3NGSU71Ve8sjgYCCKo0SOp213AxdABekWtssDwilDmF');
INSERT INTO `users` VALUES (17, 'arif', 'arif', NULL, NULL, 'peserta', '$2y$10$YKEcBZ3cIx2FeDXZv00LH.6MB45tod6GIVi/GJLj7l.YRgiWsD7eO', NULL, '2023-03-24 02:26:26', '2023-03-24 02:26:26', 'dCJ01PZh0ESMtsKXlvtws7AwctzZjSYsFs9L3cSL4ffbVZN0sZ0edh7OVFiiZkHChoVIbdBuOucbJKcp');
INSERT INTO `users` VALUES (18, 'ahmad', 'ahmad setiaji', NULL, NULL, 'peserta', '$2y$10$N7D8TrwsKP6qiW5CJHeokeheaw1tyXzTUdBBqneDld6OoUBtZW8Ba', NULL, '2023-03-25 20:10:02', '2023-03-25 20:10:02', '');

-- ----------------------------
-- View structure for v_login
-- ----------------------------
DROP VIEW IF EXISTS `v_login`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_login` AS SELECT `l`.`id` AS `id`, `l`.`user_id` AS `user_id`, `u`.`name` AS `name`, `u`.`level` AS `level`, `l`.`username` AS `username`, `l`.`password` AS `password`, `l`.`created_at` AS `created_at`, `l`.`updated_at` AS `updated_at`, `l`.`created_by` AS `created_by` FROM (`login` `l` left join `users` `u` on(`u`.`id` = `l`.`user_id`)) ;

SET FOREIGN_KEY_CHECKS = 1;
