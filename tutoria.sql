-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2021 a las 16:41:06
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27
use tutoria;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoria`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS tutoralumno;
DROP TABLE IF EXISTS objetivos;
DROP TABLE IF EXISTS tareas;
DROP TABLE IF EXISTS tutors;
DROP TABLE IF EXISTS alumnos;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS failed_jobs;
DROP TABLE IF EXISTS migrations;
DROP TABLE IF EXISTS password_resets;
DROP TABLE IF EXISTS personal_access_tokens;
DROP TABLE IF EXISTS sessions;
DROP TABLE IF EXISTS team_invitations;
DROP TABLE IF EXISTS team_user;
DROP TABLE IF EXISTS teams;
DROP TABLE IF EXISTS users;
--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` bigint(20) UNSIGNED NOT NULL,
  `nombre_alumno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_alumno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento_alumno` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telefono_alumno` int(11) NOT NULL,
  `email_alumno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_alumno` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `apellido_alumno`, `fecha_nacimiento_alumno`, `telefono_alumno`, `email_alumno`, `password_alumno`, `created_at`, `updated_at`) VALUES
(2, 'Andree', 'Aguilera', '2021-05-03 01:42:40', 998380241, 'mario@gmail.com', '12345678', '2021-05-03 06:42:40', '2021-05-03 06:42:40'),
(3, 'Adrian', 'Hernandez', '1990-05-19 23:00:00', 2312312, 'adrian@hotmail.com', '12345678', '2021-05-07 03:53:54', '2021-05-07 04:00:48'),
(4, 'Camilo', 'Rodriguez', '2021-05-06 22:54:21', 12312312, 'camilo1@hotmail.com', '12345678', '2021-05-07 03:54:21', '2021-05-07 03:54:21'),
(5, 'Gabriel', 'Herrera', '1995-05-29 22:58:00', 998380241, 'gabriel@hotmail.com', '12345678', '2021-05-07 03:58:43', '2021-05-07 03:58:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_categoria` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dificultad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `dificultad`, `created_at`, `updated_at`) VALUES
(1, 'Lenguaje', 'Materia enfocada en la ortografía y caligrafía', 'Principiante', '2021-05-03 07:34:04', '2021-05-03 07:34:04'),
(3, 'Física', 'Materia enfocada en las leyes que explican los componentes fundamentales del Universo', 'Medio', '2021-05-07 03:30:39', '2021-05-07 04:13:51'),
(4, 'Matemática', 'Materia enfocada en los números', 'Avanzado', '2021-05-07 03:32:28', '2021-05-07 04:12:20'),
(5, 'Lenguaje', 'Materia enfocada en la ortografía y caligrafía', 'Medio', '2021-05-07 04:20:43', '2021-05-07 04:20:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_04_25_125338_create_sessions_table', 1),
(10, '2021_04_25_214103_create_categorias_table', 1),
(11, '2021_04_25_214227_create_tutors_table', 1),
(12, '2021_04_25_214290_create_alumnos_table', 1),
(13, '2021_04_25_214351_create_objetivos_table', 1),
(14, '2021_04_25_215620_create_tareas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos`
--

CREATE TABLE `objetivos` (
  `id_objetivo` bigint(20) UNSIGNED NOT NULL,
  `nombre_objetivo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_objetivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_objetivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_id_alumno` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id_tutor` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `objetivos`
--

INSERT INTO `objetivos` (`id_objetivo`, `nombre_objetivo`, `descripcion_objetivo`, `estado_objetivo`, `alumno_id_alumno`, `tutor_id_tutor`, `created_at`, `updated_at`) VALUES
(1, 'Objetivo #1', 'Enviar 5 tareas', 'Por completar', 2, 1, '2021-05-03 07:47:35', '2021-05-03 07:47:35'),
(3, 'Objetivo #2', 'Obtener una calificacion de 10 en 2 o mas tareas', 'Por completar', 3, 3, '2021-05-07 04:06:56', '2021-05-07 04:06:56'),
(4, 'Objetivo #3', 'Enviar 10 tareas', 'Por completar', 3, 1, '2021-05-07 07:02:29', '2021-05-07 07:02:29');

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
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('InWBgOnNSkD91iDHHIy2CQFu2MJ5wAovbwTVelRr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUVJIMHl0SFFCSndkYlQ1b2dIQjZqWWpSZFQ3NEhPeGJlZGo4MjVXQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90YXJlYXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbjBTMnhnZS5lOVZJbkhmamJvY0M5ZTdGdkk0bW0zdHU1WFdWNkNSbXpRZnZsOE54bmNvLjIiO30=', 1620352985);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` bigint(20) UNSIGNED NOT NULL,
  `nombre_tarea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_tarea` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_tarea` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_entrega` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `calificacion_tarea` decimal(5,2) DEFAULT NULL,
  `comentarios_tarea` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entregable_tarea` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alumno_id_alumno` bigint(20) UNSIGNED DEFAULT NULL,
  `tutor_id_tutor` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `nombre_tarea`, `descripcion_tarea`, `estado_tarea`, `fecha_entrega`, `calificacion_tarea`, `comentarios_tarea`, `entregable_tarea`, `alumno_id_alumno`, `tutor_id_tutor`, `created_at`, `updated_at`) VALUES
(1, 'Tarea #1', 'Realizar 1 ensayo sobre la revolucion ciudadana', 'Completado', '2021-05-06 22:35:34', '10.00', 'Minimo 500 palabras', NULL, 2, 1, '2021-05-03 07:50:28', '2021-05-07 03:35:34'),
(2, 'Tarea #2', 'Resolver los ejercicios del libro', 'Por completar', '2021-05-06 23:04:37', NULL, 'Link del libro: https://cms.dm.uba.ar/material/paenza/libro7/matematica_para_todos.pdf', NULL, 4, 3, '2021-05-07 04:03:41', '2021-05-07 04:04:37'),
(3, 'Tarea #3', 'Realizar 2 ensayos sobre la revolucion ciudadana', 'Por completar', '2021-05-22 03:00:00', NULL, 'Minimo 500 palabras', NULL, 3, 1, '2021-05-07 07:03:05', '2021-05-07 07:03:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES(1, 1, 'Mario\'s Team', 1, '2021-05-01 05:07:52', '2021-05-01 05:07:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors`
--

CREATE TABLE `tutors` (
  `id_tutor` bigint(20) UNSIGNED NOT NULL,
  `nombre_tutor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_tutor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento_tutor` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_tutor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_tutor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_tutor` int(11) NOT NULL,
  `formacion_academica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorias_id_categoria` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tutors`
--

INSERT INTO `tutors` (`id_tutor`, `nombre_tutor`, `apellido_tutor`, `fecha_nacimiento_tutor`, `email_tutor`, `password_tutor`, `telefono_tutor`, `formacion_academica`, `categorias_id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Jorge', 'Barthelotti', '2021-05-06 22:31:22', 'jorge@hotmail.com', '12345678', 98883492, 'Bachillerato, Titulo Universitario en Comunicaciones', 1, '2021-05-03 07:38:28', '2021-05-07 03:31:22'),
(3, 'Daniela', 'Gomez', '1995-03-06 22:54:00', 'daniela@hotmail.com', '12345678', 894328490, 'Bachillerato, Titulo Universitario en Fisica', 3, '2021-05-07 03:55:38', '2021-05-07 03:55:38'),
(4, 'Mario', 'Jacome', '1996-02-20 05:04:00', 'mari2@hotmail.com', '12345678', 98737373, 'Bachillerato, Titulo Universitario en Fisica', 3, '2021-05-07 07:01:57', '2021-05-07 07:01:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES(1, 'Mario', 'mario-andree@hotmail.com', NULL, '$2y$10$n0S2xge.e9VInHfjbocC9e7FvI4mm3tu5XWV6CRmzQfvl8Nxnco.2', NULL, NULL, 'sOQSPVxgD9v9CzgCFPXlGzrZez58WHoAzDwYCXn2wATlMVAOnLAU1xEb7fNm', 1, NULL, '2021-05-01 05:07:52', '2021-05-01 05:07:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoralumno`
--

CREATE TABLE `tutoralumno` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6,
  `id_tutor` bigint(20) UNSIGNED NOT NULL,
  `id_alumno` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `tutoralumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutoralumno_alumno` (`id_alumno`),
  ADD KEY `tutoralumno_tutor` (`id_tutor`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id_objetivo`),
  ADD KEY `objetivos_alumno_id_alumno_foreign` (`alumno_id_alumno`),
  ADD KEY `objetivos_tutor_id_tutor_foreign` (`tutor_id_tutor`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `tareas_alumno_id_alumno_foreign` (`alumno_id_alumno`),
  ADD KEY `tareas_tutor_id_tutor_foreign` (`tutor_id_tutor`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indices de la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `tutors_categorias_id_categoria_foreign` (`categorias_id_categoria`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `objetivos`
--
ALTER TABLE `objetivos`
  MODIFY `id_objetivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id_tutor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tutoralumno`
--
ALTER TABLE `tutoralumno`
  ADD CONSTRAINT `tutoralumno_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutoralumno_tutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `objetivos`
--
ALTER TABLE `objetivos`
  ADD CONSTRAINT `objetivos_alumno_id_alumno_foreign` FOREIGN KEY (`alumno_id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `objetivos_tutor_id_tutor_foreign` FOREIGN KEY (`tutor_id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_alumno_id_alumno_foreign` FOREIGN KEY (`alumno_id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `tareas_tutor_id_tutor_foreign` FOREIGN KEY (`tutor_id_tutor`) REFERENCES `tutors` (`id_tutor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_categorias_id_categoria_foreign` FOREIGN KEY (`categorias_id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
