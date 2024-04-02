-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2024 a las 05:34:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `claseprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academia`
--

CREATE TABLE `academia` (
  `idAcademia` int(11) NOT NULL,
  `NombreAca` varchar(45) NOT NULL,
  `ClavePro` varchar(45) NOT NULL DEFAULT 'ITI',
  `Periodo` enum('Primavera','Otoño','Invierno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `academia`
--

INSERT INTO `academia` (`idAcademia`, `NombreAca`, `ClavePro`, `Periodo`) VALUES
(1, 'NO APLICA', 'ITI', 'Otoño'),
(2, 'Desarrollo Humano', 'ITI', 'Otoño'),
(3, 'Ciencias básicas', 'ITI', 'Primavera'),
(4, 'Matemáticas', 'ITI', 'Invierno'),
(5, 'Redes', 'ITI', 'Otoño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `FechaAgenda` datetime NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `idCoordinador2` int(11) NOT NULL,
  `idCoordinador3` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `FechaAgenda`, `idCoordinador`, `idCoordinador2`, `idCoordinador3`, `idProfesor`, `idMateria`) VALUES
(8, '2023-12-15 12:39:00', 13, 14, 15, 12, 5),
(9, '2023-12-13 11:15:00', 13, 14, 15, 12, 6),
(10, '2023-12-11 12:45:00', 13, 14, 15, 16, 4),
(11, '2024-01-08 09:00:00', 13, 14, 15, 11, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datoscontrato`
--

CREATE TABLE `datoscontrato` (
  `idDatosContrato` int(11) NOT NULL,
  `CV` varchar(45) NOT NULL,
  `Identificacion` varchar(45) NOT NULL,
  `CompDomicilio` varchar(45) NOT NULL,
  `TituloAcad` varchar(45) NOT NULL,
  `Cedula` varchar(45) NOT NULL,
  `ActaNaci` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datoscontrato`
--

INSERT INTO `datoscontrato` (`idDatosContrato`, `CV`, `Identificacion`, `CompDomicilio`, `TituloAcad`, `Cedula`, `ActaNaci`, `idUsuario`) VALUES
(1, 'CV.pdf', 'actaNacimiento.pdf', 'cedula.pdf', 'CV Adolfo Pinzón Salazar.pdf', 'CompDomicilio.pdf', 'INE.pdf', 11),
(3, 'CURP.pdf', 'CURP.pdf', 'CURP.pdf', 'CURP.pdf', 'CURP.pdf', 'CURP.pdf', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `idEncuesta` int(11) NOT NULL,
  `Pregunta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idEncuesta`, `Pregunta`) VALUES
(1, '¿Qué opinas del nuevo sistema?'),
(4, '¿La plataforma cumple con su expectativa?'),
(5, '¿Cree que el tiempo de respuesta es el optimo?'),
(6, '¿Cuál fue su experiencia en la clase?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guiaaplicacion`
--

CREATE TABLE `guiaaplicacion` (
  `idGuiaAplicacion` int(11) NOT NULL,
  `Tema` varchar(45) NOT NULL,
  `FechaApli` date NOT NULL,
  `Puntaje` double NOT NULL,
  `TotalPuntaje` double NOT NULL,
  `Observacion` text NOT NULL,
  `ObservacionGeneral` text NOT NULL,
  `Estatus` enum('Contratado','No Contratado') NOT NULL,
  `idCoordinador` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idGuiaObservacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guiaaplicacion`
--

INSERT INTO `guiaaplicacion` (`idGuiaAplicacion`, `Tema`, `FechaApli`, `Puntaje`, `TotalPuntaje`, `Observacion`, `ObservacionGeneral`, `Estatus`, `idCoordinador`, `idProfesor`, `idMateria`, `idGuiaObservacion`) VALUES
(282, 'POO', '2023-12-15', 5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 5),
(283, 'POO', '2023-12-15', 0, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 23),
(284, 'POO', '2023-12-15', 2.5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 24),
(285, 'POO', '2023-12-15', 2.5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 25),
(286, 'POO', '2023-12-15', 5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 26),
(287, 'POO', '2023-12-15', 5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 27),
(288, 'POO', '2023-12-15', 2.5, 92.5, 'xd', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 28),
(289, 'POO', '2023-12-15', 0, 92.5, 'xd2', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 35),
(290, 'POO', '2023-12-15', 5, 92.5, 'xd2', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 36),
(291, 'POO', '2023-12-15', 5, 92.5, 'xd2', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 37),
(292, 'POO', '2023-12-15', 0, 92.5, 'xd2', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 38),
(293, 'POO', '2023-12-15', 5, 92.5, 'xd2', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 39),
(294, 'POO', '2023-12-15', 10, 92.5, 'xd3', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 40),
(295, 'POO', '2023-12-15', 10, 92.5, 'xd3', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 41),
(296, 'POO', '2023-12-15', 10, 92.5, 'xd3', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 42),
(297, 'POO', '2023-12-15', 2.5, 92.5, 'xd3', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 43),
(298, 'POO', '2023-12-15', 2.5, 92.5, 'xd4', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 44),
(299, 'POO', '2023-12-15', 2.5, 92.5, 'xd4', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 45),
(300, 'POO', '2023-12-15', 0, 92.5, 'xd4', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 46),
(301, 'POO', '2023-12-15', 2.5, 92.5, 'xd4', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 47),
(302, 'POO', '2023-12-15', 2.5, 92.5, 'xd4', 'Utiliza herramientas para el desarrollo de la clase, clase muy completa.', 'Contratado', 13, 11, 5, 48),
(408, 'POO', '2023-12-15', 5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 5),
(409, 'POO', '2023-12-15', 0, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 23),
(410, 'POO', '2023-12-15', 2.5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 24),
(411, 'POO', '2023-12-15', 2.5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 25),
(412, 'POO', '2023-12-15', 5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 26),
(413, 'POO', '2023-12-15', 5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 27),
(414, 'POO', '2023-12-15', 2.5, 85, 'xd', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 28),
(415, 'POO', '2023-12-15', 0, 85, 'xd2', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 35),
(416, 'POO', '2023-12-15', 5, 85, 'xd2', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 36),
(417, 'POO', '2023-12-15', 5, 85, 'xd2', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 37),
(418, 'POO', '2023-12-15', 5, 85, 'xd2', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 38),
(419, 'POO', '2023-12-15', 0, 85, 'xd2', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 39),
(420, 'POO', '2023-12-15', 10, 85, 'xd3', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 40),
(421, 'POO', '2023-12-15', 10, 85, 'xd3', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 41),
(422, 'POO', '2023-12-15', 10, 85, 'xd3', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 42),
(423, 'POO', '2023-12-15', 2.5, 85, 'xd3', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 43),
(424, 'POO', '2023-12-15', 0, 85, 'xd4', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 44),
(425, 'POO', '2023-12-15', 2.5, 85, 'xd4', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 45),
(426, 'POO', '2023-12-15', 5, 85, 'xd4', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 46),
(427, 'POO', '2023-12-15', 2.5, 85, 'xd4', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 47),
(428, 'POO', '2023-12-15', 2.5, 85, 'xd4', 'Cumple con lo esencial', 'Contratado', 14, 11, 5, 48),
(429, 'POO', '2023-12-15', 5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 5),
(430, 'POO', '2023-12-15', 5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 23),
(431, 'POO', '2023-12-15', 2.5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 24),
(432, 'POO', '2023-12-15', 2.5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 25),
(433, 'POO', '2023-12-15', 5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 26),
(434, 'POO', '2023-12-15', 5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 27),
(435, 'POO', '2023-12-15', 2.5, 95, 'xd', 'Muy bien', 'Contratado', 15, 11, 5, 28),
(436, 'POO', '2023-12-15', 5, 95, 'xd2', 'Muy bien', 'Contratado', 15, 11, 5, 35),
(437, 'POO', '2023-12-15', 5, 95, 'xd2', 'Muy bien', 'Contratado', 15, 11, 5, 36),
(438, 'POO', '2023-12-15', 5, 95, 'xd2', 'Muy bien', 'Contratado', 15, 11, 5, 37),
(439, 'POO', '2023-12-15', 5, 95, 'xd2', 'Muy bien', 'Contratado', 15, 11, 5, 38),
(440, 'POO', '2023-12-15', 5, 95, 'xd2', 'Muy bien', 'Contratado', 15, 11, 5, 39),
(441, 'POO', '2023-12-15', 10, 95, 'xd3', 'Muy bien', 'Contratado', 15, 11, 5, 40),
(442, 'POO', '2023-12-15', 10, 95, 'xd3', 'Muy bien', 'Contratado', 15, 11, 5, 41),
(443, 'POO', '2023-12-15', 10, 95, 'xd3', 'Muy bien', 'Contratado', 15, 11, 5, 42),
(444, 'POO', '2023-12-15', 2.5, 95, 'xd3', 'Muy bien', 'Contratado', 15, 11, 5, 43),
(445, 'POO', '2023-12-15', 2.5, 95, 'xd4', 'Muy bien', 'Contratado', 15, 11, 5, 44),
(446, 'POO', '2023-12-15', 2.5, 95, 'xd4', 'Muy bien', 'Contratado', 15, 11, 5, 45),
(447, 'POO', '2023-12-15', 0, 95, 'xd4', 'Muy bien', 'Contratado', 15, 11, 5, 46),
(448, 'POO', '2023-12-15', 2.5, 95, 'xd4', 'Muy bien', 'Contratado', 15, 11, 5, 47),
(449, 'POO', '2023-12-15', 2.5, 95, 'xd4', 'Muy bien', 'Contratado', 15, 11, 5, 48),
(450, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 5),
(451, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 23),
(452, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 24),
(453, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 25),
(454, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 26),
(455, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 27),
(456, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 28),
(457, 'Programación del lado del servidor', '2023-12-13', 5, 6.5, 'xd2', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 35),
(458, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd2', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 36),
(459, 'Programación del lado del servidor', '2023-12-13', 5, 6.5, 'xd2', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 37),
(460, 'Programación del lado del servidor', '2023-12-13', 5, 6.5, 'xd2', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 38),
(461, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd2', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 39),
(462, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd3', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 40),
(463, 'Programación del lado del servidor', '2023-12-13', 10, 6.5, 'xd3', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 41),
(464, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd3', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 42),
(465, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd3', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 43),
(466, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.5, 'xd4', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 44),
(467, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.5, 'xd4', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 45),
(468, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd4', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 46),
(469, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd4', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 47),
(470, 'Programación del lado del servidor', '2023-12-13', 0, 6.5, 'xd4', 'Hacen falta abarcar varios puntos', 'No Contratado', 13, 12, 6, 48),
(471, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 5),
(472, 'Programación del lado del servidor', '2023-12-13', 5, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 23),
(473, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 24),
(474, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 25),
(475, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 26),
(476, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 27),
(477, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.9, 'xd', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 28),
(478, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd2', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 35),
(479, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd2', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 36),
(480, 'Programación del lado del servidor', '2023-12-13', 5, 6.9, 'xd2', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 37),
(481, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd2', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 38),
(482, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd2', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 39),
(483, 'Programación del lado del servidor', '2023-12-13', 10, 6.9, 'xd3', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 40),
(484, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd3', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 41),
(485, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd3', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 42),
(486, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd3', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 43),
(487, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.9, 'xd4', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 44),
(488, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd4', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 45),
(489, 'Programación del lado del servidor', '2023-12-13', 5, 6.9, 'xd4', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 46),
(490, 'Programación del lado del servidor', '2023-12-13', 0, 6.9, 'xd4', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 47),
(491, 'Programación del lado del servidor', '2023-12-13', 2.5, 6.9, 'xd4', 'Muchas áreas para mejorar', 'No Contratado', 15, 12, 6, 48),
(492, 'Programación del lado del servidor', '2023-12-13', 5, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 5),
(493, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 23),
(494, 'Programación del lado del servidor', '2023-12-13', 2.5, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 24),
(495, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 25),
(496, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 26),
(497, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 27),
(498, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 28),
(499, 'Programación del lado del servidor', '2023-12-13', 5, 5.6, 'xd2', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 35),
(500, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd2', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 36),
(501, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd2', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 37),
(502, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd2', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 38),
(503, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd2', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 39),
(504, 'Programación del lado del servidor', '2023-12-13', 10, 5.6, 'xd3', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 40),
(505, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd3', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 41),
(506, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd3', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 42),
(507, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd3', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 43),
(508, 'Programación del lado del servidor', '2023-12-13', 2.5, 5.6, 'xd4', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 44),
(509, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd4', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 45),
(510, 'Programación del lado del servidor', '2023-12-13', 5, 5.6, 'xd4', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 46),
(511, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd4', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 47),
(512, 'Programación del lado del servidor', '2023-12-13', 0, 5.6, 'xd4', 'Mejorar en diferentes aceptos al dar la clase', 'No Contratado', 14, 12, 6, 48),
(513, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 5),
(514, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 23),
(515, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 24),
(516, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 25),
(517, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 26),
(518, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 27),
(519, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd', 'Muy bien', 'Contratado', 13, 16, 4, 28),
(520, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd2', 'Muy bien', 'Contratado', 13, 16, 4, 35),
(521, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd2', 'Muy bien', 'Contratado', 13, 16, 4, 36),
(522, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd2', 'Muy bien', 'Contratado', 13, 16, 4, 37),
(523, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd2', 'Muy bien', 'Contratado', 13, 16, 4, 38),
(524, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd2', 'Muy bien', 'Contratado', 13, 16, 4, 39),
(525, 'Internet de las cosas', '2023-12-11', 10, 98.5, 'xd3', 'Muy bien', 'Contratado', 13, 16, 4, 40),
(526, 'Internet de las cosas', '2023-12-11', 10, 98.5, 'xd3', 'Muy bien', 'Contratado', 13, 16, 4, 41),
(527, 'Internet de las cosas', '2023-12-11', 10, 98.5, 'xd3', 'Muy bien', 'Contratado', 13, 16, 4, 42),
(528, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd3', 'Muy bien', 'Contratado', 13, 16, 4, 43),
(529, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd4', 'Muy bien', 'Contratado', 13, 16, 4, 44),
(530, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd4', 'Muy bien', 'Contratado', 13, 16, 4, 45),
(531, 'Internet de las cosas', '2023-12-11', 5, 98.5, 'xd4', 'Muy bien', 'Contratado', 13, 16, 4, 46),
(532, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd4', 'Muy bien', 'Contratado', 13, 16, 4, 47),
(533, 'Internet de las cosas', '2023-12-11', 2.5, 98.5, 'xd4', 'Muy bien', 'Contratado', 13, 16, 4, 48),
(534, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 5),
(535, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 23),
(536, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 24),
(537, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 25),
(538, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 26),
(539, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 27),
(540, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd', 'Excelente', 'Contratado', 15, 16, 4, 28),
(541, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd2', 'Excelente', 'Contratado', 15, 16, 4, 35),
(542, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd2', 'Excelente', 'Contratado', 15, 16, 4, 36),
(543, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd2', 'Excelente', 'Contratado', 15, 16, 4, 37),
(544, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd2', 'Excelente', 'Contratado', 15, 16, 4, 38),
(545, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd2', 'Excelente', 'Contratado', 15, 16, 4, 39),
(546, 'Internet de las cosas', '2023-12-11', 10, 100, 'xd3', 'Excelente', 'Contratado', 15, 16, 4, 40),
(547, 'Internet de las cosas', '2023-12-11', 10, 100, 'xd3', 'Excelente', 'Contratado', 15, 16, 4, 41),
(548, 'Internet de las cosas', '2023-12-11', 10, 100, 'xd3', 'Excelente', 'Contratado', 15, 16, 4, 42),
(549, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd3', 'Excelente', 'Contratado', 15, 16, 4, 43),
(550, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd4', 'Excelente', 'Contratado', 15, 16, 4, 44),
(551, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd4', 'Excelente', 'Contratado', 15, 16, 4, 45),
(552, 'Internet de las cosas', '2023-12-11', 5, 100, 'xd4', 'Excelente', 'Contratado', 15, 16, 4, 46),
(553, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd4', 'Excelente', 'Contratado', 15, 16, 4, 47),
(554, 'Internet de las cosas', '2023-12-11', 2.5, 100, 'xd4', 'Excelente', 'Contratado', 15, 16, 4, 48),
(555, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 5),
(556, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 23),
(557, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 24),
(558, 'Internet de las cosas', '2023-12-11', 0, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 25),
(559, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 26),
(560, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 27),
(561, 'Internet de las cosas', '2023-12-11', 0, 95, 'xd', 'Bien', 'Contratado', 14, 16, 4, 28),
(562, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd2', 'Bien', 'Contratado', 14, 16, 4, 35),
(563, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd2', 'Bien', 'Contratado', 14, 16, 4, 36),
(564, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd2', 'Bien', 'Contratado', 14, 16, 4, 37),
(565, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd2', 'Bien', 'Contratado', 14, 16, 4, 38),
(566, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd2', 'Bien', 'Contratado', 14, 16, 4, 39),
(567, 'Internet de las cosas', '2023-12-11', 10, 95, 'xd3', 'Bien', 'Contratado', 14, 16, 4, 40),
(568, 'Internet de las cosas', '2023-12-11', 10, 95, 'xd3', 'Bien', 'Contratado', 14, 16, 4, 41),
(569, 'Internet de las cosas', '2023-12-11', 10, 95, 'xd3', 'Bien', 'Contratado', 14, 16, 4, 42),
(570, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd3', 'Bien', 'Contratado', 14, 16, 4, 43),
(571, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd4', 'Bien', 'Contratado', 14, 16, 4, 44),
(572, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd4', 'Bien', 'Contratado', 14, 16, 4, 45),
(573, 'Internet de las cosas', '2023-12-11', 5, 95, 'xd4', 'Bien', 'Contratado', 14, 16, 4, 46),
(574, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd4', 'Bien', 'Contratado', 14, 16, 4, 47),
(575, 'Internet de las cosas', '2023-12-11', 2.5, 95, 'xd4', 'Bien', 'Contratado', 14, 16, 4, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guiaobservacion`
--

CREATE TABLE `guiaobservacion` (
  `idGuiaObservacion` int(11) NOT NULL,
  `Rubro` text NOT NULL,
  `Porcentaje` double NOT NULL,
  `FechaGuia` date NOT NULL,
  `TipoRubro` enum('Apertura y cierre','Participación','Técnica','Desempeño') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guiaobservacion`
--

INSERT INTO `guiaobservacion` (`idGuiaObservacion`, `Rubro`, `Porcentaje`, `FechaGuia`, `TipoRubro`) VALUES
(5, 'Presenta el objetivo del tema.', 5, '2023-09-23', 'Apertura y cierre'),
(23, 'Ubica el tema dentro del módulo y muestra las relaciones que existen con otros temas y/o materias', 5, '2023-11-16', 'Apertura y cierre'),
(24, 'Explica los beneficios y/o aplicaciones en donde tiene impacto el tema', 2.5, '2023-11-16', 'Apertura y cierre'),
(25, 'Utiliza el equipo didáctico de manera adecuada ', 2.5, '2023-11-16', 'Apertura y cierre'),
(26, 'Realiza el cierre del tema o clase resumiendo y mencionando los logros alcanzados', 5, '2023-11-16', 'Apertura y cierre'),
(27, 'Sugiere acciones para reafirmar el aprendizaje', 5, '2023-11-16', 'Apertura y cierre'),
(28, 'Proporciona una breve introducción al siguiente tema', 2.5, '2023-11-16', 'Apertura y cierre'),
(35, 'Realiza una exploración de conocimientos previos', 5, '2023-11-16', 'Participación'),
(36, 'Verifica la compresión de contenidos', 5, '2023-11-16', 'Participación'),
(37, 'Comparte su experiencia concentrándose en el tema', 5, '2023-11-16', 'Participación'),
(38, 'Responde las preguntas enfocando sus comentarios en el tema', 5, '2023-11-16', 'Participación'),
(39, 'Transmite sus ideas de forma clara y concreta', 5, '2023-11-16', 'Participación'),
(40, 'Expositiva. No se limita a una simple lectura de contenidos', 10, '2023-11-16', 'Técnica'),
(41, 'Demostrativa', 10, '2023-11-16', 'Técnica'),
(42, 'Proporciona ejemplos y/o ejercicios', 10, '2023-11-16', 'Técnica'),
(43, 'Se adecua al tipo de grupo, generando un ambiente adecuado para el aprendizaje', 2.5, '2023-11-16', 'Técnica'),
(44, 'La estructura de la clase fue adecuada ', 2.5, '2023-11-16', 'Desempeño'),
(45, 'Contacto visual con todo el grupo', 2.5, '2023-11-16', 'Desempeño'),
(46, 'Mantiene una postura dinámica en el aula', 5, '2023-11-16', 'Desempeño'),
(47, 'Nivel de voz adecuado y cambios en el volumen de voz', 2.5, '2023-11-16', 'Desempeño'),
(48, 'Capacidad de adaptación a imprevistos', 2.5, '2023-11-16', 'Desempeño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `NombreM` varchar(45) NOT NULL,
  `TipoCurso` varchar(45) NOT NULL,
  `Eje` varchar(45) NOT NULL,
  `HorasTotal` double NOT NULL,
  `Nivel` enum('Introductorio','Medio','Avanzado') NOT NULL,
  `Cuatrimestre` int(11) NOT NULL,
  `EstatusM` enum('Activo','Inactivo') NOT NULL,
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `Clave`, `NombreM`, `TipoCurso`, `Eje`, `HorasTotal`, `Nivel`, `Cuatrimestre`, `EstatusM`, `idAcademia`) VALUES
(4, 'ITI-1-O', 'Internet de las cosas', 'Obligatorio', 'Ciencias básicas', 50, 'Introductorio', 1, 'Activo', 3),
(5, 'ITI-2-I', 'POO', 'Obligatorio', 'Ciencias de la ingeniería', 60, 'Avanzado', 5, 'Activo', 5),
(6, 'ITI-6-P', 'Programación web', 'Obligatorio', 'Ciencias de la ingeniería', 40, 'Medio', 7, 'Activo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idRespuesta` int(11) NOT NULL,
  `Respuesta` enum('Muy malo','Malo','Regular','Bueno','Excelente') NOT NULL,
  `idEncuesta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idRespuesta`, `Respuesta`, `idEncuesta`, `idUsuario`) VALUES
(5, 'Bueno', 1, 11),
(6, 'Excelente', 4, 11),
(7, 'Bueno', 5, 11),
(8, 'Excelente', 6, 11),
(9, 'Excelente', 1, 16),
(10, 'Bueno', 4, 16),
(11, 'Regular', 5, 16),
(12, 'Malo', 6, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `ApellidoP` varchar(45) NOT NULL,
  `ApellidoM` varchar(45) DEFAULT NULL,
  `FechaNac` date NOT NULL,
  `GradoA` enum('Licenciatura','Maestría','Doctorado') NOT NULL,
  `ProgramaE` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Firma` varchar(100) DEFAULT NULL,
  `Cargo` enum('Profesor de Tiempo Completo','Profesor','NO APLICA') DEFAULT NULL,
  `TipoUsuario` enum('Administrador','Coordinador','Profesor') NOT NULL,
  `fotoperfil` text NOT NULL DEFAULT 'perfil.png',
  `idAcademia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `ApellidoP`, `ApellidoM`, `FechaNac`, `GradoA`, `ProgramaE`, `Correo`, `Contrasena`, `Firma`, `Cargo`, `TipoUsuario`, `fotoperfil`, `idAcademia`) VALUES
(10, 'Alberto', 'Gutiérrez', 'Sevilla', '2000-05-30', 'Doctorado', 'ITI', 'betowsky30@gmail.com', 'PPdEm7TG', '', 'NO APLICA', 'Administrador', 'perfil.png', 1),
(11, 'José Luis', 'Mendez', NULL, '1993-12-23', 'Maestría', 'ITI', 'jose@gmail.com', '123', 'firma1.png', 'Profesor', 'Profesor', 'gestionAcademia.jpg', 1),
(12, 'Lourdes', 'Hernández', NULL, '1995-12-14', 'Doctorado', 'ITI', 'lulu@gmail.com', '123', 'firma2.png', 'NO APLICA', 'Profesor', 'perfil.png', 1),
(13, 'Sandra ', 'León', 'Sosa', '1995-07-19', 'Doctorado', 'ITI', 'lsosa@gmail.com', '123', 'firma3.png', 'Profesor de Tiempo Completo', 'Coordinador', 'perfil.png', 3),
(14, 'Miguel Ángel', 'Ruiz', 'Jaimes', '1993-12-17', 'Doctorado', 'ITI', 'ruiz@gmail.com', '123', 'firma4.png', 'Profesor de Tiempo Completo', 'Coordinador', 'perfil.png', 5),
(15, 'José', 'Zagal', NULL, '1997-05-06', 'Licenciatura', 'ITI', 'zagal@gmail.com', '123', 'firma5.png', 'Profesor', 'Coordinador', 'perfil.png', 2),
(16, 'Dulce', 'Hernández', '', '2002-03-11', 'Maestría', 'ITI', 'dulce@gmail.com', '123', 'firma.png', 'NO APLICA', 'Profesor', 'perfil.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academia`
--
ALTER TABLE `academia`
  ADD PRIMARY KEY (`idAcademia`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `FK_AgendaCoo` (`idCoordinador`),
  ADD KEY `FK_AgendaPro` (`idProfesor`),
  ADD KEY `FK_AgendaMat` (`idMateria`),
  ADD KEY `FK_AgendaCoo2` (`idCoordinador2`),
  ADD KEY `FK_AgendaCoo3` (`idCoordinador3`);

--
-- Indices de la tabla `datoscontrato`
--
ALTER TABLE `datoscontrato`
  ADD PRIMARY KEY (`idDatosContrato`),
  ADD KEY `FK_Guia_idx` (`idUsuario`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idEncuesta`);

--
-- Indices de la tabla `guiaaplicacion`
--
ALTER TABLE `guiaaplicacion`
  ADD PRIMARY KEY (`idGuiaAplicacion`),
  ADD KEY `FK_Coordinador_idx` (`idCoordinador`),
  ADD KEY `FK_Profesor_idx` (`idProfesor`),
  ADD KEY `FK_Materia_idx` (`idMateria`),
  ADD KEY `FK_Rubro_idx` (`idGuiaObservacion`);

--
-- Indices de la tabla `guiaobservacion`
--
ALTER TABLE `guiaobservacion`
  ADD PRIMARY KEY (`idGuiaObservacion`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`),
  ADD KEY `FK_AcaMat_idx` (`idAcademia`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idRespuesta`),
  ADD KEY `FK_idEncuesta_idx` (`idEncuesta`),
  ADD KEY `FK_UsuarioEncuesta` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `FK_Academia_idx` (`idAcademia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academia`
--
ALTER TABLE `academia`
  MODIFY `idAcademia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `datoscontrato`
--
ALTER TABLE `datoscontrato`
  MODIFY `idDatosContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idEncuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `guiaaplicacion`
--
ALTER TABLE `guiaaplicacion`
  MODIFY `idGuiaAplicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT de la tabla `guiaobservacion`
--
ALTER TABLE `guiaobservacion`
  MODIFY `idGuiaObservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `FK_AgendaCoo` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AgendaCoo2` FOREIGN KEY (`idCoordinador2`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `FK_AgendaCoo3` FOREIGN KEY (`idCoordinador3`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `FK_AgendaMat` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AgendaPro` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datoscontrato`
--
ALTER TABLE `datoscontrato`
  ADD CONSTRAINT `FK_UsuarioDocs` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `guiaaplicacion`
--
ALTER TABLE `guiaaplicacion`
  ADD CONSTRAINT `FK_Coordinador` FOREIGN KEY (`idCoordinador`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Materia` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Profesor` FOREIGN KEY (`idProfesor`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Rubro` FOREIGN KEY (`idGuiaObservacion`) REFERENCES `guiaobservacion` (`idGuiaObservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `FK_AcaMat` FOREIGN KEY (`idAcademia`) REFERENCES `academia` (`idAcademia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `FK_UsuarioEncuesta` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idEncuesta` FOREIGN KEY (`idEncuesta`) REFERENCES `encuesta` (`idEncuesta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Academia` FOREIGN KEY (`idAcademia`) REFERENCES `academia` (`idAcademia`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
