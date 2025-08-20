-- Activities table schema and sample data for shreekshetra_travels

-- Drop existing table if you want a clean import (optional, comment out if not desired)
-- DROP TABLE IF EXISTS `activities`;

CREATE TABLE IF NOT EXISTS `activities` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10,2) DEFAULT 0,
  `duration` VARCHAR(100) NOT NULL,
  `image_url` TEXT NOT NULL,
  `short_desc` TEXT NOT NULL,
  `status` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data
INSERT INTO `activities` (`title`, `location`, `category`, `price`, `duration`, `image_url`, `short_desc`, `status`, `created_at`, `updated_at`) VALUES
('Sunrise Temple Tour', 'Puri, Odisha', 'Sightseeing', 799.00, 'Half Day', 'assets/images/about-travel-img1.jpg', 'Experience the spiritual aura of Jagannath Temple and nearby heritage spots at sunrise.', 1, NOW(), NOW()),
('Chilika Lake Boat Ride', 'Chilika, Odisha', 'Adventure', 1499.00, 'Full Day', 'assets/images/about-travel-img2.jpg', 'Dolphin spotting and island hopping on Asia\'s largest brackish water lagoon.', 1, NOW(), NOW()),
('Konark Heritage Walk', 'Konark, Odisha', 'Culture', 999.00, '3 Hours', 'assets/images/tour-2.jpg', 'Guided walk around the Sun Temple, exploring history and architecture.', 1, NOW(), NOW());
