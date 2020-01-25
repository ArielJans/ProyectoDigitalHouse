-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2020 a las 18:31:47
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `game`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `id_respuestas` int(11) DEFAULT NULL,
  `administradores_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `premios` varchar(45) DEFAULT NULL,
  `puntos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `respuestaC` varchar(45) NOT NULL,
  `respuesta1I` varchar(45) NOT NULL,
  `respuesta2I` varchar(45) NOT NULL,
  `tablero_id` int(11) NOT NULL,
  `perguntas_id` int(11) NOT NULL,
  `perguntas_administradores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablero`
--

CREATE TABLE `tablero` (
  `id` int(11) NOT NULL,
  `coordenadaY` varchar(45) NOT NULL,
  `coordenadaX` varchar(45) NOT NULL,
  `id_respuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `jugador` varchar(45) NOT NULL,
  `administrador` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `puntaje` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `user_pic` varchar(100) NOT NULL,
  `premios_id` int(11),
  `ranking_id` int(11),
  `tipo_id` int(11),
  `tipo_id1` int(11),
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`,`administradores_id`,`tipo_id`),
  ADD KEY `fk_perguntas_tipo1_idx` (`tipo_id`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`,`tablero_id`,`perguntas_id`,`perguntas_administradores_id`),
  ADD KEY `fk_respuestas_tablero1_idx` (`tablero_id`),
  ADD KEY `fk_respuestas_perguntas1_idx` (`perguntas_id`,`perguntas_administradores_id`);

--
-- Indices de la tabla `tablero`
--
ALTER TABLE `tablero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`premios_id`,`ranking_id`,`tipo_id`,`tipo_id1`),
  ADD KEY `fk_usuarios_premios1_idx` (`premios_id`),
  ADD KEY `fk_usuarios_ranking1_idx` (`ranking_id`),
  ADD KEY `fk_usuarios_tipo1_idx` (`tipo_id1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tablero`
--
ALTER TABLE `tablero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `fk_perguntas_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_respuestas_perguntas1` FOREIGN KEY (`perguntas_id`,`perguntas_administradores_id`) REFERENCES `perguntas` (`id`, `administradores_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_respuestas_tablero1` FOREIGN KEY (`tablero_id`) REFERENCES `tablero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuarios_premios1` FOREIGN KEY (`premios_id`) REFERENCES `premios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_ranking1` FOREIGN KEY (`ranking_id`) REFERENCES `ranking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_tipo1` FOREIGN KEY (`tipo_id1`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
