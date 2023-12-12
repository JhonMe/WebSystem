-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2023 a las 17:41:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senati`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admistrativo`
--

CREATE TABLE `admistrativo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(155) NOT NULL,
  `apellido` varchar(155) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_entrega_epps` date DEFAULT NULL,
  `terno_cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admistrativo`
--

INSERT INTO `admistrativo` (`id`, `nombre`, `apellido`, `fecha_ingreso`, `fecha_entrega_epps`, `terno_cantidad`) VALUES
(19, 'Jeffre', 'espinoza', '2023-11-08', '2023-11-09', 2),
(20, 'Jhon', 'Cruz', '2023-11-04', '2023-12-20', 4),
(23, 'Noe', 'mendoza', '2023-11-10', '2023-12-02', 4),
(24, 'Drianklin', 'Requena', '2023-12-16', '2023-12-22', 6),
(25, 'David', 'Rojas', '2023-12-17', '2023-12-22', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_entrega_epps` date DEFAULT NULL,
  `talla_guardapolvo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `nombre`, `apellido`, `fecha_ingreso`, `fecha_entrega_epps`, `talla_guardapolvo`) VALUES
(1, 'josue', 'mendoza', '2023-11-30', '2023-11-30', 'S'),
(6, 'Jhoana', 'Cruz', '2023-11-11', '2023-12-10', 'M'),
(13, 'Patrick', 'Casadlo', '2023-12-06', '2023-12-22', 'S'),
(14, 'Macarena', 'Montoya', '2023-11-27', '2023-12-06', 'XM'),
(15, 'Vale', 'Valdivia', '2023-12-13', '2023-12-09', 'M'),
(16, 'Jhonna', 'Medina', '2023-12-10', '2023-12-15', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_entrega_epps` date DEFAULT NULL,
  `guantes_entrega` int(11) DEFAULT NULL,
  `mascarilla_entrega` int(11) DEFAULT NULL,
  `talla_zapato` int(11) DEFAULT NULL,
  `talla_pantalon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `nombre`, `apellido`, `fecha_ingreso`, `fecha_entrega_epps`, `guantes_entrega`, `mascarilla_entrega`, `talla_zapato`, `talla_pantalon`) VALUES
(10, 'Jhoann', 'mendoza', '2023-11-15', '2023-11-24', 4, 3, 55, 30),
(11, 'Miguel E', 'espinoza ', '2023-11-28', '2023-12-31', 4, 3, 22, 28),
(13, 'certificación', 'Cruz', '2023-11-18', '2023-12-15', 6, 4, 39, 40),
(14, 'Manuel', 'Vadillo', '2023-12-15', '2023-12-09', 2, 1, 23, 28),
(15, 'Daniel', 'Vasques', '2023-12-16', '2023-12-09', 3, 2, 30, 29),
(16, 'Martin', 'Navarro', '2023-12-07', '2023-12-12', 2, 1, 40, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `cargo` enum('Supervisor','Administrador') NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `cargo`, `contrasena`) VALUES
(1, 'Jhonny', 'mendoza', 'jhon@gmail.com', 'Supervisor', '$2y$10$Cd/0Yr786UKl9oCiEc9Pnu3nVauwvOIoLgZPJGgDZmn'),
(2, 'Jhon', 'espinoza', 'jhonny@gmail.com', 'Administrador', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admistrativo`
--
ALTER TABLE `admistrativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admistrativo`
--
ALTER TABLE `admistrativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
