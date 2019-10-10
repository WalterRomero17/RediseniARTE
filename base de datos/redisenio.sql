-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2019 a las 17:48:14
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redisenio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` smallint(6) NOT NULL,
  `categoria_descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_descripcion`) VALUES
(1, 'Terror'),
(2, 'Anime'),
(3, 'Ciencia Ficción'),
(4, 'SteamPunk'),
(5, 'Caricatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `usuario_id` smallint(6) NOT NULL,
  `publicacion_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`usuario_id`, `publicacion_id`) VALUES
(1, 3),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseniador`
--

CREATE TABLE `diseniador` (
  `diseniador_id` smallint(6) NOT NULL,
  `diseniador_descripcion` varchar(200) NOT NULL,
  `diseniador_titulo` varchar(20) NOT NULL,
  `diseniador_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diseniador`
--

INSERT INTO `diseniador` (`diseniador_id`, `diseniador_descripcion`, `diseniador_titulo`, `diseniador_img`) VALUES
(1, 'Especialista en Terror y Ciencia Ficción.', 'Comics', 'alan.jpg'),
(4, 'Diseñadora Gráfica de la UBA. Especialista en animación.', 'Animación', 'team2.jpg'),
(6, 'Escecialista en terror y estilo caricaturesco.', 'Comics', 'jhonen.jpg'),
(7, 'Diseñador especializada en animación.', 'Backgrouns', 'team3.jpg'),
(9, 'Especialista en comics, orientados la ciencia ficción', 'Comics', 'team1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `publicacion_id` smallint(6) NOT NULL,
  `usuario_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`publicacion_id`, `usuario_id`) VALUES
(1, 3),
(2, 2),
(3, 2),
(3, 3),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `grupo_id` smallint(6) NOT NULL,
  `grupo_descripcion` varchar(20) NOT NULL,
  `grupo_imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`grupo_id`, `grupo_descripcion`, `grupo_imagen`) VALUES
(1, 'Diseño de Personajes', 'personajes.jpg'),
(2, 'Diseño de Fondos', 'fondos.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `publicacion_id` smallint(6) NOT NULL,
  `publicacion_titulo` varchar(50) NOT NULL,
  `publicacion_imagen` varchar(200) NOT NULL,
  `diseniador_id` smallint(6) NOT NULL,
  `publicacion_descripcion` varchar(200) NOT NULL,
  `grupo_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`publicacion_id`, `publicacion_titulo`, `publicacion_imagen`, `diseniador_id`, `publicacion_descripcion`, `grupo_id`) VALUES
(1, 'Robot de la resistencia', 'robo_resistence.jpg', 1, 'En una obra distopica, el robot funciona como componente vital para los rebeldes.', 1),
(2, 'Soldado Fantasma', 'soldier_ghost.jpg', 1, 'Un solado entrenado para el sigilo.', 1),
(3, 'Ciudad Futurista', 'city_future.jpg', 4, 'Ciudad de un futura sociedad vigilada por el gobierno.', 2),
(4, 'Desierto', 'sand.jpg', 4, 'Desierto esteril, perfecto para aventura en medio oriente.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_categoria`
--

CREATE TABLE `publicacion_categoria` (
  `publicacion_id` smallint(6) NOT NULL,
  `categoria_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion_categoria`
--

INSERT INTO `publicacion_categoria` (`publicacion_id`, `categoria_id`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` smallint(6) NOT NULL,
  `usuario_nombre` varchar(20) NOT NULL,
  `usuario_apellido` varchar(20) NOT NULL,
  `usuario_mail` varchar(200) NOT NULL,
  `usuario_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_mail`, `usuario_password`) VALUES
(1, 'Walter ', 'Romero', 'w.@gmail.com', '1234'),
(2, 'Fernando', 'Gonzalez', 'f.gon@gmail', '4321'),
(3, 'Heraldo', 'Perez', 'heral2@gmail.com', '2345'),
(4, 'Priscila', 'Lopez', 'pri91@gmail', '5432'),
(5, 'Alan', 'moore', 'al@gmail.com', '1452'),
(6, 'Jhonen', 'Vazquez', 'jeyv@gmail.com', '4321'),
(7, 'Pedro', 'Gomez', 'gomez94@gmail.com', '7221'),
(8, 'Martin', 'Pilori', 'martincito@gmail.com', '85612df'),
(9, 'Linda', 'Kim', 'ki@gmail.com', '1234'),
(10, 'Gabriel', 'Gonzalez', 'gg@gmail.com', '4321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`usuario_id`,`publicacion_id`),
  ADD KEY `publicacion_id` (`publicacion_id`);

--
-- Indices de la tabla `diseniador`
--
ALTER TABLE `diseniador`
  ADD PRIMARY KEY (`diseniador_id`),
  ADD UNIQUE KEY `diseñador_id` (`diseniador_id`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`publicacion_id`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`grupo_id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`publicacion_id`),
  ADD KEY `publicacion_categoria` (`diseniador_id`,`grupo_id`),
  ADD KEY `grupo_id` (`grupo_id`);

--
-- Indices de la tabla `publicacion_categoria`
--
ALTER TABLE `publicacion_categoria`
  ADD PRIMARY KEY (`publicacion_id`,`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `usuario_mail` (`usuario_mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `grupo_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `publicacion_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`publicacion_id`) REFERENCES `publicacion` (`publicacion_id`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `diseniador`
--
ALTER TABLE `diseniador`
  ADD CONSTRAINT `diseniador_ibfk_1` FOREIGN KEY (`diseniador_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`publicacion_id`) REFERENCES `publicacion` (`publicacion_id`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_3` FOREIGN KEY (`diseniador_id`) REFERENCES `diseniador` (`diseniador_id`),
  ADD CONSTRAINT `publicacion_ibfk_4` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`);

--
-- Filtros para la tabla `publicacion_categoria`
--
ALTER TABLE `publicacion_categoria`
  ADD CONSTRAINT `publicacion_categoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `publicacion_categoria_ibfk_2` FOREIGN KEY (`publicacion_id`) REFERENCES `publicacion` (`publicacion_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
