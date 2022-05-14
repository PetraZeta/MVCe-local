-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-05-2022 a las 11:51:21
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elocal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE IF NOT EXISTS `favorito` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` int(10) NOT NULL,
  `producto` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_usuario` (`usuario`) USING BTREE,
  KEY `producto` (`producto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`id`, `usuario`, `producto`) VALUES
(1, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `web` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `foto`, `descripcion`, `web`) VALUES
(1, 'Comunidad Slow Fashion', 'Logo-COMUNIDAD.png', 'En la última década se ha producido una oleada de cambios en la industria de la moda. Cada vez son más las marcas que rechazan los principios de la moda rápida y optan por un enfoque más sostenible en la confección de prendas.\r\n\r\nLa slow fashion se opone al modelo de moda rápida que surgió hace unos 20 años, en el que la ropa se abarató y los ciclos de las tendencias se aceleraron. Algunas marcas muy conocidas queman muchas toneladas de prendas no vendidas al año, a pesar de los continuos esfuerzos de sostenibilidad para cerrar el círculo de la moda, está claro que esta filosofía es una parte necesaria del movimiento en su conjunto.', 'https://asociacionrurex.com/proyectos/slow-fashion/comunidad/'),
(2, 'Trapos Verdes', 'traposVerdes.png', 'La crisis provocada por el Covid19, según denuncia la ONG Human Rights Watch , decenas de marcas de ropa han cancelado sus pedidos sin asumir su responsabilidad financiera, incluso cuando sus trabajadoras ya tenían fabricados sus productos. En Bangladesh se calcula que más de un millón de personas han sido despedidas o cesadas temporalmente, gran parte de las cuales no han recibido sus salarios.\r\nEl impacto ambiental del sector textil y sus efectos sobre el cambio climático es un tema clave a tener mucho en cuenta. El algodón, por ejemplo, supone el 2,4% de la superficie del área cultivable en el mundo pero acumula el 25% de los insecticidas y el 10% de los pesticidas.', 'https://www.youtube.com/channel/UCRTAbpTcB3ny3AB465OSKdQ'),
(3, 'GreenForest', 'greenForest.png', '¿Comprometido, responsable, empático, inconformista?\r\n\r\nSi has llegado hasta aquí es porque tenemos que conocernos.\r\n\r\nPero antes, déjame que intente adivinar algo sobre ti.\r\n\r\nTe preocupa la situación actual de la emergencia climática\r\nTodo lo que está en tu mano para revertir esta situación actúas rápidamente\r\nTe encanta hacer actividades al aire libre, conectar con las personas y con la naturaleza\r\nCuando vistes una prenda quieres sentirte cómodo con ella, le coges especial cariño y quieres que te acompañe en todas tus aventuras\r\nTe interesas por cómo ha sido fabricada, con qué materiales y si esa marca que te encanta es cercana, ya eres fijo en su comunidad\r\nSabes que las pequeñas acciones que haces hoy tendrán un impacto positivo en el mañana\r\nSi estas afirmaciones describen tu forma de pensar, quédate con nosotros que nos encantará conocerte mejor.\r\n\r\nTodos queremos cambiar el mundo, pero ¿por donde empezar?\r\n\r\nCada pequeño gesto, palabra o intención; cuenta a la hora de cambiar el mundo, sobre todo cambiar tu mundo y el de los que te rodean.\r\n\r\nAsí nace Green Forest con Joaquín y Clara. Joaquín al mando del diseño y la administración, es Ingeniero Industrial, un apasionado de la naturaleza y con una creencia firme y profunda de hacer las cosas de manera diferente. Y Clara detrás de las pantallas, al mando de las estrategias de marketing, preparación de pedidos para que te llegue lo más bonito posible y atención al cliente para resolver todas tus dudas. Una amante de la moda desde muy pequeña, estilista, escaparatista y directora de marketing en una Sastrería.\r\n\r\nCuando encuentras esa pieza que te falta en el puzzle nace Green Forest. Marca de Moda Sostenible con impacto positivo referente en España con el fin de propulsar la transparencia, trazabilidad y honestidad que la industria textil actual necesita.\r\n\r\n“ No se trata de vestirnos de una forma u otra, sino de repensar cómo nos vestimos”', 'https://greenforestwear.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci,
  `precio` double NOT NULL DEFAULT '0',
  `categoria` varchar(1) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '(R)opa, (Z)apat, (C)omplementos',
  `genero` varchar(1) COLLATE utf8mb4_spanish_ci DEFAULT NULL COMMENT '(H)ombre, (M)ujer, (X)',
  `imagen` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `favorito` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `articulo_ibfk_1` (`id_tienda`),
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_tienda`, `id_marca`, `nombre`, `descripcion`, `precio`, `categoria`, `genero`, `imagen`, `favorito`) VALUES
(1, 2, 3, 'Bolso de Cuero Vegetal', NULL, 50, 'C', 'X', 'mix03.jpg', 0),
(3, 1, 1, 'Pañuelo de seda', NULL, 15, 'C', 'X', 'panuelo.jpg', 0),
(4, 2, 3, 'Poncho de lana merina', NULL, 25, 'R', 'M', 'mponcho01.jpg', 0),
(5, 4, 1, 'Vestido de seda', NULL, 60, 'R', 'M', 'modelo1.jpg', 0),
(6, 2, 2, 'Camiseta Algodón', 'Camiseta de Algodón orgánico', 22, 'R', 'X', 'xcamiseta02.jpg', 0),
(7, 3, 2, 'Camiseta Algodón', 'Camiseta de Algodón orgánico', 22, 'R', 'X', 'xcamiseta02.jpg', 0),
(8, 3, 3, 'Pantalón de Lino ', NULL, 25, 'R', 'M', 'modelo2.jpg', 0),
(9, 2, 2, 'Camiseta Algodón', 'Camiseta de Algodón orgánico', 22, 'R', 'X', 'xcamiseta01.jpg', 0),
(10, 3, 1, 'Pantalón de seda', NULL, 30, 'R', 'M', 'mpantalon01.jpg', 0),
(11, 3, 1, 'Pantalón de seda', NULL, 30, 'R', 'M', 'mpantalon01.jpg', 0),
(12, 1, 1, 'Jersey de lana merina', NULL, 35, 'R', 'X', 'xjersey01.jpg', 0),
(13, 1, 1, 'Jersey de lana merina', NULL, 35, 'R', 'X', 'xjersey01.jpg', 0),
(14, 1, 3, 'Abrigos de segunda mano', NULL, 15, 'R', 'X', 'mix02.jpg', 0),
(15, 3, 3, 'Conjunto de bambú', NULL, 65, 'R', 'X', 'xconjunto01.jpg', 0),
(16, 4, 3, 'Conjunto de sport', NULL, 65, 'R', 'M', 'mconjunto01.jpg', 0),
(17, 1, 1, 'Chaqueta Bomber', NULL, 59, 'R', 'X', 'xchaqueta01.jpg', 0),
(18, 1, 1, 'Chaqueta Bomber', NULL, 59, 'R', 'X', 'xchaqueta01.jpg', 0),
(21, 1, 2, 'Zapatillas Nike', 'Zapatillas NIKE modelo AIR FORCE ONE.\r\nHechas con materiales 100% sostenibles.\r\nSuela de caucho natural y plantilla de corcho anatómica.\r\n', 0, 'Z', 'M', 'zapatillas.jpg', 0),
(22, 1, 3, 'Zapatillas de deporte', 'Zapatillas hechas con materiales 100% reciclados.\r\nSuela de caucho natural y plantilla de corcho anatómica.\r\nDiseñado y fabricado en España.', 68, 'Z', 'X', 'zapatillas01.jpg', 0),
(24, 3, 1, 'Botas de piel', 'Botín de cuero de vaca curtido sin químicos, solo con taninos de corteza de árbol y sin tintes ni aditivos contaminantes.\r\nDiseñados y fabricados en España.  ', 0, 'Z', 'H', 'botas.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

DROP TABLE IF EXISTS `tienda`;
CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `web` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `logo`, `web`, `telefono`, `lat`, `lng`, `direccion`) VALUES
(1, 'Remudarte', 'remudarte.png', 'https://remudarte.es', '927000000', 39.4684, -6.38065, 'C. Gil Cordero, 5, 10001 Cáceres'),
(2, 'La Sentipensante', 'sentipensante.png', 'https://www.lasentipensante.com', '623101122', 39.479, -6.3734, 'C. San Justo, 50, 10003 Cáceres'),
(3, 'El Caracol de Maltravieso', 'CaracolDeMaltravieso.png', 'https://elcaracoldemaltravieso.com', '927224457', 39.4734, -6.37583, 'C. Casas de Cotallo, 4, 10004 Cáceres'),
(4, 'Samarkanda', 'samarkanda.jpg', 'https://www.samarkandaonline.com', '927216238', 39.4741, -6.37345, 'C. Moret, 32, 10003 Cáceres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `novedades` int(1) DEFAULT '1',
  `ofertas` int(1) NOT NULL DEFAULT '1',
  `descuentos` int(1) NOT NULL DEFAULT '1',
  `rol` int(1) NOT NULL COMMENT '0-admin 1-usuario',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `clave`, `email`, `nombre`, `novedades`, `ofertas`, `descuentos`, `rol`) VALUES
(1, '1235', 'pedo@pedo.es', 'Pedro', 1, 1, 1, 0),
(3, '1135', 'juan@juan.es', 'Juan', 1, 1, 1, 0),
(4, '123456', 'tumadreescalva', 'calva', 0, 0, 0, 1),
(5, '$2y$10$/tZAx/jRlasdh9wnEl8Y7..TxrONeNiwduJLMyrHT9T1R8ikEGPeG', 'cicla.zapata@gmail.com', 'ines', 1, 1, 1, 1),
(7, '$2y$10$IIhV1SKaWA.gw66W2zVpoObmO67WpYBDOSvtVpGTY.BiNG/Fk9nA6', 'maria@gmail.com', 'maria', 0, 0, 1, 1),
(8, '$2y$10$x1CFg.t5CYvhuqxZIZ0Vh.OdlCWU5jCawI.141kAhNZL.Lgld1NeW', 'pepe@gmail.com', 'manuel', 0, 0, 1, 1),
(9, '$2y$10$7v25UBn.YdDd.XkN/5GUgeeLlEz0xttXFLGZBgpVitESdiioIZnvG', 'duendeziya@hotmail.com', 'maria', 1, 1, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `producto` FOREIGN KEY (`producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tienda` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
