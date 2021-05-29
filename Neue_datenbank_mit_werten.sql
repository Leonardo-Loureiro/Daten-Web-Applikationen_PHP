SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `bestellung` (
  `id` int(11) NOT NULL auto_increment,
  `kunde_id` int(11) NOT NULL,
  `vorstellung_id` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL,
  `kreditkartenummer` varchar(16) default '',
  `kreditkartejahr` int(11) default NULL,
  `abholdatum` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `kunde_id` (`kunde_id`),
  KEY `vorstellung_id` (`vorstellung_id`),
  CONSTRAINT `bestellung_ibfk_1` FOREIGN KEY (`kunde_id`) REFERENCES `kunde` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bestellung_ibfk_2` FOREIGN KEY (`vorstellung_id`) REFERENCES `vorstellung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `film` (
  `id` int(11) NOT NULL auto_increment,
  `titel` varchar(80) NOT NULL default '',
  `verleiher_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `verleiher_id` (`verleiher_id`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`verleiher_id`) REFERENCES `verleiher` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `film` values('1','Piraten der Karibik','2'),
 ('2','Cars','2'),
 ('3','Casino Royale','1');

CREATE TABLE `kunde` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(80) NOT NULL default '',
  `vorname` varchar(80) NOT NULL default '',
  `strasse` varchar(80) NOT NULL default '',
  `plz` varchar(8) NOT NULL default '',
  `ort` varchar(80) NOT NULL default '',
  `landcode` char(2) NOT NULL default '',
  `telefon` varchar(20) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `kunde` values('1','Mustermann','Max','Hauptstrasse','8000','Zürich','CH','044 44 44 444','Max@Musermann.ch'),
 ('2','Wyss','Kim','Hauptstrasse','4000','Basel','CH','061 44 44 444','Kim@Wyss.ch');

CREATE TABLE `verleiher` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(80) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `verleiher` values('1','Sony Pictures'),
 ('2','Disney');

CREATE TABLE `vorstellung` (
  `id` int(11) NOT NULL auto_increment,
  `datum` datetime NOT NULL,
  `film_id` int(11) NOT NULL,
  `preis` decimal(4,2) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `film_id` (`film_id`),
  CONSTRAINT `vorstellung_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `vorstellung` values('1','2006-12-02 18:00:00','1','12'),
 ('2','2006-12-03 20:00:00','1','12'),
 ('3','2006-12-04 20:00:00','3','17');

CREATE TABLE IF NOT EXISTS `login` (
  `benutzername` varchar(50) NOT NULL,
  `passwort` varchar(50) NOT NULL,
  `usertype` int(6) NOT NULL,
  PRIMARY KEY (`benutzername`)
) ENGINE=InnoDB;

INSERT INTO `login` (`benutzername`, `passwort`, `usertype`) VALUES
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);



SET FOREIGN_KEY_CHECKS = 1;
