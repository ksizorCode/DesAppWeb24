-- Adminer 4.8.3 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `foto`, `lat`, `lon`, `fechainicio`, `fechafin`) VALUES
(1,	'Fiesta la Sidra',	'sidra y escanciar',	'sidra.jpg',	'43.3582182',	'-5.5084707',	'2015-12-12',	'2015-12-12'),
(2,	'Fiesta de la Sidra',	'Celebración de la sidra asturiana con degustaciones, escanciado y actividades',	'sidra.jpg',	'43.3582182',	'-5.5084707',	'2024-12-12',	'2024-12-12'),
(3,	'Descenso del Sella',	'Competición de piragüismo por el río Sella',	'descenso_sella.jpg',	'43.3611111',	'-5.4833333',	'2024-08-06',	'2024-08-06'),
(4,	'Festival Intercéltico de Lorient',	'Evento cultural que celebra la cultura celta',	'festival_lorient.jpg',	'47.7380556',	'-3.3666667',	'2024-08-03',	'2024-08-12'),
(5,	'Feria de Abril de Sevilla',	'Feria popular con flamenco, sevillanas y gastronomía',	'feria_abril.jpg',	'37.0022222',	'-5.9952778',	'2024-04-27',	'2024-05-05'),
(6,	'San Fermín',	'Fiesta popular con encierros de toros y actividades culturales',	'san_fermin.jpg',	'42.8180556',	'-1.6444444',	'2024-07-06',	'2024-07-14'),
(7,	'Fiesta de la Sidra',	'Celebración de la sidra asturiana con degustaciones, escanciado y actividades',	'sidra.jpg',	'43.3582182',	'-5.5084707',	'2024-12-12',	'2024-12-12'),
(8,	'Descenso del Sella',	'Competición de piragüismo por el río Sella',	'descenso_sella.jpg',	'43.3611111',	'-5.4833333',	'2024-08-06',	'2024-08-06'),
(9,	'Festival Intercéltico de Lorient',	'Evento cultural que celebra la cultura celta',	'festival_lorient.jpg',	'47.7380556',	'-3.3666667',	'2024-08-03',	'2024-08-12'),
(10,	'Feria de Abril de Sevilla',	'Feria popular con flamenco, sevillanas y gastronomía',	'feria_abril.jpg',	'37.0022222',	'-5.9952778',	'2024-04-27',	'2024-05-05'),
(11,	'San Fermín',	'Fiesta popular con encierros de toros y actividades culturales',	'san_fermin.jpg',	'42.8180556',	'-1.6444444',	'2024-07-06',	'2024-07-14');

-- 2024-03-11 20:13:55