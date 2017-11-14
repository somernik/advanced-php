-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tasks` (`id`, `desc`) VALUES
(2,	'super easy task'),
(3,	'\' --hi'),
(4,	'really meh task'),
(5,	'New really awesome Description'),
(6,	'really meh task'),
(8,	'really meh task'),
(9,	'really difficult task'),
(10,	'New description'),
(12,	'really meh task'),
(13,	'really difficult task'),
(14,	'really meh task'),
(15,	'really difficult task'),
(16,	'really meh task'),
(17,	'really difficult task'),
(18,	'really meh task'),
(19,	'really difficult task'),
(20,	'really meh task'),
(21,	'really difficult task'),
(23,	'A lovely Description'),
(24,	'Description'),
(25,	'cool description'),
(26,	'cool description');

-- 2017-11-01 01:40:04
