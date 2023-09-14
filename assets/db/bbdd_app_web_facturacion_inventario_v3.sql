-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para realshoes
CREATE DATABASE IF NOT EXISTS `realshoes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `realshoes`;

-- Volcando estructura para tabla realshoes.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `factura_id` int NOT NULL AUTO_INCREMENT,
  `pedido_id` int DEFAULT NULL,
  `monto_total` float DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`factura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.facturas: ~4 rows (aproximadamente)
REPLACE INTO `facturas` (`factura_id`, `pedido_id`, `monto_total`, `estado`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 4, 2000000, 'Pago', '2023-09-08 11:43:48', '2023-09-08 11:43:48', NULL),
	(2, 3, 100000, 'Cancelado', '2023-09-08 11:44:06', '2023-09-08 11:44:06', NULL),
	(3, 2, 150000, 'Por Confirmar', '2023-09-11 12:33:34', '2023-09-11 12:33:34', NULL),
	(4, 1, 50000, 'Error de Pago', '2023-09-11 12:34:40', '2023-09-11 12:34:41', NULL);

-- Volcando estructura para tabla realshoes.inventarios
CREATE TABLE IF NOT EXISTS `inventarios` (
  `inventario_id` int NOT NULL AUTO_INCREMENT,
  `bodega` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`inventario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.inventarios: ~4 rows (aproximadamente)
REPLACE INTO `inventarios` (`inventario_id`, `bodega`, `descripcion`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 'Productos', 'Inventario de productos de Real Shoes', '2023-08-28 15:37:26', '2023-08-28 16:24:51', NULL),
	(2, 'Herramientas', 'Herramientas de Real Shoes', '2023-08-28 15:39:18', '2023-08-28 16:10:04', NULL),
	(3, 'Restrepo', 'Bodega de la sede Restrepo', '2023-08-28 16:10:32', '2023-08-28 16:24:45', NULL);

-- Volcando estructura para tabla realshoes.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `pedido_id` int NOT NULL AUTO_INCREMENT,
  `cantidad` int DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `metodo_pago_id` int DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`pedido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.pedidos: ~4 rows (aproximadamente)
REPLACE INTO `pedidos` (`pedido_id`, `cantidad`, `subtotal`, `metodo_pago_id`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 150, 1750000, 1, '2023-09-08 11:36:52', '2023-09-08 11:36:52', NULL),
	(2, 30, 700000, 2, '2023-09-08 11:43:07', '2023-09-08 11:43:07', NULL),
	(3, 10, 170000, 3, '2023-09-12 15:15:19', '2023-09-12 15:15:19', NULL),
	(4, 15, 1000000, 4, '2023-09-12 15:15:48', '2023-09-12 15:15:48', NULL);

-- Volcando estructura para tabla realshoes.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `persona_id` int NOT NULL AUTO_INCREMENT,
  `cedula` int DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.personas: ~7 rows (aproximadamente)
REPLACE INTO `personas` (`persona_id`, `cedula`, `nombre`, `apellido`, `direccion`, `contrasena`, `telefono`, `email`, `imagen`, `rol_id`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 123456789, 'Eliza', 'Jhonson', 'Cra 4 11-22', '$argon2id$v=19$m=65536,t=4,p=1$S2tBeEluZmVFL0lpMHJ3aw$1EaX+vOmBaO4soxPDOOOfpb71/A7qefYWsn6UlhYCjA', '1', '1@1.com', '59764811.jpg', 1, '2023-08-23 20:59:53', '2023-09-12 21:52:47', NULL),
	(2, 987654321, 'Lucio', 'Alvarez', 'Transv 25 25-24', '$argon2id$v=19$m=65536,t=4,p=1$c1ptdC5TM05USndsTjZaZg$saChgCfhBty6da1n2uG+apt177xVqCYPttbKnLSSxa0', '2', '2@2.com', '2error idime.PNG', 2, '2023-08-23 21:10:31', '2023-08-25 19:10:30', NULL),
	(3, 123987654, 'Marina', 'Vargas', 'Av Chile 23 -23', '$argon2id$v=19$m=65536,t=4,p=1$ai43THdxSG9WTi5pWE5vQQ$k2fwhU6Ev94yBGA8l0FDSRItC3pNyKEL0Gk333H4XlU', '3', '3@3.com', '3Modelo_Controller.PNG', 3, '2023-08-23 21:12:02', '2023-08-25 19:10:33', NULL),
	(4, 1234, 'Omar', 'Bohorquez', 'calle falsa 147', '$argon2id$v=19$m=65536,t=4,p=1$RWNsV3dLcmJvUlFZb1BiNw$uKKUCELAeBQc2tHnfb7Q98Bqe0mAmTLTNCKu62QmniE', '311', 'o@o.com', '1234avatar4.png', 1, '2023-09-06 18:15:52', '2023-09-06 18:15:52', NULL),
	(5, 1234, 'Clark', 'Astartes', 'calle falsa 1234', '$argon2id$v=19$m=65536,t=4,p=1$dmxSUUVHRURodWtzSTYudQ$0PTzmRCQ3FwNdHH6LHd/kt0FOcPtv3zXPiOz3SQ4QlM', '311', 'w@w.com', '1234th-187230558.jpg', 1, '2023-09-06 22:02:36', '2023-09-06 22:02:36', NULL),
	(6, 423567980, 'Leidy', 'Matinez', 'Calle 123 Falsa', '$2y$10$LUlo.JtjudTIbqzNp/OdCep0Z0EpSkZE93f9W6cdT6cVp90kWV7PO', '1343', '7@7.com', NULL, 4, '2023-09-09 18:29:04', '2023-09-09 18:29:04', NULL),
	(8, 987123456, 'Diego', 'Adames', 'Via Guabal 1223', '$argon2id$v=19$m=65536,t=4,p=1$bHkycDVabm0uYUJBMEE4SA$lnjVAUrJ3ZQk3rrgQ5Ki3WoX3PQeUJuWSjnN0uLOKBg', '1', '1@1.com', '1Modelo_Controller.PNG', 4, '2023-08-23 23:08:48', '2023-09-12 21:52:52', NULL);

-- Volcando estructura para tabla realshoes.persona_selecciona_productos
CREATE TABLE IF NOT EXISTS `persona_selecciona_productos` (
  `persona_selecciona_producto_id` int NOT NULL AUTO_INCREMENT,
  `persona_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `pedido_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precio_unitario` float DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`persona_selecciona_producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.persona_selecciona_productos: ~8 rows (aproximadamente)
REPLACE INTO `persona_selecciona_productos` (`persona_selecciona_producto_id`, `persona_id`, `producto_id`, `pedido_id`, `cantidad`, `precio_unitario`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 1, 1, 1, 100, 10000, '2023-09-08 10:55:01', '2023-09-08 10:55:01', NULL),
	(3, 2, 3, 2, 20, 20000, '2023-09-08 11:34:36', '2023-09-08 11:34:36', NULL),
	(4, 2, 4, 2, 10, 30000, '2023-09-08 11:35:16', '2023-09-08 11:35:16', NULL),
	(7, 4, 5, 3, 3, 25000, '2023-09-11 12:31:28', '2023-09-11 12:31:29', NULL),
	(8, 4, 6, 3, 2, 25000, '2023-09-11 12:31:30', '2023-09-11 12:31:30', NULL),
	(10, 3, 2, 1, 15, 59800, '2023-09-09 23:47:31', '2023-09-09 23:47:31', NULL),
	(11, 3, 3, 1, 15, 78000, '2023-09-09 23:47:35', '2023-09-09 23:47:35', NULL),
	(12, 3, 5, 1, 15, 110500, '2023-09-09 23:47:42', '2023-09-09 23:47:42', NULL),
	(13, 1, 1, 1, 50, 15000, '2023-09-10 14:20:10', '2023-09-10 14:20:10', NULL),
	(14, 5, 10, 4, 2, 17000, '2023-09-11 12:32:24', '2023-09-11 12:32:24', NULL);

-- Volcando estructura para tabla realshoes.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `producto_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `coleccion` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `talla` int DEFAULT NULL,
  `unidades` int unsigned DEFAULT NULL,
  `valor_compra` float DEFAULT NULL,
  `ganancia` float DEFAULT NULL,
  `valor_venta` float DEFAULT NULL,
  `imagen1` varchar(255) DEFAULT NULL,
  `imagen2` varchar(255) DEFAULT NULL,
  `imagen3` varchar(255) DEFAULT NULL,
  `imagen4` varchar(255) DEFAULT NULL,
  `inventario_id` int DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.productos: ~31 rows (aproximadamente)
REPLACE INTO `productos` (`producto_id`, `nombre`, `descripcion`, `tipo`, `marca`, `coleccion`, `genero`, `talla`, `unidades`, `valor_compra`, `ganancia`, `valor_venta`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `inventario_id`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '2', '2', '1', '2', 30, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-09 13:46:24', '2023-09-09 13:46:24'),
	(2, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 30, 100, 46000, 30, 59800, '72181505.jpg', '72181506.jpg', '72181507.jpg', '72181508.jpg', 1, '2023-09-04 23:23:18', '2023-09-09 17:19:28', '2023-09-09 17:19:28'),
	(3, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 32, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(4, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 32, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(5, 'Calzado formal', 'Calzado formal caballero marrón', '7', '1', '2', '2', 30, 100, 85000, 30, 110500, '779511913.jpg', '779511914.jpg', '779511915.jpg', '779511916.jpg', 1, '2023-09-04 23:51:01', '2023-09-04 23:51:01', NULL),
	(6, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 39, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(10, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 30, 100, 46000, 30, 59800, '72181505.jpg', '72181506.jpg', '72181507.jpg', '72181508.jpg', 1, '2023-09-04 23:23:18', '2023-09-04 23:23:18', NULL),
	(20, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 41, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(21, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 42, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(25, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 32, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(30, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 33, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(35, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 34, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(45, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 35, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(55, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 36, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(60, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 37, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(65, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 38, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(70, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 31, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(75, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 40, 100, 45000, 30, 58500, '89133901.jpg', '89133902.jpg', '89133903.jpg', '89133904.jpg', 1, '2023-09-04 23:21:37', '2023-09-04 23:21:37', NULL),
	(76, 'Bota en Cuero', 'Botas para caballero hecha en cuero', '1', '1', '1', '2', 30, 100, 46000, 30, 59800, '72181505.jpg', '72181506.jpg', '72181507.jpg', '72181508.jpg', 1, '2023-09-04 23:23:18', '2023-09-04 23:23:18', NULL),
	(77, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 32, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(78, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 33, 50, 60000, 30, 78000, '79437549.jpg', '794375410.jpg', '794375411.jpg', '794375412.jpg', 1, '2023-09-04 23:26:03', '2023-09-09 16:57:02', NULL),
	(79, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 32, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(80, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 34, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(81, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 35, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(82, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 36, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(83, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 37, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(84, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 38, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(85, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 39, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(86, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 40, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(87, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 41, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL),
	(88, 'Bota en Cuero', 'Botas para caballero hecha en cuero color vinotinto', '1', '1', '1', '2', 42, 50, 60000, 30, 78000, '22326419.jpg', '223264110.jpg', '223264111.jpg', '223264112.jpg', 1, '2023-09-04 23:26:03', '2023-09-04 23:26:03', NULL);

-- Volcando estructura para tabla realshoes.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla realshoes.roles: ~6 rows (aproximadamente)
REPLACE INTO `roles` (`rol_id`, `nombre`, `descripcion`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
	(1, 'Administrador ARP', 'Administrador root con todos los privilegios.', '2023-08-25 19:07:54', '2023-08-28 14:54:04', NULL),
	(2, 'Administrador APM', 'Gerente.', '2023-08-25 19:07:54', '2023-09-06 21:29:27', NULL),
	(3, 'Empleado', 'Empleado de Real Shoes.', '2023-08-25 19:07:54', '2023-09-06 21:29:31', NULL),
	(4, 'Cliente', 'Cliente de Real Shoes', '2023-08-25 19:07:54', '2023-09-08 17:53:29', NULL),
	(5, 'Proveedor', 'Proveedores de Real Shoes', '2023-09-10 20:31:45', '2023-09-10 15:31:45', '2023-09-10 15:32:03'),
	(6, 'cajero', 'empleado con cargo asignado', '2023-09-10 20:32:24', '2023-09-10 15:32:24', '2023-09-10 15:32:42');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
