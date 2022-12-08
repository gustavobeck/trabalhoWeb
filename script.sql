CREATE DATABASE IF NOT EXISTS `memory_game`;

USE `memory_game`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `birthday` DATE NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(11) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`cpf`),
  UNIQUE (`email`)
);

CREATE TABLE IF NOT EXISTS `game_match` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `size` INT NOT NULL,
  `mode` VARCHAR(40) NOT NULL,
  `time` INT NOT NULL,
  `date` DATE NOT NULL,
  `score` INT NOT NULL,
  `id_user` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_user`) REFERENCES `user`(`id`)
);
