-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Servidor: 10.123.0.223:3306
-- Tiempo de generación: 04-05-2016 a las 03:25:02
-- Versión del servidor: 5.6.27
-- Versión de PHP: 5.4.45-0+deb7u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mapas_plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(10) unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `pais_id` int(10) unsigned NOT NULL DEFAULT '1',
  `departamento_id` int(10) unsigned NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `mapa_id` int(10) unsigned NOT NULL,
  `posicion_mapa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `imagen` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `descripcion`, `enlace`, `estado`, `pais_id`, `departamento_id`, `municipio_id`, `categoria_id`, `mapa_id`, `posicion_mapa`, `created_at`, `updated_at`, `imagen`, `tipo_usuario`, `usuario_id`) VALUES
(30, 'El Bistro', 'Especialidad bebidas en base a café. CC Plaza Magdalena - Área Food Court - Tel. 7952-2240', 'http://www.mapasdeguatemala.com', 1, 1, 11, 12, 2, 32, '267,630', '2016-02-24 17:53:38', '2016-02-24 17:53:38', 'bistro.png', 0, 4),
(31, 'Casa Q''eqchi''', 'Hotel en Coban', 'http://www.hotelencoban.com/', 1, 1, 11, 12, 1, 32, '1496.500244140625,429.8092498779297', '2016-02-25 09:03:02', '2016-02-25 09:03:02', 'casa qekchi.jpg', 0, 4),
(32, 'Casa Dieseldorff', '3ra. calle 4-12 zona 2, Cobán. Tel.:(502) 7951-0632, E-mail: casadieseldorff@gmail.com', 'https://www.facebook.com/casadieseldorff', 0, 1, 11, 15, 2, 35, '1047,545', '2016-02-25 09:06:08', '2016-03-16 12:02:21', 'CASA-DIESERDOFF.png', 0, 4),
(33, 'La Posada', '1ra calle 4-12 zona 2, Cobán A.V. Tel.:(502) 9752-1495 / 7951-0588, E-mail: laposada@c.net.gt', 'http://laposadacoban.com.gt/', 0, 1, 11, 12, 1, 32, '975,482', '2016-02-25 09:11:26', '2016-03-16 12:19:44', 'la-posada.png', 0, 4),
(34, 'Casa Gaia', 'RESTAURANTE - HOTEL', 'http://hotelcasagaia.com/pages/es/inicio.php#.Vs8Z6fl_Oko', 1, 1, 11, 12, 1, 32, '1161,76', '2016-02-25 09:14:48', '2016-02-25 09:14:48', 'gaia.jpg', 0, 4),
(35, 'Casa D'' Acuña', 'RESTAURANTE y EXPOSICIÓN PERMANENTE DE ORQUÍDEAS', 'http://casadeacuna.com/', 1, 1, 11, 12, 2, 32, '1110,536', '2016-02-25 09:17:19', '2016-02-25 09:17:19', 'de acuña.jpg', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Hoteles', '2015-12-10 21:09:34', '2015-12-10 21:09:34'),
(2, 'Restaurantes', '2015-12-10 21:09:45', '2015-12-10 21:09:45'),
(3, 'Tours', '2015-12-10 21:09:52', '2015-12-10 21:09:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(10) unsigned NOT NULL,
  `pais_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `pais_id`, `nombre`, `created_at`, `updated_at`) VALUES
(11, 1, 'Alta Verapaz', '2016-02-09 13:15:03', '2016-02-09 13:15:03'),
(14, 1, 'Baja Verapaz', '2016-03-15 07:07:05', '2016-03-15 07:07:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapaslugares`
--

CREATE TABLE IF NOT EXISTS `mapaslugares` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `pais_id` int(10) unsigned NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `municipio_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mapaslugares`
--

INSERT INTO `mapaslugares` (`id`, `nombre`, `imagen`, `estado`, `pais_id`, `departamento_id`, `municipio_id`, `created_at`, `updated_at`) VALUES
(32, 'Cobán', 'coban.jpg', 1, 1, 11, 12, '2016-02-09 13:22:06', '2016-02-09 13:22:06'),
(35, 'Verapaces', 'verapaces_map.jpg', 1, 1, 11, 15, '2016-03-15 07:04:24', '2016-03-15 07:04:24'),
(36, 'Bosque Nuboso', 'bosque_nuboso.jpg', 1, 1, 14, 17, '2016-03-15 07:28:54', '2016-03-15 07:28:54'),
(37, 'Semuc Champey', 'semuc_champey.jpg', 1, 1, 11, 18, '2016-03-15 08:34:10', '2016-03-15 08:34:10'),
(38, 'Chisec', 'chisec_.jpg', 1, 1, 11, 19, '2016-03-15 08:34:46', '2016-03-15 08:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_07_163800_create_thumbnails_table', 2),
('2015_12_08_162953_create_pais_table', 3),
('2015_12_08_163144_create_departamentos_table', 4),
('2015_12_08_163215_create_municipios_table', 5),
('2015_12_08_163711_create_mapasimagenes_table', 6),
('2015_12_08_163843_create_tipo_negocios_table', 7),
('2015_12_08_164549_create_tiponegocios_table', 8),
('2015_12_08_164624_create_categorias_table', 9),
('2015_12_09_092424_update_departamentos_table', 10),
('2015_12_09_094506_update_departamentos_table', 11),
('2015_12_09_094546_update_municipios_table', 11),
('2015_12_09_103308_create_pais_table', 12),
('2015_12_09_104425_create_departamentos_table', 13),
('2015_12_09_104505_create_municipios_table', 14),
('2015_12_09_144954_create_pais_table', 15),
('2015_12_09_145126_create_departamentos_table', 16),
('2015_12_09_153050_create_municipios_table', 17),
('2015_12_09_155708_create_mapaslugares_table', 18),
('2015_12_10_150136_create_tiponegocios_table', 19),
('2015_12_10_150211_create_categorias_table', 20),
('2015_12_10_160403_create_anuncios_table', 21),
('2016_01_04_230250_add_imagen_to_anuncios_table', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(10) unsigned NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `departamento_id`, `nombre`, `created_at`, `updated_at`) VALUES
(12, 11, 'Cobán Cabecera', '2016-02-09 13:20:59', '2016-02-09 13:20:59'),
(15, 11, 'Verapaces', '2016-03-15 07:03:43', '2016-03-15 07:03:43'),
(17, 14, 'Purulhá', '2016-03-15 07:28:07', '2016-03-15 07:28:07'),
(18, 11, 'Lanquín', '2016-03-15 08:26:04', '2016-03-15 08:26:04'),
(19, 11, 'Chisec', '2016-03-15 08:26:36', '2016-03-15 08:26:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) unsigned NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 502, 'Guatemala', '2015-12-09 20:56:25', '2015-12-09 20:56:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponegocios`
--

CREATE TABLE IF NOT EXISTS `tiponegocios` (
  `id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `tipo_usuario`) VALUES
(1, 'Administrator', 'walter.rosales@gmail.com', '$2y$10$6kRlCndjFzUHo69yr.xTvuQjQ5kwGz7d5ojGq.6Hn6Zx2RDmAb5pW', 'TQMNYOgDmey4eUQk3qn06N4xvuvObax2wADkTMHXx3WqAzyaPgclm8rTg7sT', '0000-00-00 00:00:00', '2016-02-09 15:33:38', 1),
(4, 'Juan Arturo Perez', 'mercadeo@mapasdeguatemala.com', '$2y$10$fUDzi8Bpud3gb9vO8id73uxOFWSzCwkMZ2OxxT7kScjcV/GuLC0EG', 'wsSPgv1tZb38rpGs8U3o46b6fH44ymbgserQJnvTza5qS0Hmm0de8wQWZGoh', '2016-01-07 17:31:54', '2016-02-09 14:08:32', 1),
(5, 'REne Prueba', 'rene.nmrosales@gmail.com', '$2y$10$XwzwTnAguReOzcU/XII19.fRoNU1jvzK9w2xvI4FdB2IZnguwYRKe', 'H5qNd4lLdzHiZOoBnAUrpYb9Kzio28GdSxE8epwqLq9eocboABcnP7KWFuhE', '2016-02-04 09:16:35', '2016-02-04 09:18:05', 2),
(6, 'Juan Arturo Perez', 'japerez@computodoshop.com', '$2y$10$expN/6VJ1wS/dgHq49ZzyOzb.up48LW4ye2oCaDbfCuIabqN8Ke0G', 'YiHzlvukJQ2v3zKI19kMfTZFKCQHfO0A8x5Fl5YA9y98i01SpkLoS1lFWUg9', '2016-02-05 09:34:41', '2016-02-05 10:14:42', 2),
(7, 'Jorge Pérez', 'mercadeo@guatemarket.com', '$2y$10$PuTQtnnUBTnsziKziQjobeLlPcfKNLCUmGtHyVX1SevtsXVcLDaIC', NULL, '2016-02-17 19:11:21', '2016-02-17 19:11:21', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`), ADD KEY `anuncios_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`), ADD KEY `departamentos_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `mapaslugares`
--
ALTER TABLE `mapaslugares`
  ADD PRIMARY KEY (`id`), ADD KEY `mapaslugares_pais_id_foreign` (`pais_id`), ADD KEY `mapaslugares_departamento_id_foreign` (`departamento_id`), ADD KEY `mapaslugares_municipio_id_foreign` (`municipio_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`), ADD KEY `municipios_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `tiponegocios`
--
ALTER TABLE `tiponegocios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `mapaslugares`
--
ALTER TABLE `mapaslugares`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tiponegocios`
--
ALTER TABLE `tiponegocios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
ADD CONSTRAINT `anuncios_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
ADD CONSTRAINT `departamentos_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mapaslugares`
--
ALTER TABLE `mapaslugares`
ADD CONSTRAINT `mapaslugares_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `mapaslugares_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `mapaslugares_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
ADD CONSTRAINT `municipios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
