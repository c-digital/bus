-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2023 at 06:42 PM
-- Server version: 5.7.41
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `unebus_v2`
--

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
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(16, 'companies.delete', 'Eliminar compañías', '2023-04-13 19:31:31', '2023-04-17 18:27:25');

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
(1, 'admin', 'Administrador', '2023-04-13 19:15:27', '2023-04-13 20:06:43');

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
(16, 1, 16, '2023-04-13 20:12:06', '2023-04-13 20:12:06');

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
(1, NULL, 'Administrador', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', '1', NULL, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-11 17:18:41', '2023-04-14 13:20:44');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
