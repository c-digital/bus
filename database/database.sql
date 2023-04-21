-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2023 at 02:36 PM
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
(1, 'Maracaibo', '2023-04-17 22:38:02', '2023-04-17 22:38:02');

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(40, 'vehicle.edit', 'Editar vehículo', '2023-04-13 19:31:31', '2023-04-17 18:27:25');

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
(5, 'company', 'Compañía', '2023-04-13 19:15:27', '2023-04-13 20:06:43');

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
(40, 1, 40, '2023-04-13 20:12:06', '2023-04-13 20:12:06');

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
  `route` varchar(256) DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `name`, `email`, `password`, `id_company`, `role`, `oauth`, `hash`, `date_create`, `date_update`) VALUES
(1, NULL, 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin', NULL, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-11 17:18:41', '2023-04-17 19:02:55'),
(4, NULL, 'Rasth', 'nisadelgado@gmail.com', 'd7b90bfe586df34ce1727d9d26e9aee4', '3', 'company', NULL, NULL, '2023-04-17 20:18:50', '2023-04-17 20:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `type` varchar(256) DEFAULT NULL,
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
-- Indexes for dumped tables
--

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_type`
--
ALTER TABLE `bus_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
