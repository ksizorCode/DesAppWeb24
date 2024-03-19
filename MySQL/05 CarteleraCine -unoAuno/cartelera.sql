-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 16-02-2024 a las 18:16:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cartelera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nombre_genero` varchar(32) NOT NULL,
  `descripcion_genero` text NOT NULL,
  `foto_genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `nombre_genero`, `descripcion_genero`, `foto_genero`) VALUES
(1, 'Humor', 'risas y eso', 'humor.jpg'),
(2, 'Drama', 'Drama y llorar y eso...', 'drama.jpg'),
(3, 'Thriller', 'Descubren algo', 'thriller.jpg'),
(4, 'Romántico', 'Quierense mucho', 'romantico.jpg'),
(5, 'Politico', 'mala gente', 'politici.jpg'),
(6, 'Acción', 'Explosiones Saltar y Correr', 'accion.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cartel` varchar(255) NOT NULL,
  `sinopsis` text NOT NULL,
  `duracion` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `trailer` varchar(255) NOT NULL,
  `estreno` date NOT NULL,
  `fin` date DEFAULT NULL,
  `genero_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `cartel`, `sinopsis`, `duracion`, `calificacion`, `trailer`, `estreno`, `fin`, `genero_id`) VALUES
(7, 'Anatomía de una Caída', '6105.jpg', 'Unos que caen', 107, 12, 'youtube.com', '2024-01-10', '2024-02-29', 3),
(8, 'Agrylle', '6183.jpg', 'Super agente secreto', 75, 16, 'youtube.com/argaile', '2024-01-18', '2024-02-23', 1),
(9, 'Ferrari', '6333.jpg', 'Unos que caen', 107, 12, 'youtube.com', '2024-01-10', '2024-02-29', 2),
(10, 'Cazafantasmas', '6399.jpg', 'Unos que caen', 107, 12, 'youtube.com', '2024-01-10', '2024-02-29', 1),
(11, 'Secretos de un Escándalo', '6390.jpg', 'Unos que caen', 107, 12, 'youtube.com', '2024-01-10', '2024-02-29', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pelicula_genero` (`genero_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_pelicula_genero` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id_genero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
