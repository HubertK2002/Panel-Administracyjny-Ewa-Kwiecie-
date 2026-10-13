-- Uruchom w bazie wordpress_ewa.
-- Tabela zgłoszeń i nowa tabela przedszkoli muszą używać InnoDB dla klucza obcego.

CREATE TABLE `wp_przedszkola` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nazwa` VARCHAR(180) NOT NULL,
    `miejscowosc` VARCHAR(120) NOT NULL,
    `ulica` VARCHAR(180) NOT NULL,
    `numer` VARCHAR(20) NOT NULL,
    `kod_pocztowy` VARCHAR(6) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `wp_zgloszenia` ENGINE=InnoDB;

ALTER TABLE `wp_zgloszenia`
    ADD COLUMN `przedszkole_id` INT(11) NULL AFTER `nazwa_grupy`,
    ADD INDEX `idx_wp_zgloszenia_przedszkole_id` (`przedszkole_id`),
    ADD CONSTRAINT `fk_wp_zgloszenia_przedszkole`
        FOREIGN KEY (`przedszkole_id`)
        REFERENCES `wp_przedszkola` (`id`)
        ON UPDATE CASCADE
        ON DELETE SET NULL;
