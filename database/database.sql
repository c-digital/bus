-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2023 at 05:31 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `unebus_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `date` varchar(256) DEFAULT NULL,
  `id_driver` varchar(256) DEFAULT NULL,
  `id_vehicle` varchar(256) DEFAULT NULL,
  `id_travel` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `start` varchar(256) DEFAULT NULL,
  `end` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `date`, `id_driver`, `id_vehicle`, `id_travel`, `status`, `start`, `end`, `amount`, `date_create`, `date_update`) VALUES
(1, '2023-05-18', '6', '1', '2', 'No iniciado', NULL, NULL, NULL, '2023-04-26 18:44:20', '2023-05-18 18:22:49'),
(2, '2023-05-22', '6', '1', '4', 'No iniciado', NULL, NULL, NULL, '2023-05-10 21:50:00', '2023-05-10 21:50:00'),
(3, '2023-05-11', '6', '1', '2', 'No iniciado', NULL, NULL, NULL, '2023-05-10 21:50:23', '2023-05-11 07:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `lane` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `nit` varchar(256) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `id_company` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

CREATE TABLE `bus_type` (
  `id` int(11) NOT NULL,
  `type` varchar(256) DEFAULT NULL,
  `design` varchar(256) DEFAULT NULL,
  `total_seats` varchar(256) DEFAULT NULL,
  `seats_number` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_type`
--

INSERT INTO `bus_type` (`id`, `type`, `design`, `total_seats`, `seats_number`, `status`, `date_create`, `date_update`) VALUES
(1, 'Leito ', '2-3', '44', '01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44', 'active', '2023-04-21 11:59:46', '2023-04-27 18:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(11) NOT NULL,
  `id_company` varchar(256) DEFAULT NULL,
  `id_user` varchar(256) DEFAULT NULL,
  `date` varchar(256) DEFAULT NULL,
  `method` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `type` varchar(256) DEFAULT NULL,
  `balance` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `id_company`, `id_user`, `date`, `method`, `description`, `amount`, `type`, `balance`, `status`, `date_create`, `date_update`) VALUES
(1, '3', '1', '2023-05-08', 'Efectivo', 'Apertura de caja', '100', 'Entrada', '100', 'Abierta', '2023-05-08 18:56:07', '2023-05-10 17:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `date_create`, `date_update`) VALUES
(1, 'Maracaibo', '2023-04-17 22:38:02', '2023-04-17 22:38:02'),
(2, 'Caracas', '2023-04-26 18:05:36', '2023-04-26 18:05:36'),
(3, 'Barquisimeto', '2023-04-26 18:16:29', '2023-04-26 18:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `lane` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `nit` varchar(256) DEFAULT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `lane`, `address`, `nit`, `logo`, `name`, `email`, `phone`, `date_create`, `date_update`) VALUES
(3, '1', 'Calle 90, Av. 16', '24370873', '1729737.jpg', 'Rasth', 'nisadelgado@gmail.com', '04246402701', '2023-04-17 20:18:50', '2023-04-17 20:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `ci` varchar(256) DEFAULT NULL,
  `date_birth` varchar(256) DEFAULT NULL,
  `age` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `ci`, `date_birth`, `age`, `phone`, `address`, `date_create`, `date_update`) VALUES
(4, 'Nisa Delgado', '24370873', '1993-01-01', '29', '04246402701', 'Calle 90, Av. 16, Sector Nueva Vía, #16b-37', '2023-04-28 13:37:00', '2023-04-28 13:37:00'),
(22, 'Jose', '545456', '2000-06-05', '23', '55435', 'Nueva Chicago', '2023-05-06 15:55:55', '2023-05-13 16:40:15'),
(23, 'Erick Santos', '10756777', '1986-11-11', '36', '+59171608981', 'Calle Perú 235', '2023-05-06 19:16:46', '2023-05-13 16:40:15'),
(24, 'Daiane Marques', '11252881', '1989-01-09', '33', '75602777', 'Av Bush nro 790', '2023-05-06 20:19:05', '2023-05-13 16:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `id_company` varchar(256) DEFAULT NULL,
  `id_user` varchar(256) DEFAULT NULL,
  `messenger` varchar(256) DEFAULT NULL,
  `origin` varchar(256) DEFAULT NULL,
  `destination` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `weight` varchar(256) DEFAULT NULL,
  `price` varchar(256) DEFAULT NULL,
  `receipt` varchar(256) DEFAULT NULL,
  `billing` varchar(256) DEFAULT NULL,
  `discount` varchar(256) DEFAULT NULL,
  `total` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_assign` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`id`, `name`, `date_create`, `date_update`) VALUES
(1, 'Efectivo', '2023-05-03 21:51:00', '2023-05-03 21:51:00'),
(2, 'Transferencia bancaria', '2023-05-03 21:51:00', '2023-05-03 21:51:00'),
(3, 'Depósito bancario', '2023-05-03 21:51:00', '2023-05-03 21:51:00'),
(4, 'QR', '2023-05-03 21:51:00', '2023-05-03 21:51:00'),
(5, 'Cheque', '2023-05-03 21:51:00', '2023-05-03 21:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_sale` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `method` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `id_sale`, `amount`, `method`, `date_create`, `date_update`) VALUES
(7, '3', '10', 'Efectivo', '2023-05-04 22:02:43', '2023-05-04 22:02:43'),
(9, '4', '80', 'Efectivo', '2023-05-05 14:34:17', '2023-05-05 14:34:17'),
(10, '2', '80', 'Efectivo', '2023-05-05 20:14:07', '2023-05-05 20:14:07'),
(11, '2', '0', 'Transferencia bancaria', '2023-05-05 20:18:26', '2023-05-05 20:18:26'),
(12, '8', '80', 'Efectivo', '2023-05-06 12:55:35', '2023-05-06 12:55:35'),
(13, '20', '60', 'Efectivo', '2023-05-06 19:18:27', '2023-05-06 19:18:27'),
(14, '20', '20', 'QR', '2023-05-06 19:18:45', '2023-05-06 19:18:45'),
(15, '22', '50', 'Efectivo', '2023-05-06 20:37:47', '2023-05-06 20:37:47'),
(16, '22', '30', 'Transferencia bancaria', '2023-05-06 20:38:09', '2023-05-06 20:38:09'),
(17, '23', '50', 'Efectivo', '2023-05-10 22:05:42', '2023-05-10 22:05:42'),
(18, '23', '35', 'Transferencia bancaria', '2023-05-10 22:06:07', '2023-05-10 22:06:07'),
(19, '24', '160', 'Efectivo', '2023-05-10 22:16:12', '2023-05-10 22:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `date_create`, `date_update`) VALUES
(1, 'users.index', 'Ver usuarios', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(2, 'users.create', 'Crear usuarios', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(3, 'users.edit', 'Editar usuarios', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(4, 'users.delete', 'Eliminar usuarios', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(9, 'roles.index', 'Ver roles', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(10, 'roles.create', 'Crear roles', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(11, 'roles.edit', 'Editar roles', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(12, 'roles.delete', 'Eliminar roles', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(13, 'companies.index', 'Ver comañías', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(14, 'companies.create', 'Crear compañías', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(15, 'companies.edit', 'Editar compañías', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(16, 'companies.delete', 'Eliminar compañías', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(17, 'branch.index', 'Ver sucursal', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(18, 'branch.create', 'Crear sucursal', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(19, 'branch.edit', 'Editar sucursal', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(20, 'branch.delete', 'Eliminar sucursal', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(21, 'cities.index', 'Ver ciudad', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(22, 'cities.create', 'Crear ciudad', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(23, 'cities.edit', 'Editar ciudad', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(24, 'cities.delete', 'Eliminar ciudad', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(25, 'routes.index', 'Ver ruta', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(26, 'routes.create', 'Crear ruta', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(27, 'routes.edit', 'Editar ruta', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(28, 'routes.delete', 'Eliminar ruta', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(29, 'travels.index', 'Ver viaje', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(30, 'travels.create', 'Crear viaje', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(31, 'travels.edit', 'Editar viaje', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(32, 'travels.delete', 'Eliminar viaje', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(33, 'bus-type.index', 'Ver tipo de bus', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(34, 'bus-type.create', 'Crear tipo de bus', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(35, 'bus-type.edit', 'Editar tipo de bus', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(36, 'bus-type.delete', 'Eliminar tipo de bus', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(37, 'vehicle.delete', 'Eliminar vehículo', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(38, 'vehicle.index', 'Ver vehículo', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(39, 'vehicle.create', 'Crear vehículo', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(40, 'vehicle.edit', 'Editar vehículo', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(41, 'customers.delete', 'Eliminar cliente', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(42, 'customers.index', 'Ver cliente', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(43, 'customers.create', 'Crear cliente', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(44, 'customers.edit', 'Editar cliente', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(45, 'assign.delete', 'Eliminar asignación', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(46, 'assign.index', 'Ver asignación', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(47, 'assign.create', 'Crear asignación', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(48, 'assign.edit', 'Editar asignación', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(49, 'drivers.delete', 'Eliminar conductor', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(50, 'drivers.index', 'Ver conductor', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(51, 'drivers.create', 'Crear conductor', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(52, 'drivers.edit', 'Editar conductor', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(53, 'tickets.delete', 'Eliminar ticket', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(54, 'tickets.index', 'Ver ticket', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(55, 'tickets.create', 'Crear ticket', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(56, 'tickets.edit', 'Editar ticket', '2023-04-13 19:31:31', '2023-04-17 18:27:25'),
(57, 'cash.index', 'Ver caja', '2023-04-13 19:31:31', '2023-04-13 19:31:38'),
(58, 'cash.create', 'Crear caja', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(59, 'cash.edit', 'Editar caja', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(60, 'cash.delete', 'Eliminar caja', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(61, 'reports', 'Reportes', '2023-04-13 19:31:31', '2023-05-13 15:46:58'),
(62, 'reports.sales', 'Reporte de ventas', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(63, 'reports.cash', 'Reporte de caja', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(64, 'reports.passengers', 'Reporte de pasajeros', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(65, 'merchandise.create', 'Crear mercadería', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(66, 'merchandise.index', 'Lista de mercadería', '2023-04-13 19:31:31', '2023-04-13 20:01:04'),
(67, 'merchandise.price-per-kg', 'Establecer precio por kg', '2023-04-13 19:31:31', '2023-05-18 18:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `date_create`, `date_update`) VALUES
(1, 'admin', 'Administrador', '2023-04-13 19:15:27', '2023-04-13 20:06:43'),
(5, 'company', 'Compañía', '2023-04-13 19:15:27', '2023-04-13 20:06:43'),
(6, 'driver', 'Conductor', '2023-04-13 19:15:27', '2023-04-13 20:06:43'),
(7, 'employee', 'Empleado', '2023-04-13 19:15:27', '2023-04-26 15:08:07'),
(8, 'agent', 'Agente', '2023-04-13 19:15:27', '2023-04-26 15:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_permission` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `id_role`, `id_permission`, `date_create`, `date_update`) VALUES
(5, 1, 1, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(6, 1, 3, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(7, 1, 4, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(8, 1, 2, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(9, 1, 9, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(10, 1, 10, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(11, 1, 11, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(12, 1, 12, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(13, 1, 13, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(14, 1, 14, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(15, 1, 15, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(16, 1, 16, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(17, 1, 17, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(18, 1, 18, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(19, 1, 19, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(20, 1, 20, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(21, 1, 21, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(22, 1, 22, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(23, 1, 23, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(24, 1, 24, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(25, 1, 25, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(26, 1, 26, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(27, 1, 27, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(28, 1, 28, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(29, 1, 29, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(30, 1, 30, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(31, 1, 31, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(32, 1, 32, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(33, 1, 33, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(34, 1, 34, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(35, 1, 35, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(36, 1, 36, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(37, 1, 37, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(38, 1, 38, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(39, 1, 39, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(40, 1, 40, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(41, 1, 41, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(42, 1, 42, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(43, 1, 43, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(44, 1, 44, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(45, 1, 45, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(46, 1, 46, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(47, 1, 47, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(48, 1, 48, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(49, 1, 49, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(50, 1, 50, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(51, 1, 51, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(52, 1, 52, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(53, 1, 53, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(54, 1, 54, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(55, 1, 55, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(56, 1, 56, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(57, 1, 57, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(58, 1, 58, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(59, 1, 59, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(60, 1, 60, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(61, 1, 61, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(62, 1, 62, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(63, 1, 63, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(64, 1, 64, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(65, 1, 65, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(66, 1, 66, '2023-04-13 20:12:06', '2023-04-13 20:12:06'),
(67, 1, 67, '2023-04-13 20:12:06', '2023-04-13 20:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `destination` varchar(256) DEFAULT NULL,
  `origin` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `time` varchar(256) DEFAULT NULL,
  `distance` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `destination`, `origin`, `status`, `time`, `distance`, `date_create`, `date_update`) VALUES
(2, 'Caracas', 'Maracaibo', 'active', '12', '700', '2023-04-26 18:18:04', '2023-04-26 18:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(256) DEFAULT NULL,
  `id_assign` varchar(256) DEFAULT NULL,
  `id_sale` varchar(256) DEFAULT NULL,
  `id_company` varchar(256) DEFAULT NULL,
  `id_user` varchar(256) DEFAULT NULL,
  `seat` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `amount` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `id_customer`, `id_assign`, `id_sale`, `id_company`, `id_user`, `seat`, `status`, `amount`, `date_create`, `date_update`) VALUES
(13, '4', '1', '1', '3', '1', '05', '0', '80', '2023-05-05 15:06:06', '2023-05-05 15:43:33'),
(31, '22', '1', '19', '3', '1', '22', '0', '80', '2023-05-06 15:56:11', '2023-05-06 19:47:22'),
(32, '23', '1', '20', '3', '1', '06', '0', '80', '2023-05-06 19:16:46', '2023-05-06 19:47:22'),
(34, '24', '1', '22', '3', '1', '11', '0', '80', '2023-05-06 20:19:05', '2023-05-06 20:19:05'),
(35, '23', '3', '23', '3', '1', '01', '0', '80', '2023-05-10 21:56:52', '2023-05-10 21:56:52'),
(36, '24', '3', '24', '3', '1', '02', '0', '80', '2023-05-10 22:15:39', '2023-05-10 22:15:39'),
(37, '4', '3', '24', '3', '1', '03', '0', '80', '2023-05-10 22:15:39', '2023-05-10 22:15:39'),
(38, '4', '1', '25', '3', '1', '10', '0', '80', '2023-05-18 00:12:54', '2023-05-18 00:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `time` varchar(256) DEFAULT NULL,
  `days` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `stops` varchar(256) DEFAULT NULL,
  `id_route` varchar(256) DEFAULT NULL,
  `id_company` varchar(256) DEFAULT NULL,
  `price` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `time`, `days`, `status`, `stops`, `id_route`, `id_company`, `price`, `date_create`, `date_update`) VALUES
(2, '12:00', '[\"monday\",\"tuesday\",\"wednesday\",\"thursday\",\"friday\"]', 'active', '[\"Barquisimeto\"]', '2', '3', '80', '2023-04-26 18:19:26', '2023-05-13 16:24:14'),
(3, '12:00', '[\"monday\"]', 'active', '[\"Maracaibo\"]', '2', '3', '100', '2023-05-10 21:37:03', '2023-05-13 16:24:15'),
(4, '22:00', '[\"monday\",\"tuesday\",\"wednesday\",\"thursday\",\"friday\",\"saturday\",\"sunday\"]', 'active', '[\"Maracaibo\",\"Caracas\",\"Barquisimeto\"]', '2', '3', '150', '2023-05-10 21:46:38', '2023-05-11 08:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_company` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL,
  `oauth` varchar(256) DEFAULT NULL,
  `hash` varchar(256) DEFAULT NULL,
  `extra` text,
  `cash_last_close` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `name`, `email`, `password`, `id_company`, `role`, `oauth`, `hash`, `extra`, `cash_last_close`, `date_create`, `date_update`) VALUES
(1, NULL, 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '3', 'admin', NULL, 'c4ca4238a0b923820dcc509a6f75849b', NULL, '2023-05-08 18:00:07', '2023-04-11 17:18:41', '2023-05-10 17:24:50'),
(4, NULL, 'Rasth', 'nisadelgado@gmail.com', 'd7b90bfe586df34ce1727d9d26e9aee4', '3', 'company', NULL, NULL, NULL, NULL, '2023-04-17 20:18:50', '2023-04-17 20:20:48'),
(6, NULL, 'Conductor 1', 'conductor@grupounebus.com', '202cb962ac59075b964b07152d234b70', '', 'driver', NULL, '1679091c5a880faf6fb5e6087eb1b2dc', '{\"name\":\"Conductor 1\",\"license\":\"123\",\"driver_license\":\"123\",\"phone\":\"123\",\"address\":\"123\",\"photo\":\"cpvDS0KU_400x400.jpg\"}', NULL, '2023-04-26 18:15:22', '2023-04-26 18:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `id_type` varchar(256) DEFAULT NULL,
  `internal_number` varchar(256) DEFAULT NULL,
  `plate` varchar(256) DEFAULT NULL,
  `year` varchar(256) DEFAULT NULL,
  `model` varchar(256) DEFAULT NULL,
  `chasis_number` varchar(256) DEFAULT NULL,
  `owner` varchar(256) DEFAULT NULL,
  `owner_phone` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `id_type`, `internal_number`, `plate`, `year`, `model`, `chasis_number`, `owner`, `owner_phone`, `status`, `date_create`, `date_update`) VALUES
(1, '1', '987', 'a1b2c3', '2018', 'Ford C10', 'dajshd4143', 'Fulatino de Tal', '123', 'active', '2023-04-26 18:28:36', '2023-04-26 18:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_type`
--
ALTER TABLE `bus_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_type`
--
ALTER TABLE `bus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
