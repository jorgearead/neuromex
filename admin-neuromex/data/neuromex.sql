-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2021 a las 22:25:42
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neuromex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `classroom` varchar(10) NOT NULL,
  `horary` varchar(20) NOT NULL,
  `memb` int(1) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `verification` varchar(20) NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `name`, `mail`, `pass`, `lastname`, `phone`, `classroom`, `horary`, `memb`, `payment_date`, `verification`, `activo`) VALUES
(1, 'jorge', 'jorge@hotmail.com', '6878273c6c68f29f9ae6', 'are', '1122554477', 'clase 2', '7 am a 2 pm', 2, NULL, '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `doc_id` int(20) NOT NULL,
  `doc_nombre` varchar(250) NOT NULL,
  `doc_file` varchar(250) NOT NULL,
  `doc_size` varchar(20) NOT NULL,
  `doc_privado` tinyint(1) NOT NULL,
  `doc_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`doc_id`, `doc_nombre`, `doc_file`, `doc_size`, `doc_privado`, `doc_producto`) VALUES
(1, 'Diagrama', 'neuromex-arduino-uno-diagrama.png', '129.348 Kb', 0, 1),
(2, 'Manual Arduino', 'neuromex-arduino-uno-manual-arduino.pdf', '789.937 Kb', 0, 1),
(3, 'Raspberry Manual', 'neuromex-raspberry-pi-3-raspberry-manual.pdf', '789.937 Kb', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(100) NOT NULL,
  `mem_desc` tinytext NOT NULL,
  `mem_price` double NOT NULL,
  `mem_logo` varchar(50) NOT NULL,
  `mem_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_membership`
--

INSERT INTO `tbl_membership` (`mem_id`, `mem_name`, `mem_desc`, `mem_price`, `mem_logo`, `mem_status`) VALUES
(1, 'B&#225;sica', '<p>Membresia basica, con esta membresia podras tener una cuenta administrativa de tus compras y acceso a contenido exclusivo.</p>\r\n', 0, 'neuromex-neuromex-neuromex-logo-2.jpeg', 1),
(2, 'Profesional', '<p>Membresia profesional, con esta membresia podras tener una cuenta administrativa de tus compras y acceso a contenido exclusivo como codigo fuente, diagramas y pdf&#39;s.</p>\r\n', 350, 'neuromex-gold-logo-mokcup.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(100) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` tinytext NOT NULL,
  `prod_price` text NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `prod_img` varchar(100) NOT NULL,
  `prod_trademark` int(11) NOT NULL,
  `prod_ranking` float NOT NULL,
  `prod_color` varchar(100) NOT NULL,
  `prod_size` varchar(50) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_status` int(1) NOT NULL,
  `prod_offer_price` float NOT NULL,
  `prod_rent` int(1) NOT NULL,
  `prod_mem_price` float NOT NULL,
  `prod_url` varchar(50) NOT NULL,
  `prod_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_cat`, `prod_img`, `prod_trademark`, `prod_ranking`, `prod_color`, `prod_size`, `prod_stock`, `prod_status`, `prod_offer_price`, `prod_rent`, `prod_mem_price`, `prod_url`, `prod_video`) VALUES
(1, 'Arduino Uno', '<p>Arduino uno con 13 entradas digitales y 5 analogicas</p>\r\n', '130.60', 6, 'neuromex-arduino-uno.png', 4, 0, 'verde oscuro', '', 400, 1, 100, 1, 0, 'arduino-uno', 'video'),
(2, 'Raspberry pi 3', '<p>Raspberry Pi 3 B+ ideal para proyectos para internet de la cosas</p>\r\n', '1900', 8, 'neuromex-raspberry-pi-3.png', 3, 0, 'verde', '12cm x 8cm', 52, 1, 0, 1, 1750.6, 'raspberry-pi-3', 'video'),
(3, 'ESP32', '<p>Palaca de desarrollo ESP32 Iot con Bluetooth y wifi</p>\r\n', '130.50', 6, 'neuromex-esp32.png', 3, 0, 'Negro', '', 120, 1, 120.95, 1, 120.3, 'esp32', 'video'),
(4, 'ESP8266', '<p>ESP8266 Chip integrado con wifi</p>\r\n', '89.79', 6, 'neuromex-esp8266.png', 4, 0, 'Negro', '', 400, 1, 80, 1, 65.73, 'esp8266', 'video'),
(5, 'sadfsa', '<p>asdsa</p>\r\n', '100', 6, 'neuromex-sadfsa.png', 5, 0, 'negrp', '', 520, 1, 50, 1, 35, 'sadfsa', 'video'),
(6, 'gddvcs', '<p>gddvcs</p>\r\n', '450', 8, 'neuromex-gddvcs.png', 3, 0, 'verde', '', 10, 1, 0, 1, 0, 'gddvcs', 'video'),
(7, 'qwsq', '<p>qwsq</p>\r\n', '450', 5, 'neuromex-qwsq.png', 5, 0, 'xzcxz', '', 41, 1, 100, 1, 0, 'qwsq', 'video'),
(8, 'xzxzc', '<p>xzxzc</p>\r\n', '74', 0, 'neuromex-xzxzc.png', 5, 0, 'cxdc', '', 450, 1, 0, 1, 0, 'xzxzc', 'video'),
(9, 'xsddc', '<p>xsddc</p>\r\n', '41', 6, 'neuromex-xsddc.png', 5, 0, 'scxsac', '', 45, 1, 10, 1, 0, 'xsddc', 'video'),
(10, 'qwertr', '<p>qwertr</p>\r\n', '602', 12, 'neuromex-qwertr.png', 5, 0, 'vcd', '', 113, 1, 500, 1, 450, 'qwertr', 'video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_categorias`
--

CREATE TABLE `tbl_producto_categorias` (
  `pc_id` int(10) NOT NULL,
  `pc_nombre` varchar(120) NOT NULL,
  `pc_url` varchar(150) NOT NULL,
  `pc_orden` int(10) NOT NULL,
  `pc_nivel` tinyint(1) NOT NULL,
  `pc_depende` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto_categorias`
--

INSERT INTO `tbl_producto_categorias` (`pc_id`, `pc_nombre`, `pc_url`, `pc_orden`, `pc_nivel`, `pc_depende`) VALUES
(2, 'Microcontrolador', 'microcontrolador', 1, 0, 0),
(3, 'Microprocesador', 'microprocesador', 2, 0, 0),
(4, 'Electronica', 'electronica', 3, 0, 0),
(5, 'Herramienta', 'herramienta', 4, 0, 0),
(6, 'Arduino', 'arduino', 1, 1, 2),
(8, 'Raspberry', 'raspberry', 1, 1, 3),
(11, 'Capacitor', 'capacitor', 1, 1, 4),
(12, 'Capacitor cer&#225;mico', 'capacitor-ceramico', 1, 2, 11),
(13, 'Capacitor electrol&#237;tico', 'capacitor-electrolitico', 2, 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto_slider`
--

CREATE TABLE `tbl_producto_slider` (
  `ps_id` int(11) NOT NULL,
  `ps_imagen` varchar(250) NOT NULL,
  `ps_alt` varchar(250) NOT NULL,
  `ps_title` varchar(250) NOT NULL,
  `ps_producto` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto_slider`
--

INSERT INTO `tbl_producto_slider` (`ps_id`, `ps_imagen`, `ps_alt`, `ps_title`, `ps_producto`) VALUES
(1, 'neuromex-arduino-uno-arduinouno.png', 'arduinouno.png', 'arduinoUno', 1),
(2, 'neuromex-arduino-uno-arduino.jpg', 'arduino.jpg', 'arduino', 1),
(3, 'neuromex-raspberry-pi-3-neuromex-raspberry-pi-3-b-raspberry.png', 'neuromex-raspberry-pi-3-b-raspberry.png', 'neuromex-raspberry-pi-3-b-raspberry', 2),
(4, 'neuromex-raspberry-pi-3-neuromex-raspberry-pi-3-b-raspberry-pi-3-b.jpg', 'neuromex-raspberry-pi-3-b-raspberry-pi-3-b.jpg', 'neuromex-raspberry-pi-3-b-raspberry-pi-3-b', 2),
(5, 'neuromex-esp32-esp32-diagrama.jpg', 'esp32-diagrama.jpg', 'esp32-Diagrama', 3),
(6, 'neuromex-esp32-esp32.jpg', 'esp32.jpg', 'esp32', 3),
(7, 'neuromex-esp8266-esp-01-esp8266-serial-wifi-module.jpg', 'esp-01-esp8266-serial-wifi-module.jpg', 'Esp-01-Esp8266-Serial-WiFi-Module', 4),
(8, 'neuromex-esp8266-pines-esp01.png', 'pines-esp01.png', 'pines-esp01', 4),
(9, 'neuromex-sadfsa-led.png', 'led.png', 'led', 5),
(10, 'neuromex-gddvcs-servo.png', 'servo.png', 'servo', 6),
(11, 'neuromex-qwsq-rasp.png', 'rasp.png', 'RASP', 7),
(12, 'neuromex-xzxzc-led.png', 'led.png', 'led', 8),
(13, 'neuromex-xsddc-neuromex-arduino-uno-arduino.jpg', 'neuromex-arduino-uno-arduino.jpg', 'neuromex-arduino-uno-arduino', 9),
(14, 'neuromex-qwertr-neuromex-lorem.png', 'neuromex-lorem.png', 'neuromex-lorem', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_titulo` varchar(150) NOT NULL,
  `slider_texto` varchar(250) NOT NULL,
  `slider_imagen` varchar(250) NOT NULL,
  `slider_link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_titulo`, `slider_texto`, `slider_imagen`, `slider_link`) VALUES
(1, 'Programaci&#243;n', 'Cursos de programaci&#243;n actualizados 2021 JS&#44; PHP&#44; Java&#44; C&#43;&#43;&#44; etc&#46;', 'neuromex-neuromex-arduino.jpg', '#'),
(2, 'IoT', 'Laboratorio de Iot en Casas dom&#243;ticas&#44; residencias e industriales&#46;', 'neuromex-neuromex.png', '#'),
(3, 'Arduino Uno', 'Promoci&#243;n de microcontrolador Arduino uno de &#45;20&#37;', 'neuromex-2.jpg', 'arduino&#45;uno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trademarck`
--

CREATE TABLE `tbl_trademarck` (
  `trademarck_id` int(10) NOT NULL,
  `trademarck_name` varchar(50) NOT NULL,
  `trademarck_logo` varchar(100) NOT NULL,
  `trademarck_url` varchar(50) NOT NULL,
  `trademarck_orden` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_trademarck`
--

INSERT INTO `tbl_trademarck` (`trademarck_id`, `trademarck_name`, `trademarck_logo`, `trademarck_url`, `trademarck_orden`) VALUES
(3, 'Raspberry', 'neuromex-raspberry.jpg', 'raspberry', 1),
(4, 'Arduino', 'neuromex-1.png', 'arduino', 2),
(5, 'Electr&#243;nica', 'neuromex-2.png', 'electronica', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `email`, `pass`) VALUES
(1, 'admin', 'neuro@neuromex.com.mx', '81fccaf9f00a8441b77b18fa2c8010f4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indices de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `tbl_producto_categorias`
--
ALTER TABLE `tbl_producto_categorias`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indices de la tabla `tbl_producto_slider`
--
ALTER TABLE `tbl_producto_slider`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indices de la tabla `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indices de la tabla `tbl_trademarck`
--
ALTER TABLE `tbl_trademarck`
  ADD PRIMARY KEY (`trademarck_id`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_categorias`
--
ALTER TABLE `tbl_producto_categorias`
  MODIFY `pc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_slider`
--
ALTER TABLE `tbl_producto_slider`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_trademarck`
--
ALTER TABLE `tbl_trademarck`
  MODIFY `trademarck_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
