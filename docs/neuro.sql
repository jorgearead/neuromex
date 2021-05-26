-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 01:32:07
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `neuro`
--

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
(3, 'Manual de arduino', 'neuromex-arduino-uno-manual-de-arduino.pdf', '789.937 Kb', 0, 1),
(4, 'manual', 'neuromex-raspberry-pi-3-b-manual.pdf', '789.937 Kb', 0, 2);

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
(7, 'b&#225;sica', '<p>basica 1 actualizacion</p>\r\n', 0, 'neuromex-neuromex-logo-2.jpeg', 1),
(8, 'b&#225;sica 2', '<p>basica 2</p>\r\n', 20.3, 'neuromex-neuromex-logo-3.jpeg', 0),
(9, 'basica 3', '<p>basica 3</p>\r\n', 30.5, 'neuromex-orange.jpg', 0),
(10, 'basica 4', '<p>basica 4</p>\r\n', 40, 'neuromex-neuromex.jpeg', 1),
(11, 'basica 5', '<p>basica 5</p>\r\n', 50.2, 'neuromex-img1.jpg', 0),
(12, 'basica 6', '<p>basica 6</p>\r\n', 60.99, 'neuromex-img4.png', 0),
(13, 'basica 7', '<p>basica 7</p>\r\n', 70.65, 'neuromex-logo-neuromex-r.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(100) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` tinytext NOT NULL,
  `prod_price` float NOT NULL,
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
(1, 'Arduino Uno', '<p>Aduino uno microcontrolador</p>', 250.5, 1, 'neuromex-arduino-uno-micro.jpg', 4, 4.5, 'verde agua', '', 50, 1, 200, 1, 180, 'arduino-uno', ''),
(2, 'raspberry pi 3 b&#43;', '<p>Raspberry pi 3 b+ microprocesador</p>\r\n', 2500, 4, 'neuromex-raspberry-pi-3-b.png', 4, 0, 'verde', '12cm x 8cm', 500, 1, 2300, 1, 2000, 'raspberry-pi-3-b', ''),
(3, 'pinzas ponchadoras', '<p>pinzas ponchadoras redes rj45</p>\r\n', 250.3, 5, 'neuromex-pinzas-ponchadoras.jpg', 4, 0, 'verde negro', '', 120, 1, 199.99, 1, 175.99, 'pinzas-ponchadoras', '');

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
(1, 'Microcontroladores', 'microcontroladores', 1, 0, 0),
(2, 'Arduino', 'arduino', 1, 1, 1),
(3, 'Arduino nano', 'arduino-nano', 1, 2, 2),
(4, 'Microprocesadores', 'microprocesadores', 2, 0, 0),
(5, 'Herramientas', 'herramientas', 3, 0, 0);

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
(1, 'neuromex-arduino-uno-micro-arduino.jpg', 'arduino.jpg', 'arduino', 1),
(2, 'neuromex-arduino-uno-micro-arduino-uno-wifi-r2-mci07062-3.png', 'arduino-uno-wifi-r2-mci07062-3.png', 'Arduino-UNO-WIFI-R2-MCI07062-3', 1),
(3, 'neuromex-raspberry-pi-3-b-raspberry.png', 'raspberry.png', 'raspberry', 2),
(4, 'neuromex-raspberry-pi-3-b-raspberry-pi-3-b.jpg', 'raspberry-pi-3-b.jpg', 'Raspberry-PI-3-B', 2),
(5, 'neuromex-pinzas-ponchadoras-pinzas.jpg', 'pinzas.jpg', 'pinzas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_titulo` varchar(150) NOT NULL,
  `slider_texto` varchar(250) NOT NULL,
  `slider_imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_titulo`, `slider_texto`, `slider_imagen`) VALUES
(1, 'Promoci&#243;n &#45;20&#37;', 'Nuevo arduino uno', 'neuromex-arduino.jpg');

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
(4, 'Raspberry', 'neuromexraspberry-raspberry.jpg', 'raspberry', 1);

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
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_categorias`
--
ALTER TABLE `tbl_producto_categorias`
  MODIFY `pc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_producto_slider`
--
ALTER TABLE `tbl_producto_slider`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
