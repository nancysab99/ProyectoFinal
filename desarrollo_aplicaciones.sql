-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 03:29:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarrollo_aplicaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idproducto` int(11) NOT NULL,
  `idusuario` varchar(100) COLLATE utf8_bin NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `url_imagen` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen`) VALUES
(1, 'Celulares', 'Dispositivo inalámbrico electrónico que permite tener acceso a la red de telefonía celular o móvil.', '2022-11-22 18:52:32', 'app/img/cat_celulares.png'),
(2, 'Computadoras', 'Máquina electrónica que está diseñada para realizar tareas específicas.', '2022-11-22 18:54:03', 'app/img/cat_computadora.png'),
(3, 'Cámaras', 'Dispositivo tecnológico que tiene como objetivo tomar imágenes quietas de situaciones, personas, paisajes o eventos para mantener memorias visuales de', '2022-11-22 18:55:47', 'app/img/cat_camaras.png'),
(4, 'Televisores', 'Aparato electrónico destinado a la recepción y reproducción de señales de televisión.', '2022-11-22 18:58:32', 'app/img/cat_televisores.png'),
(5, 'Accesorios', 'Encuentra los últimos productos, accesorios y ofertas. ', '2022-11-22 18:59:42', 'app/img/cat_celulares.png'),
(6, 'Línea Blanca', 'Productos para el hogar.', '2022-12-06 18:31:51', 'sds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombre_producto` varchar(100) COLLATE utf8_bin NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `url_imagen` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion`) VALUES
(1, 'Iphone 12', 1, '4 GB de RAM + 128 GB de ROM', 25999, 5, 'app/img/iphone12.jpg', '2022-11-22 19:10:54'),
(2, 'Huawei Nova 9 ', 1, '8 GB de RAM + 128/256 GB de ROM', 11999, 7, 'app/img/HuaweiNova9.jpg', '2022-11-22 19:20:04'),
(3, 'Honor X9', 1, '8 GB de RAM + 128 GB de ROM', 8299, 4, 'app/img/HonorX9.jpg', '2022-11-22 19:24:15'),
(4, 'Samsung S20 FE', 1, '6 GB de RAM + 128 GB de ROM', 9999, 8, 'app/img/SamsungS20FE.jpg', '2022-11-22 19:28:24'),
(5, 'Motorola G60', 1, '6 GB de RAM + 128 GB de ROM', 5999, 9, 'app/img/MotorolaG60.jpg', '2022-11-22 19:36:58'),
(6, 'Laptop HP Core I5', 2, 'Disco duro 256 GB SSD, Ram 8 GB, Windows 10 home, Lector tarjetas SD, Core i5-1135g7.\r\n    ', 20699, 4, 'app/img/LaptopHPCoreI5.jpg', '2022-11-22 19:40:57'),
(7, 'LAPTOP DELL I5 KXNPF ', 2, 'Disco duro 256 GB SSD, RAM 8 GB, Windows 10 home, Micrófono integrado, Core i5-1035G1\r\n    ', 21799, 7, 'app/img/LaptopDellI5.jpg', '2022-11-22 19:44:49'),
(8, 'LAPTOP HUAWEI MATEBOOK D15 I3', 2, '10 Hrs batería, RAM 8 GB, Windows 10 home 64-bit, Disco duro 256 GB, Conectividad bluetooth y wifi,\r', 14999, 3, 'app/img/LaptopHuaweiD15.jpg', '2022-11-22 19:49:54'),
(9, 'LAPTOP HP I3 15-DY2062LA', 2, 'CONECTIVIDAD HDMI/USB/BLUETOOTH, DISCO DURO 256 SSD, RAM 4 GB, MICROFONO INTEGRADO, WINDOWS 10 HOME', 15699, 5, 'app/img/LaptopHPI3.jpg', '2022-11-22 19:52:49'),
(10, 'Laptop HP Celeron 1TB', 2, '10 Hrs batería, RAM 8 GB, Windows 10 home, Disco duro 1 TB, Conectividad bluetooth y wifi.', 9800, 6, 'app/img/LaptopHPCeleron1TB.jpg', '2022-12-06 18:57:27'),
(11, 'LED SMART 4K SAMSUNG UN65AU700', 4, 'PurColor permite que los videos se sientan casi como si estuvieras allí. Permite que el televisor ex', 19995, 7, 'app/img/SamsungCrystalUHD.jpg', '2022-12-06 19:27:03'),
(12, 'LED SMART 4K LG 55UP7500', 4, 'Procesador α5, Ai Sound Pro, LG ThinQ AI: Inteligencia Artificial, Color Dinamico 4K Real, Bluetooth', 14995, 3, 'app/img/LG4K.jpg', '2022-12-06 19:30:33'),
(14, 'LED SMART 4K RCA RC50A21S', 4, 'SINT. ISDB-TB, Televisión digital, De libre recepción', 9795, 5, 'app/img/RCA4K.jpg', '2022-12-06 19:33:09'),
(15, 'LED SMART PANASONIC TC-32JS500', 4, 'SINT. ISDB-TB, Televisión digital, De libre recepción', 6000, 8, 'app/img/PanasonicTC.jpg', '2022-12-06 19:35:31'),
(16, 'LED SMART RCA RC32S21BT3D', 4, 'SINT. ISDB-TB, Televisión digital, De libre recepción', 4579, 2, 'app/img/RCA32.jpg', '2022-12-06 19:38:11'),
(17, 'Cámara Canon EOS Rebel T100', 3, 'Crear historias únicas con fotos de calidad DSLR y películas en Alta Definición Real (Full HD) es má', 11995, 3, 'app/img/CanonEOST100.jpg', '2022-12-06 19:43:13'),
(18, 'Cámara Canon EOS REBEL SL3', 3, 'Ya sea que se trate de un usuario primerizo de cámaras SLR, de un entusiasta de la fotografía en pro', 22877, 5, 'app/img/CanonEOSSL3.jpg', '2022-12-06 19:46:43'),
(19, 'Cámara Compacta Sony DSC-H400', 3, 'El primer zoom óptico del mundo de 63x Con un zoom tipo profesional, se maneja como una DSLR, pero e', 9495, 3, 'app/img/SonyDSC.jpg', '2022-12-06 19:51:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(500) COLLATE utf8_bin NOT NULL,
  `contraseña` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `creado_el` timestamp NOT NULL DEFAULT current_timestamp(),
  `modifical_el` timestamp NOT NULL DEFAULT current_timestamp(),
  `es_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `contraseña`, `email`, `fecha_nacimiento`, `creado_el`, `modifical_el`, `es_admin`) VALUES
('mfranco', 'Marlon Franco', '456', 'marlonfrancof015@gmail.com', '1995-04-30', '2022-11-18 03:16:35', '2022-11-18 03:16:35', 0),
('nancyss', 'Nancy Suazo', '123', 'nancyss_99@hotmail.com', '1999-02-10', '2022-11-18 03:13:41', '2022-11-18 03:13:41', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
