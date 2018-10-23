CREATE TABLE `iwww`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NULL,
  `password` VARCHAR(60) NULL,
  `email` VARCHAR(60) NULL,
  `description` TEXT NULL,
  `created` DATETIME NULL,
  PRIMARY KEY (`id`));
