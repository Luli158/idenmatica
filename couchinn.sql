-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 21:12:47
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `puntuacion` int(3) NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(3) NOT NULL,
  `idcouch` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `fecha`, `puntuacion`, `comentario`, `idusuario`, `idcouch`) VALUES
(15, '2016-07-09', 3, 'genial', 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE `couch` (
  `idcouch` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `canthabitantes` int(11) NOT NULL,
  `cantpersonas` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `despublicado` tinyint(1) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `idtipo` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`idcouch`, `fecha`, `titulo`, `descripcion`, `ubicacion`, `canthabitantes`, `cantpersonas`, `despublicado`, `idusuario`, `idtipo`) VALUES
(1, '2016-06-24', 'Habitacion privada en Botafogo', '""HabitaciÃ³n doble-cama en una cabaghrnbt de familia. Vas a disponer de aire acondicionado, baÃ±o exclusivo y WiFi. TambiÃ©n en las zonas comunes que tiene una sala de estar con TV, balcÃ³n y cocina a su disposiciÃ³n. No se permiten mascotas en el hogar.""', 'RÃ­o de Janeiro, Brasil', 28, '2', 0, 1, 1),
(2, '2016-06-24', 'Penthouse estudio FREE WIFI', 'Es un cÃ³modo penthouse en el 7mo piso de un edificio muy tranquilo. Esta ubicado a una cuadra de la plaza Matriz, a dos de plaza Independencia.\r\nEn pleno corazÃ³n de Ciudad Vieja.', 'Montevideo, Uruguay', 3, '1', 0, 1, 4),
(3, '2016-06-24', 'Gran habitacion cerca de la playa!', 'El estudio estÃ¡ ubicado en Pocitos, una hermosa y fresca barrio y menos de 200 mts. desde el lado del mar. Usted serÃ¡ capaz de caminar y disfrutar de la hermosa "rambla" de Montevideo y restaurante y cafeterÃ­as tambiÃ©n. Perfecto para su estancia !!! El estudio se encuentra a menos de 200 mts. Del lado del mar por lo que podrÃ¡ pasear y disfrutar de la hermosa "rambla" de Montevideo. ', 'Montevideo, Uruguay', 2, '2', 0, 2, 4),
(4, '2016-06-24', 'Edificio nuevo, hermosa vista! ', 'Una sala de apartamento cerca del centro de Santiago. Se encuentra a sÃ³lo 10 minutos a pie de la zona de Lastarria y Bellas Artes, donde encontrarÃ¡ buenos restaurantes, museos y divertido. Dos opciones de la estaciÃ³n de metro y 3 paradas de la Plaza de Armas de la solera de la ciudad.', 'Santiago, RegiÃ³n Metropolitana, Chile', 4, '2', 0, 2, 4),
(12, '2016-06-24', 'kfjdaskf', 'kgfjsdkgfj', 'gksdjg', 2, '3', 0, 4, 1),
(13, '2016-06-24', 'Casa Jeffry By Cafayate Holiday', 'Hola amigos...bienvenidos a mi casa de huespedes, este es un lugar privado ideal para tu familia o grupo de amigos...los espero ;)', 'Calafate, Salta', 2, '3', 0, 4, 1),
(14, '2016-06-24', 'La Caseros Guest House', 'Hola amigos...bienvenidos a mi casa de huespedes, este es un lugar privado ideal para tu familia o grupo de amigos...los espero ;)', 'Salta, Argentina', 1, '3', 0, 4, 1),
(15, '2016-06-24', 'Al lado del metro ... vas a cualquier parte!', 'Mi espacio esta cerca del transporte publico, el aeropuerto, parques, centro de la ciudad y el arte y la cultura o de negocios.', 'Sao Paulo, Brasil', 1, '2', 0, 2, 1),
(16, '2016-06-24', 'Verde y Nieve, Centro de esqui', 'Desde el salon y la habitacion podran disfrutar de las vistas sobre las pistas de esqui. \r\nLa habitacion principal cuenta con una cama King-size. La cocina-comedor, en desnivel con el living, cuenta con todo el equipamiento necesario. El sofa-cama del living se transforma en dos camas individuales. ', 'San Carlos De Bariloche, RiÂ­o Negro, Argentina', 1, '4', 0, 3, 2),
(17, '2016-06-24', 'Tranquilidad frente al lago Morenito', 'Cabania de madera, frente al tranquilo Morenito. \r\n4 cuartos y 3 banios, 2 en suite. 10 camas.\r\nLiving para chicos arriba.\r\nChimenea y lea incluida.', 'San Carlos De Bariloche, RiÂ­o Negro, Argentina', 2, '5', 0, 3, 2),
(18, '2016-06-24', 'CabaÃ±a sobre Lago Mascardi.', 'Nuestra propiedad estÃƒÂ¡ sobre el lago Mascardi.\r\nPosee costa de lago y un aÃƒÂ±oso bosque de pinos y coihues q la rodean.\r\nLa vista al lago desde el jardÃƒÂ­n de la casa es privilegiada.\r\nEstÃƒÂ¡ ubicada en la entrada del camino al Cerro tronador es ideal para el descanso, la pesca , el trekking, canotaje, avistaje de aves y ski en invierno.', 'Bariloche, RÃ­o Negro, Argentina', 3, '3', 0, 3, 2),
(19, '2016-07-09', 'fghdh', 'dhdhdf', 'dhdfh', 4, '23', 0, 1, 1),
(20, '2016-07-09', 'gfsdg', 'egrg', 'grege', 3, '2', 0, 1, 1),
(21, '2016-07-09', 'jjr', 'rturtu', 'urturt', 5, '4', 0, 1, 1),
(22, '2016-07-09', 'jfjf', 'jrtjtr', 'jtrj', 5, '2', 0, 1, 1),
(23, '2016-07-09', 'dhhdfh', 'gdgdrfg', 'ttgrt', 3, '4', 0, 1, 1),
(24, '2016-07-11', 'gfsdgs', 'gsdfgsd', 'sgsdg', 3, '2', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hacecomentario`
--

CREATE TABLE `hacecomentario` (
  `idhacecomentario` int(3) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `idusuario2` int(3) NOT NULL,
  `comentario` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `puntuacion` int(3) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hacecomentario`
--

INSERT INTO `hacecomentario` (`idhacecomentario`, `idusuario`, `idusuario2`, `comentario`, `puntuacion`, `fecha`) VALUES
(3, 1, 13, 'excelente ', 5, '2016-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenescouches`
--

CREATE TABLE `imagenescouches` (
  `idimagenescouches` int(11) NOT NULL,
  `idcouch` int(11) NOT NULL,
  `rutaimagen` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenescouches`
--

INSERT INTO `imagenescouches` (`idimagenescouches`, `idcouch`, `rutaimagen`) VALUES
(11, 1, 'imagenes/14/couch1-1.jpg'),
(12, 1, 'imagenes/14/couch1-2.jpg'),
(13, 1, 'imagenes/14/couch1-3.jpg'),
(14, 1, 'imagenes/15/couch2-1.jpg'),
(15, 1, 'imagenes/15/couch2-2.jpg'),
(16, 1, 'imagenes/15/couch2-3.jpg'),
(17, 1, 'imagenes/15/couch2-4.jpg'),
(18, 2, 'imagenes/16/couch3-1.jpg'),
(19, 2, 'imagenes/16/couch3-2.jpg'),
(20, 2, 'imagenes/17/couch4-1.jpg'),
(21, 2, 'imagenes/17/couch4-2.jpg'),
(22, 2, 'imagenes/17/couch4-3.jpg'),
(23, 2, 'imagenes/18/couch5-1.jpg'),
(24, 2, 'imagenes/18/couch5-2.jpg'),
(25, 3, 'imagenes/19/6-1.jpg'),
(26, 3, 'imagenes/19/6-2.jpg'),
(27, 3, 'imagenes/19/6-3.jpg'),
(28, 3, 'imagenes/19/6-4.jpg'),
(29, 3, 'imagenes/20/7-1.jpg'),
(30, 3, 'imagenes/20/7-2.jpg'),
(31, 3, 'imagenes/20/7-3.jpg'),
(32, 3, 'imagenes/21/8-1.jpg'),
(33, 3, 'imagenes/21/8-2.jpg'),
(34, 3, 'imagenes/21/8-3.jpg'),
(35, 3, 'imagenes/21/8-4.jpg'),
(36, 4, 'imagenes/21/8-5.jpg'),
(37, 4, 'imagenes/22/9-1.jpg'),
(38, 4, 'imagenes/22/9-2.jpg'),
(39, 4, 'imagenes/22/9-3.jpg'),
(40, 4, 'imagenes/23/10-1.jpg'),
(41, 4, 'imagenes/23/10-2.jpg'),
(42, 4, 'imagenes/23/10-3.jpg'),
(43, 4, 'imagenes/23/10-4.jpg'),
(44, 4, 'imagenes/23/10-5.jpg'),
(48, 12, 'imagenes/12/couch5-1.jpg'),
(49, 13, 'imagenes/13/10-1.jpg'),
(50, 13, 'imagenes/13/10-2.jpg'),
(51, 13, 'imagenes/13/10-3.jpg'),
(52, 13, 'imagenes/13/10-4.jpg'),
(53, 13, 'imagenes/13/10-5.jpg'),
(54, 14, 'imagenes/14/9-1.jpg'),
(55, 14, 'imagenes/14/9-2.jpg'),
(56, 14, 'imagenes/14/9-3.jpg'),
(57, 14, 'imagenes/14/9-4.jpg'),
(58, 15, 'imagenes/15/couch5-1.jpg'),
(59, 15, 'imagenes/15/couch5-2.jpg'),
(60, 16, 'imagenes/16/6-1.jpg'),
(61, 16, 'imagenes/16/6-2.jpg'),
(62, 16, 'imagenes/16/6-3.jpg'),
(63, 16, 'imagenes/16/6-4.jpg'),
(64, 17, 'imagenes/17/7-1.jpg'),
(65, 17, 'imagenes/17/7-2.jpg'),
(66, 17, 'imagenes/17/7-3.jpg'),
(67, 18, 'imagenes/18/8-1.jpg'),
(68, 18, 'imagenes/18/8-2.jpg'),
(69, 18, 'imagenes/18/8-3.jpg'),
(70, 18, 'imagenes/18/8-4.jpg'),
(71, 18, 'imagenes/18/8-5.jpg'),
(72, 19, 'imagenes/19/6-4.jpg'),
(73, 21, 'imagenes/21/6-3.jpg'),
(74, 22, 'imagenes/22/9-3.jpg'),
(75, 23, 'imagenes/23/20150307_184143.jpg'),
(76, 24, 'imagenes/24/couch4-2.jpg'),
(77, 24, 'imagenes/24/couch4-3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idpregunta` int(3) NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci,
  `fechaPreg` date NOT NULL,
  `idusuario` int(3) NOT NULL,
  `idcouch` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idpregunta`, `pregunta`, `respuesta`, `fechaPreg`, `idusuario`, `idcouch`) VALUES
(1, 'tiene cochera? ', 'si tiene', '2016-07-06', 2, 1),
(2, 'tiene parrilla?', 'fdsfgsdf', '2016-07-04', 6, 1),
(3, 'tiene cocina?', NULL, '2016-07-06', 10, 1),
(4, 'cobran? ', NULL, '2016-07-09', 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `idsolicitud` int(11) NOT NULL,
  `idcouch` int(3) NOT NULL,
  `idusuario` int(3) NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaaceptada` date DEFAULT NULL,
  `comentariosolicitud` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechadesde` date NOT NULL,
  `fechahasta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`idsolicitud`, `idcouch`, `idusuario`, `estado`, `fechaaceptada`, `comentariosolicitud`, `fechadesde`, `fechahasta`) VALUES
(1, 2, 3, 'espera', NULL, 'Comentario', '2016-06-24', '2016-06-29'),
(2, 1, 3, 'rechazada', NULL, 'hjkgbhjgjg', '2016-07-13', '2016-07-16'),
(3, 1, 2, 'espera', NULL, 'hhh', '2016-07-14', '2016-07-18'),
(4, 1, 13, 'espera', NULL, 'fkjshdfwehkfewhfew fnwekfjewifjhmf fewifjewijf', '2016-07-03', '2016-07-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idtipo` int(3) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idtipo`, `nombre`, `bloqueado`) VALUES
(1, 'Casa', 0),
(2, 'CabaÃ±a', 0),
(3, 'Choza', 0),
(4, 'Departamento', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(3) NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(30) NOT NULL,
  `direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `apellido` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechanac` date NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `fechap` date DEFAULT NULL,
  `costop` int(3) DEFAULT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `email`, `clave`, `documento`, `direccion`, `telefono`, `apellido`, `nombre`, `fechanac`, `premium`, `fechap`, `costop`, `administrador`) VALUES
(1, 'luli_lp158@hotmail.com', '1234a', 35646423, '1 y 50', 4543244, 'Perez', 'Lucia', '1989-04-10', 1, '2016-06-01', 0, 1),
(2, 'premium@hotmail.com', '1234p', 30874678, '7 y 50', 33455432, 'Lopez', 'Jose', '1995-03-12', 1, '2016-06-02', 50, 0),
(3, 'comun@hotmail.com', '1234c', 3467866, '44 y 23', 2434432, 'sego', 'johana', '2013-03-04', 0, '2016-06-03', 50, 0),
(4, 'otro@hotmail.com', '1234o', 3456789, '3 y 59', 4523111, 'Hernandez', 'Carlos', '1993-12-31', 0, NULL, NULL, 0),
(6, 'prueba@hotmail.com', '1234p', 67888999, '988 7787', 15473829, 'hjghjg', 'lljj', '2016-06-25', 0, NULL, NULL, 0),
(7, 'pruebaunlp@hotmail.com', '1234p', 44223333, 'ffe3wr', 43488599, 'FJDSHFJ', 'LLLLLL', '2016-06-02', 0, NULL, NULL, 0),
(10, 'probando@hotmail.com', '1234', 23423442, '323', 43892910, 'fkdjf', 'jfkewjf', '1998-06-24', 0, NULL, NULL, 0),
(11, 'probando2@hotmail.com', '1234', 35940811, '4132453', 4559289, 'fkdjfk', 'fksjhf', '2016-06-15', 0, NULL, NULL, 0),
(12, 'probando3@hotmail.com', '1234', 35940811, '23232 32', 43292991, 'KFJFK', 'kfdjskfg', '2016-06-25', 0, NULL, NULL, 0),
(13, 'lucreciagalliani158@gmail.com', '1234l', 32239199, 'yewgre', 0, 'Galliani', 'Lucrecia', '1991-08-19', 0, NULL, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `idcouch` (`idcouch`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `couch`
--
ALTER TABLE `couch`
  ADD PRIMARY KEY (`idcouch`),
  ADD KEY `idtipo` (`idtipo`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `hacecomentario`
--
ALTER TABLE `hacecomentario`
  ADD PRIMARY KEY (`idhacecomentario`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idusuario2` (`idusuario2`);

--
-- Indices de la tabla `imagenescouches`
--
ALTER TABLE `imagenescouches`
  ADD PRIMARY KEY (`idimagenescouches`),
  ADD KEY `idcouch` (`idcouch`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idpregunta`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcouch` (`idcouch`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `idcouch` (`idcouch`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `couch`
--
ALTER TABLE `couch`
  MODIFY `idcouch` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `hacecomentario`
--
ALTER TABLE `hacecomentario`
  MODIFY `idhacecomentario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `imagenescouches`
--
ALTER TABLE `imagenescouches`
  MODIFY `idimagenescouches` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idpregunta` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idtipo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idcouch`) REFERENCES `couch` (`idcouch`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `couch`
--
ALTER TABLE `couch`
  ADD CONSTRAINT `couch_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `tipos` (`idtipo`),
  ADD CONSTRAINT `couch_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `hacecomentario`
--
ALTER TABLE `hacecomentario`
  ADD CONSTRAINT `hacecomentario_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `hacecomentario_ibfk_2` FOREIGN KEY (`idusuario2`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `imagenescouches`
--
ALTER TABLE `imagenescouches`
  ADD CONSTRAINT `clavefk1` FOREIGN KEY (`idcouch`) REFERENCES `couch` (`idcouch`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`idcouch`) REFERENCES `couch` (`idcouch`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idcouch`) REFERENCES `couch` (`idcouch`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
