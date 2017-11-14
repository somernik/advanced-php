-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `createCount` int(11) NOT NULL,
  `readCount` int(11) NOT NULL,
  `readallCount` int(11) NOT NULL,
  `updateCount` int(11) NOT NULL,
  `deleteCount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `requests` (`id`, `username`, `createCount`, `readCount`, `readallCount`, `updateCount`, `deleteCount`) VALUES
(1,	'sarah',	1,	2,	2,	1,	1);

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tasks` (`id`, `desc`) VALUES
(2,	'New Description'),
(3,	'\' --hi'),
(4,	'really meh task'),
(5,	'New really awesome Description'),
(6,	'really meh task'),
(9,	'really difficult task'),
(10,	'New description'),
(13,	'hello'),
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
(26,	'cool description'),
(27,	'cool description'),
(28,	'cool description'),
(29,	'cool description'),
(30,	'cool description'),
(31,	'cool description'),
(32,	'cool description'),
(33,	'cool description'),
(34,	'test with username validation'),
(35,	'testing counts'),
(36,	'new task');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `created`) VALUES
(2,	'sarah',	'$2y$10$ngUEZxq7abH3a1m612MjbO6Z.GVzak/XUJWIES02bD83qmMHxJapC',	'2017-11-06 23:54:37');

-- 2017-11-07 03:46:43

