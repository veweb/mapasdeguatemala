-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Servidor: 10.123.0.223:3306
-- Tiempo de generación: 04-05-2016 a las 03:12:12
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
