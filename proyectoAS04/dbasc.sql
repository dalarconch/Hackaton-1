-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2018 a las 07:45:01
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbasn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'App\\Permission model has been created', 1, 'App\\Permission', 1, 'App\\User', '[]', '2018-09-21 03:44:28', '2018-09-21 03:44:28'),
(2, 'default', 'App\\Role model has been created', 1, 'App\\Role', 1, 'App\\User', '[]', '2018-09-21 03:44:46', '2018-09-21 03:44:46'),
(3, 'default', 'App\\Permission model has been created', 2, 'App\\Permission', 1, 'App\\User', '[]', '2018-09-21 03:45:08', '2018-09-21 03:45:08'),
(4, 'default', 'App\\Role model has been created', 2, 'App\\Role', 1, 'App\\User', '[]', '2018-09-21 03:45:35', '2018-09-21 03:45:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre_archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informacion_adicional` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `pdf`, `created_at`, `updated_at`, `nombre_archivo`, `informacion_adicional`) VALUES
(24, '1537404878Malla ICI.pdf', '2018-09-20 00:54:38', '2018-09-24 03:34:52', 'Pauta Evaluación 2018', 'Pauta para la evaluación de un nuevo proyecto ingresado el año 2018'),
(25, '1537406260Malla ICI.pdf', '2018-09-20 01:17:40', '2018-09-20 22:00:28', 'Pauta Proyecto Construcción', 'Pauta 2'),
(26, '1537474876Malla ICI.pdf', '2018-09-20 20:21:16', '2018-09-20 22:00:48', 'Pauta Proyecto Agropecuario', 'jkaskjas'),
(27, '1537474885Malla ICI.pdf', '2018-09-20 20:21:25', '2018-09-20 22:01:06', 'Pauta Estudiantes UCM', 'lksalklk'),
(28, '1537474895Malla ICI.pdf', '2018-09-20 20:21:35', '2018-09-20 22:01:22', 'Pauta 2017', 'klsaklskl'),
(29, '1537474904Malla ICI.pdf', '2018-09-20 20:21:44', '2018-09-20 22:01:40', 'Pauta 2019', 'klsaklaskl'),
(30, '1537474914Malla ICI.pdf', '2018-09-20 20:21:54', '2018-09-20 22:01:56', 'Pauta Proyectos Nuevos', 'salkjiqw'),
(31, '1537474928Malla ICI.pdf', '2018-09-20 20:22:08', '2018-09-20 20:22:08', 'qwihasjkmn', 'ksankjni'),
(32, '1537474938Malla ICI.pdf', '2018-09-20 20:22:18', '2018-09-20 20:22:18', 'akshsjknj', 'ksaiq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `id_facultad` int(10) UNSIGNED NOT NULL,
  `id_universidad` int(11) NOT NULL,
  `nombre_curso` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `id_facultad`, `id_universidad`, `nombre_curso`, `created_at`, `updated_at`) VALUES
(3, 32, 2, 'Calidad y Prod. de Software', '2018-09-22 18:54:40', '2018-09-22 18:54:40'),
(5, 32, 2, 'Teoría de Autómatas', '2018-09-22 19:17:07', '2018-09-22 19:17:07'),
(6, 24, 3, 'Anatomía', '2018-09-22 19:45:36', '2018-09-22 19:45:36'),
(7, 24, 2, 'Medico', '2018-09-24 05:03:22', '2018-09-24 05:03:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_universidad` int(11) NOT NULL DEFAULT '1',
  `nombre_facultad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_facultad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultads`
--

CREATE TABLE `facultads` (
  `id` int(11) NOT NULL,
  `id_universidad` int(11) NOT NULL,
  `nombre_facultad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_facultad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facultads`
--

INSERT INTO `facultads` (`id`, `id_universidad`, `nombre_facultad`, `area_facultad`, `created_at`, `updated_at`) VALUES
(24, 2, 'Facultad de Medicina', 'Salud', '2018-09-22 18:32:28', '2018-09-22 18:32:28'),
(25, 2, 'Facultad de Ciencias de la Educación', 'Educacion', '2018-09-22 18:34:15', '2018-09-22 18:34:15'),
(26, 2, 'Facultad de Ciencias de la Salud', 'Salud', '2018-09-22 18:34:37', '2018-09-22 18:34:37'),
(27, 2, 'Facultad de Ciencias de la Ingeniería', 'Ingenieria', '2018-09-22 18:35:20', '2018-09-22 18:35:20'),
(28, 2, 'Facultad de Ciencias Sociales y Económicas', 'Economia y Negocios', '2018-09-22 18:35:40', '2018-09-22 18:35:40'),
(29, 2, 'Facultad de Ciencias Agrarias y Forestales', 'Educacion', '2018-09-22 18:36:28', '2018-09-22 18:36:28'),
(30, 2, 'Facultad de Ciencias Básicas', 'Educacion', '2018-09-22 18:36:49', '2018-09-22 18:36:49'),
(31, 2, 'Facultad de Ciencias Religiosas y Filosóficas', 'Educacion', '2018-09-22 18:37:16', '2018-09-22 18:37:16'),
(32, 3, 'Facultad de Ciencias de la Ingeniería', 'Ingenieria', '2018-09-22 18:48:27', '2018-09-22 18:48:27'),
(33, 3, 'Facultad de Artes', 'Educacion', '2018-09-24 04:34:54', '2018-09-24 04:34:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_17_030254_create_users_table', 2),
(4, '2018_09_17_033041_create_users_table', 3),
(5, '2018_09_18_174333_create_facultads_table', 4),
(6, '2018_09_18_181611_create_facultads_table', 5),
(7, '2018_09_18_232018_subir_archivos', 6),
(8, '2018_09_18_233226_agregarnombre', 7),
(9, '2018_09_19_143912_agregarinformacion', 8),
(10, '2016_01_01_193651_create_roles_permissions_tables', 9),
(11, '2018_08_01_183154_create_pages_table', 9),
(12, '2018_08_04_122319_create_settings_table', 9),
(13, '2018_09_21_001518_create_activity_log_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin', '2018-09-21 03:44:27', '2018-09-21 03:44:27'),
(2, 'Coordinador', 'Coordinador', '2018-09-21 03:45:08', '2018-09-21 03:45:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Admin', '2018-09-21 03:44:46', '2018-09-21 03:44:46'),
(2, 'Coordinador', 'Coordinador', '2018-09-21 03:45:35', '2018-09-21 03:45:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(2, 1),
(2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociocomunitario`
--

CREATE TABLE `sociocomunitario` (
  `id` int(11) NOT NULL,
  `nombre_socio` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sociocomunitario`
--

INSERT INTO `sociocomunitario` (`id`, `nombre_socio`, `created_at`, `updated_at`) VALUES
(2, 'Construcción', '2018-09-21 01:24:39', '2018-09-21 01:24:39'),
(3, 'Jardín Infantil 1', '2018-09-24 04:38:32', '2018-09-24 04:39:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE `universidades` (
  `id` int(11) NOT NULL,
  `nombre_universidad` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `informacion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id`, `nombre_universidad`, `informacion`, `created_at`, `updated_at`) VALUES
(2, 'Universidad Católica del Maule', 'Ubicada en Avenida San Miguel, Talca', '2018-09-20 21:20:53', '2018-09-20 21:20:53'),
(3, 'Universidad de Talca', 'Ubicada en Avenida Lircay', '2018-09-21 15:49:57', '2018-09-21 15:49:57'),
(4, 'Universidad Autónoma de Chile', 'Información Adicional', '2018-09-21 19:30:42', '2018-09-21 19:30:42'),
(5, 'Universidad de Chile', 'Santiago', '2018-09-21 19:31:02', '2018-09-21 19:31:02'),
(6, 'Pontificia Universidad Católica de Chile', 'Santiago', '2018-09-21 19:31:37', '2018-09-21 19:31:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rut` int(11) NOT NULL,
  `rol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Administrador',
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rut`, `rol`, `nombre`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 18656310, 'Administrador', 'Nicolas duran', 'nico@asd.cl', '$2y$10$d6LKqIDlNEH0WJ6cei3oPOiiNB0XEJHleA1B3/M2FB7hog1oTsyvK', '0nZMHIap0L3NaTUZPOisTPIsIZV9t9GYzIkNTFt0pUkiGWrqUUdmTKTeIXTr', '2018-09-17 06:54:23', '2018-09-21 15:55:43'),
(3, 18656310, 'Administrador', 'Evo Morales', 'evo@asd.cl', '$2y$10$E4ArhHT1A9M6M5SONnAfyO7UrkXfEKZrSFerH/avppwO.XsAmj6TC', '06Jzi6vS66tqSNj6W10N8zT243M5XgfYCVX4odSsEbd7w6evC0OCl2jQ8vvx', '2018-09-21 04:07:52', '2018-09-21 04:07:52'),
(4, 14565210, 'Administrador', 'Piñera', 'pinera@asd.cl', '$2y$10$UMK55AHUj0QA4525Qakvj.8tHeCLKdJbikkRKO/ZobFBfROZJtvvO', 'gNSYGTexZwznbOfqMpcSwZvO8eib5qYPWjLuiaxQqfe3us6TcTLrFiGSiWLx', '2018-09-21 04:14:21', '2018-09-21 04:14:21'),
(1, 18656310, 'Administrador', 'Nicolas duran', 'nico@asd.cl', '$2y$10$d6LKqIDlNEH0WJ6cei3oPOiiNB0XEJHleA1B3/M2FB7hog1oTsyvK', '0nZMHIap0L3NaTUZPOisTPIsIZV9t9GYzIkNTFt0pUkiGWrqUUdmTKTeIXTr', '2018-09-17 06:54:23', '2018-09-21 15:55:43'),
(3, 18656310, 'Administrador', 'Evo Morales', 'evo@asd.cl', '$2y$10$E4ArhHT1A9M6M5SONnAfyO7UrkXfEKZrSFerH/avppwO.XsAmj6TC', '06Jzi6vS66tqSNj6W10N8zT243M5XgfYCVX4odSsEbd7w6evC0OCl2jQ8vvx', '2018-09-21 04:07:52', '2018-09-21 04:07:52'),
(4, 14565210, 'Administrador', 'Piñera', 'pinera@asd.cl', '$2y$10$UMK55AHUj0QA4525Qakvj.8tHeCLKdJbikkRKO/ZobFBfROZJtvvO', 'gNSYGTexZwznbOfqMpcSwZvO8eib5qYPWjLuiaxQqfe3us6TcTLrFiGSiWLx', '2018-09-21 04:14:21', '2018-09-21 04:14:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_fk_id_universidad` (`id_universidad`),
  ADD KEY `cursos_fk_id_facultad` (`id_facultad`) USING BTREE;

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultads`
--
ALTER TABLE `facultads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultad_fk_id_universidad` (`id_universidad`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indices de la tabla `sociocomunitario`
--
ALTER TABLE `sociocomunitario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `facultads`
--
ALTER TABLE `facultads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sociocomunitario`
--
ALTER TABLE `sociocomunitario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
