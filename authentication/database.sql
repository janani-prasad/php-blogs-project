/* Create Database and Table */
create database authentication;

use authentication;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100),
  `email` varchar(100),
  `password` varchar(15),
  PRIMARY KEY  (`id`)
);

create database blog;

use blog;

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100),
  `email` varchar(100),
  `content` varchar(10000),
  PRIMARY KEY  (`id`)
);
