-- Create a new table called 'users'
-- Drop the table if it already exists
CREATE TABLE `tbl_reservasi` (
  `id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `poli_category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservased_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_reservased_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci