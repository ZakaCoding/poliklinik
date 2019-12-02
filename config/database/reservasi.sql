-- Create a new table called 'users'
-- Drop the table if it already exists
CREATE TABLE `tbl_reservasi` (
  `reservation_id` varchar(13) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `poli_category` ENUM('Poli Umum','Poli Gigi', 'Poli Ibu dan Anak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` INT(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservased_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY `reservation_id` (`reservation_id`),
  UNIQUE KEY `id_reservased_unique` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;