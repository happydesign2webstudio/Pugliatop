CREATE TABLE `composers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(75) NOT NULL,
  `date_birth` date NOT NULL,
  `date_death` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;


INSERT INTO `composers` (`id`, `name`, `date_birth`, `date_death`) VALUES 
(1, 'Amadeus Mozart', '1756-01-27', '1791-12-05'),
(2, 'Franz Schubert', '1797-01-31', '1828-11-19'),
(3, 'Ludwig van Beethoven', '1770-12-17', '1827-03-26'),
(4, 'Johannes Brahms', '1833-05-07', '1897-04-03'),
(5, 'Joseph Haydn', '1732-03-31', '1809-05-31'),
(6, 'Johann Sebastian Bach', '1685-03-21', '1750-07-28'),
(7, 'Gioacchino Rossini', '1792-02-29', '1868-11-13'),
(8, 'Giuseppe Verdi', '1813-10-10', '1901-01-27'),
(9, 'Frederic Chopin', '1810-03-01', '1849-10-17'),
(10, 'Robert Schumann', '1810-06-08', '1856-07-29'),
(11, 'Georg Friedrich Handel', '1685-02-23', '1759-04-14'),
(12, 'Gustav Mahler', '1860-07-07', '1911-05-18'),
(13, 'Giacomo Puccini', '1858-12-22', '1924-11-29'),
(14, 'Georges Bizet', '1838-10-25', '1875-06-03'),
(15, 'Claude Debussy ', '1862-08-22', '1918-03-25');
