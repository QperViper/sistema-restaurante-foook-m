-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 07:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodok`
--

-- --------------------------------------------------------

--
-- Table structure for table `cajero`
--

CREATE TABLE `cajero` (
  `rut` int(9) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'bebidas'),
(2, 'completos'),
(3, 'alcohol');

-- --------------------------------------------------------

--
-- Table structure for table `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `preciounitario` decimal(20,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detalleventa`
--

INSERT INTO `detalleventa` (`id`, `id_producto`, `id_venta`, `preciounitario`, `cantidad`) VALUES
(1, 1, 1, 1600.00, 1),
(2, 1, 2, 1600.00, 1),
(3, 3, 2, 1000.00, 1),
(4, 1, 2, 1600.00, 1),
(5, 3, 2, 1000.00, 1),
(6, 3, 3, 1000.00, 1),
(7, 1, 3, 1600.00, 1),
(8, 3, 4, 1000.00, 1),
(9, 1, 4, 1600.00, 1),
(10, 3, 5, 1000.00, 1),
(11, 1, 5, 1600.00, 1),
(12, 3, 6, 1000.00, 1),
(13, 1, 6, 1600.00, 1),
(14, 3, 7, 1000.00, 1),
(15, 1, 7, 1600.00, 1),
(16, 3, 8, 1000.00, 1),
(17, 1, 8, 1600.00, 1),
(18, 3, 9, 1000.00, 1),
(19, 1, 9, 1600.00, 1),
(20, 3, 10, 1000.00, 1),
(21, 1, 10, 1600.00, 1),
(22, 3, 11, 1000.00, 1),
(23, 1, 11, 1600.00, 1),
(24, 3, 12, 1000.00, 1),
(25, 1, 12, 1600.00, 1),
(26, 3, 13, 1000.00, 1),
(27, 1, 13, 1600.00, 1),
(28, 3, 14, 1000.00, 1),
(29, 1, 14, 1600.00, 1),
(30, 3, 15, 1000.00, 1),
(31, 1, 15, 1600.00, 1),
(32, 3, 16, 1000.00, 1),
(33, 1, 16, 1600.00, 1),
(34, 3, 17, 1000.00, 1),
(35, 1, 17, 1600.00, 1),
(36, 3, 18, 1000.00, 1),
(37, 1, 18, 1600.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `id_categoria`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 2, 'italiano', 1600.00, 'palta, tomate, mayonesa', 'https://media-front.elmostrador.cl/2021/05/completo-700x433.jpg'),
(3, 1, 'cocacola 200ml', 1000.00, 'bebida cocacola en lata 200ml', 'https://images.lider.cl/wmtcl?source=url[file:/productos/933439b.jpg]&scale=size[2000x2000]&sink'),
(4, 2, 'Palta', 400.00, 'Palta', 'https://www.recetasnestle.cl/sites/default/files/styles/crop_article_banner_desktop_nes/public/2021-11/aguacate_0.jpg?itok=jvSf5Av5'),
(5, 2, 'Palta', 400.00, 'Palta', 'https://www.recetasnestle.cl/sites/default/files/styles/crop_article_banner_desktop_nes/public/2021-11/aguacate_0.jpg?itok=jvSf5Av5'),
(6, 2, 'Frutilla', 400.00, 'Palta', 'https://www.recetasnestle.cl/sites/default/files/styles/crop_article_banner_desktop_nes/public/2021-11/aguacate_0.jpg?itok=jvSf5Av5'),
(7, 2, 'Frutilla', 400.00, 'Palta', 'https://www.recetasnestle.cl/sites/default/files/styles/crop_article_banner_desktop_nes/public/2021-11/aguacate_0.jpg?itok=jvSf5Av5'),
(10, 2, 'vi', 234.00, '2342', '2');

-- --------------------------------------------------------

--
-- Table structure for table `producto_usuario`
--

CREATE TABLE `producto_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `clavetransaccion` varchar(255) NOT NULL,
  `datoscuenta` text NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `comentario` varchar(50) NOT NULL,
  `total` decimal(60,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id`, `clavetransaccion`, `datoscuenta`, `correo`, `fecha`, `comentario`, `total`, `status`) VALUES
(1, '15sqg6g1i1qg7sud9isn0o37qv', '', 'olivafres@s.cl', '2023-10-31 10:51:35', '', 1600.00, 'procesado'),
(2, '15sqg6g1i1qg7sud9isn0o37qv', '', 'olivicdsgre@gmail.com', '2023-10-31 11:43:22', '', 5200.00, 'procesado'),
(3, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 08:58:14', '', 2600.00, 'procesado'),
(4, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 08:58:19', '', 2600.00, 'procesado'),
(5, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 08:58:37', '', 2600.00, 'procesado'),
(6, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:02:24', '', 2600.00, 'procesado'),
(7, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:02:41', '', 2600.00, 'procesado'),
(8, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:02:44', '', 2600.00, 'procesado'),
(9, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:02:54', '', 2600.00, 'procesado'),
(10, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:15:51', '', 2600.00, 'procesado'),
(11, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:15:54', '', 2600.00, 'procesado'),
(12, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:21:20', '', 2600.00, 'procesado'),
(13, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:21:31', '', 2600.00, 'procesado'),
(14, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:21:43', '', 2600.00, 'procesado'),
(15, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:21:58', '', 2600.00, 'procesado'),
(16, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:22:24', '', 2600.00, 'procesado'),
(17, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:22:46', '', 2600.00, 'procesado'),
(18, '8au7uvcv3l510fndt3t8ppmevs', '', 'fdhg@us.cl', '2023-11-06 09:23:15', '', 2600.00, 'procesado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cajero`
--
ALTER TABLE `cajero`
  ADD PRIMARY KEY (`rut`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `producto_usuario`
--
ALTER TABLE `producto_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producto_usuario`
--
ALTER TABLE `producto_usuario`
  ADD CONSTRAINT `producto_usuario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
