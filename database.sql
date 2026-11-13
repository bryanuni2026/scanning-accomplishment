CREATE DATABASE IF NOT EXISTS scanning_accomplishment
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE scanning_accomplishment;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY unique_username (username)
);

CREATE TABLE IF NOT EXISTS accomplishments (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    location VARCHAR(100) NOT NULL,
    documents INT UNSIGNED NOT NULL,
    file_date DATE NOT NULL,
    finished_at DATETIME NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_location (location),
    INDEX idx_file_date (file_date),
    INDEX idx_finished_at (finished_at)
);

INSERT INTO users (
    username,
    password,
    full_name
)
VALUES (
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEaQ8h7j2k7y6eYJf8Kz4JQ3J9e',
    'Administrator'
)
ON DUPLICATE KEY UPDATE
    username = username;