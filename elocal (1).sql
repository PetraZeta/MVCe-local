-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2022 a las 11:43:06
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
  KEY `producto` (`producto`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`id`, `usuario`, `producto`) VALUES
(14, 13, 24),
(15, 13, 7),
(18, 7, 14),
(20, 7, 24),
(21, 14, 14),
(24, 14, 17),
(25, 14, 16),
(26, 14, 7),
(27, 14, 1),
(28, 14, 24);

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
(2, 'Trapos Verdes', 'traposVerdes.png', 'La crisis provocada por el Covid19, según denuncia la ONG Human Rights Watch , decenas de marcas de ropa han cancelado sus pedidos sin asumir su responsabilidad financiera, incluso cuando sus trabajadoras ya tenían fabricados sus productos. En Bangladesh se calcula que más de un millón de personas han sido despedidas o cesadas temporalmente, gran parte de las cuales no han recibido sus salarios.\r\nEl impacto ambiental del sector textil y sus efectos sobre el cambio climático es un tema clave a tener mucho en cuenta. El algodón, por ejemplo, supone el 2,4% de la superficie del área cultivable en el mundo pero acumula el 25% de los insecticidas y el 10% de los pesticidas.', 'https://www.instagram.com/traposverdes/?hl=es'),
(3, 'GreenForest', 'greenForest.png', '¿Comprometido, responsable, empático, inconformista?\r\n\r\nSi has llegado hasta aquí es porque tenemos que conocernos.\r\n\r\nTodos queremos cambiar el mundo, pero ¿por donde empezar?\r\n\r\nCuando encuentras esa pieza que te falta en el puzzle nace Green Forest. Marca de Moda Sostenible con impacto positivo referente en España con el fin de propulsar la transparencia, trazabilidad y honestidad que la industria textil actual necesita.\r\n\r\n“ No se trata de vestirnos de una forma u otra, sino de repensar cómo nos vestimos”', 'https://greenforestwear.com');

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
(1, 2, 3, 'Bolso de Cuero Vegetal', 'Bolso Vegano producido éticamente con un estilo atemporal. Tiene cómodas asas y gran capacidad. Un clásico', 50, 'C', 'X', 'mix03.jpg', 0),
(3, 1, 1, 'Pañuelo de seda', 'Pintado a mano en seda salvaje con tintes naturales, por mujeres y hombres en riesgo de exclusión con una exquisita sensibilidad artística ', 15, 'C', 'X', 'panuelo.jpg', 0),
(4, 2, 3, 'Poncho de lana merina', 'Lana 100%  del proyecto Laneras, que busca revalorizar la lana merina en Extremadura, apostar por la lana local en general y recuperar las artesanías y los oficios tradicionales.', 55, 'R', 'M', 'mponcho01.jpg', 0),
(5, 4, 1, 'Vestido de seda', 'De seda pintada a mano con tintes naturales y ecológicos.\r\nBordados a mano con hilo de seda y oro.\r\n', 360, 'R', 'M', 'modelo1.jpg', 0),
(7, 3, 2, 'Camiseta Algodón', 'Camiseta de Algodón orgánico', 22, 'R', 'X', 'xcamiseta02.jpg', 0),
(8, 3, 3, 'Pantalón de Lino ', 'Lino natural cultivado y manufacturado en Sevilla.\r\nDiseñado y confeccionado por estudiantes de la escuela Superior de Costura de Granada.', 25, 'R', 'M', 'modelo2.jpg', 0),
(9, 2, 2, 'Camiseta Algodón', 'Camiseta de Algodón orgánico', 22, 'R', 'X', 'xcamiseta01.jpg', 0),
(10, 3, 1, 'Pantalón de seda', 'De seda natural rosa.\r\nBordados a mano con hilo de seda y oro.\r\n', 60, 'R', 'M', 'mpantalon01.jpg', 0),
(12, 1, 1, 'Jersey de lana merina', 'Lana 100%  del proyecto Laneras, que busca revalorizar la lana merina en Extremadura, apostar por la lana local en general y recuperar las artesanías y los oficios tradicionales.', 85, 'R', 'X', 'xjersey01.jpg', 0),
(14, 1, 3, 'Abrigos de segunda mano', 'Procedentes de donaciones y contenedores de Caritas. El proyecto social REMUDARTE busca dar una oportunidad a la ropa y a las personas.', 10, 'R', 'X', 'mix02.jpg', 0),
(15, 3, 3, 'Conjunto de bambú', 'Lino natural cultivado y manufacturado en País Vasco.\r\nDiseñado y confeccionado por estudiantes de la escuela Superior de Costura de Iruña.', 125, 'R', 'X', 'xconjunto01.jpg', 0),
(16, 4, 3, 'Conjunto de sport', 'Algodón natural cultivado y manufacturado en País Vasco.\r\nDiseñado y confeccionado por estudiantes de la escuela Superior de Costura de Iruña.', 105, 'R', 'M', 'mconjunto01.jpg', 0),
(17, 1, 1, 'Chaqueta Bomber', 'Fabricado con tejido reciclado, manufacturado en País Vasco.\r\nDiseñado y confeccionado por estudiantes de la escuela Superior de Costura de Iruña.', 59, 'R', 'X', 'xchaqueta01.jpg', 0),
(21, 1, 2, 'Zapatillas Nike', 'Zapatillas NIKE modelo AIR FORCE ONE.\r\nHechas con materiales 100% sostenibles.\r\nSuela de caucho natural y plantilla de corcho anatómica.\r\n', 99, 'Z', 'M', 'zapatillas.jpg', 0),
(22, 1, 3, 'Zapatillas de deporte', 'Zapatillas hechas con materiales 100% reciclados.\r\nSuela de caucho natural y plantilla de corcho anatómica.\r\nDiseñado y fabricado en España.', 68, 'Z', 'X', 'zapatillas01.jpg', 0),
(24, 3, 1, 'Botas de piel', 'Botín de cuero de vaca curtido sin químicos, solo con taninos de corteza de árbol y sin tintes ni aditivos contaminantes.\r\nDiseñados y fabricados en España.  ', 110, 'Z', 'H', 'botas.jpg', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `clave`, `email`, `nombre`, `novedades`, `ofertas`, `descuentos`, `rol`) VALUES
(7, '$2y$10$IIhV1SKaWA.gw66W2zVpoObmO67WpYBDOSvtVpGTY.BiNG/Fk9nA6', 'maria@gmail.com', 'maria', 0, 0, 1, 1),
(10, '$2y$10$olF.M..zxIe9RnZZRxAwdOSo5WiKKYpsZ3ueQegqdrdZ9I5xZenje', 'pepepe@gmail.com', 'pepe', 1, 1, 1, 1),
(11, '$2y$10$oblHNaNEbZRGVfB1pVaKI.F0/PX/mD/w1IoEkIGyHi3ONqNr8qL.2', 'marialo@gmail.com', 'maria', 1, 1, 1, 1),
(13, '$2y$10$Fsh.10T1ZFWCOxDvGjbVkOKsU07/1zddyU80cv.17SdH8NaIfs4pO', 'pepete@gmail.com', 'pepe', 1, 1, 1, 1),
(14, '$2y$10$dyfl9yaWCQuYaYRbIo1.6OM9mQ/U6XaYoPnk2K0i45KRZe3.TBhRm', 'ines@gmail.com', 'ines', 1, 0, 1, 1);

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
