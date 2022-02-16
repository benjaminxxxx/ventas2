-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-02-2022 a las 19:44:12
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedidos`
--

CREATE TABLE `detallepedidos` (
  `id` int(5) NOT NULL,
  `pedido_id` int(4) NOT NULL,
  `menu_id` int(4) NOT NULL,
  `menu_titulo` varchar(255) NOT NULL,
  `menu_precio` double NOT NULL,
  `menu_cantidad` int(3) NOT NULL,
  `menu_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallepedidos`
--

INSERT INTO `detallepedidos` (`id`, `pedido_id`, `menu_id`, `menu_titulo`, `menu_precio`, `menu_cantidad`, `menu_subtotal`) VALUES
(2, 6, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(3, 7, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(9, 5, 1, 'POLLO A LA PLANCHA', 16.5, 3, 49.5),
(11, 9, 1, 'POLLO A LA PLANCHA', 16.5, 5, 82.5),
(13, 12, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(14, 11, 1, 'POLLO A LA PLANCHA', 16.5, 3, 49.5),
(15, 13, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(16, 14, 1, 'POLLO A LA PLANCHA', 16.5, 5, 82.5),
(17, 15, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(19, 8, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(20, 10, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(21, 16, 1, 'POLLO A LA PLANCHA', 16.5, 6, 99),
(22, 17, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(23, 18, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(24, 19, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(25, 20, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(26, 21, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(27, 22, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(28, 23, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(29, 24, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(30, 25, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(31, 26, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(32, 27, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(33, 28, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(34, 29, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(35, 30, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(36, 31, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(37, 32, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(38, 33, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(39, 34, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(40, 35, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(41, 36, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(42, 37, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(43, 38, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(44, 39, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(45, 40, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(46, 42, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(47, 43, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(48, 44, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(49, 45, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(50, 46, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(51, 47, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(52, 48, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(53, 49, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(54, 51, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(55, 52, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(56, 53, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(57, 64, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(58, 65, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(59, 66, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(60, 67, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(61, 68, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(62, 69, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(63, 70, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(64, 71, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(65, 72, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(66, 73, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(67, 74, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(68, 75, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(69, 76, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(70, 77, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(71, 78, 1, 'POLLO A LA PLANCHA', 16.5, 1, 16.5),
(77, 79, 1, 'POLLO A LA PLANCHA', 16.5, 2, 33),
(78, 79, 14, 'HAMBURGUESA ROYAL DESILACHADA', 14, 1, 14),
(79, 79, 19, 'HMB FF FILETE A LO POBRE', 14, 1, 14),
(80, 79, 20, 'HMB FF DOBLE FILETE SUSY', 17, 1, 17),
(81, 79, 32, 'GASEOSA 1 1/2L', 10, 1, 10),
(82, 79, 37, 'COPA DE HELADO (3S)', 5, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `plato` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` double NOT NULL,
  `categoria` int(3) NOT NULL DEFAULT '1',
  `estado` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `plato`, `descripcion`, `imagen`, `precio`, `categoria`, `estado`) VALUES
(1, 'POLLO A la plancha', 'filete de pechuga de pollo con cremas', 'pechugadepollo.png', 16.5, 1, '1'),
(2, 'PECHUGA LIGHT', 'Filete de pechuga de pollo\r\n+ Papa sancochada y ensalada de palta', 'pechugalight.jpg', 18, 1, '1'),
(3, 'MILANESA CARBON BLEU', 'Pechuga de pollo empanizado rellena con quiso y jamon + papas y ensalada', 'milanesacarbonbleu.jpg', 18, 1, '1'),
(4, 'BBQ (DULCE)', '-', '', 17, 2, '1'),
(5, 'BUFALO (PICANTE)', '-', '', 12, 2, '1'),
(6, 'SALCHIPAPA', '-', 'salchipapa.jpg', 13, 3, '1'),
(7, 'SALCHIPAPA SUSY', '-', 'salchipapasusy.jpg', 18, 3, '1'),
(8, 'POLLO A LA PARRILLA PECHO', '-', '', 20, 4, '1'),
(9, 'POLLO A LA PARRILLA PIERNA', '-', '', 19, 4, '1'),
(10, 'POLLO A LA CANASTA 1 PRESA', '-', '', 13, 4, '1'),
(11, 'POLLO A LA CANASTA 2 PRESAS', '-', '', 20, 4, '1'),
(12, 'HAMBURGUESA DESILACHADA', '-', '', 11, 5, '1'),
(13, 'HAMBURGUESA MIXTA', '-', '', 14, 5, '1'),
(14, 'HAMBURGUESA ROYAL DESILACHADA', '-', '', 14, 5, '1'),
(15, 'HAMBURGUESA SUSY', '-', '', 16, 5, '1'),
(16, 'HAMBURGUESA CHORIPAN', '-', '', 11, 5, '1'),
(17, 'HAMBURGUESA HAWAIANA', '-', '', 14, 5, '1'),
(18, 'HMB FF FILETE CLASICA', '-', '', 11, 6, '1'),
(19, 'HMB FF FILETE A LO POBRE', '-', '', 14, 6, '1'),
(20, 'HMB FF DOBLE FILETE SUSY', '-', '', 17, 6, '1'),
(21, 'HMB FC CASERA', '-', '', 12, 7, '1'),
(22, 'HMB FC A LO POBRE', '-', '', 15, 7, '1'),
(23, 'HMB FC DOBLE CASERA C/ QUESO', '-', '', 18, 7, '1'),
(24, 'LOMO SALTADO', '-', '', 11, 8, '1'),
(25, 'POLLO SALTADO', '-', '', 14, 8, '1'),
(26, 'ARROZ CHAUFA', '-', '', 17, 8, '1'),
(27, 'TALLARIN SALTADO', '-', '', 12, 8, '1'),
(28, 'CHICA MORADA', '-', '', 13, 9, '1'),
(29, 'MARACUYA FROZEN', '-', '', 14, 9, '1'),
(30, 'LIMONADA MORADA', '-', '', 13, 9, '1'),
(31, 'GASEOSA 1/2L', '-', '', 4, 9, '1'),
(32, 'GASEOSA 1 1/2L', '-', '', 10, 9, '1'),
(33, 'INFUSIONES', '-', '', 0, 9, '1'),
(34, 'CAFE', '-', '', 0, 9, '1'),
(35, 'ENSALADA DE FRUTAS', '-', '', 12, 10, '1'),
(36, 'ENSALADA DE FRUTAS CON HELADO', '-', '', 14, 10, '1'),
(37, 'COPA DE HELADO (3S)', '-', '', 5, 11, '1'),
(38, 'COPA DE HELADO (4S)', '-', '', 7, 11, '1'),
(39, 'COPA DE HELADO (5S)', '-', '', 10, 11, '1'),
(40, 'COPA DE HELADO (6S)', '-', '', 12, 11, '1'),
(41, 'PANQUEQUES C/ FRUTAS', '-', '', 0, 12, '1'),
(42, 'WAFLES C/ HELADOS', '-', '', 0, 12, '1'),
(43, 'JUGO DE PAPAYA', '-', '', 6, 13, '1'),
(44, 'JUGO SURTIDO', '-', '', 6, 13, '1'),
(45, 'JUGO DE PIÑA', '-', '', 6, 13, '1'),
(46, 'JUGO DE PLATANO C/ LECHE', '-', '', 8, 13, '1'),
(47, 'JUGO DE FRESA C/ LECHE', '-', '', 8, 13, '1'),
(48, 'JUGO ESPECIAL', '-', '', 6, 13, '1'),
(49, 'PAN C/ CHICHARRON', '-', '', 0, 14, '1'),
(50, 'PAN DESILACHADO', '-', '', 0, 14, '1'),
(51, 'PAN C/ TAMALES', '-', '', 0, 14, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, '2022_02_04_085814_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `mesa` int(3) DEFAULT NULL,
  `subtotal` double NOT NULL,
  `total` double DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `fecha_pago` timestamp NULL DEFAULT NULL,
  `usuario_modifico` varchar(255) DEFAULT NULL,
  `usuario_cancelo` varchar(255) DEFAULT NULL,
  `usuario_proceso` varchar(255) DEFAULT NULL,
  `usuario_modifico_id` int(4) DEFAULT NULL,
  `usuario_cancelo_id` int(4) DEFAULT NULL,
  `usuario_proceso_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `mesa`, `subtotal`, `total`, `estado`, `created_at`, `updated_at`, `fecha_pago`, `usuario_modifico`, `usuario_cancelo`, `usuario_proceso`, `usuario_modifico_id`, `usuario_cancelo_id`, `usuario_proceso_id`) VALUES
(5, 3, 49.5, NULL, 'cancelado', '2022-02-08 04:29:37', '2022-02-10 12:04:27', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(6, 6, 16.5, NULL, 'cancelado', '2022-02-08 05:00:44', '2022-02-10 12:05:09', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(7, 12, 16.5, NULL, 'pendiente', '2022-02-08 05:04:39', '2022-02-08 05:04:39', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(8, 13, 33, NULL, 'pagado', '2022-02-08 05:04:45', '2022-02-11 23:34:33', NULL, NULL, NULL, 'Benjamin', NULL, NULL, 1),
(9, 10, 82.5, NULL, 'cancelado', '2022-02-08 05:05:00', '2022-02-15 16:59:42', NULL, NULL, 'Julio', '0', NULL, 2, NULL),
(10, 11, 16.5, NULL, 'cancelado', '2022-02-08 05:05:56', '2022-02-10 11:55:00', NULL, 'Benjamin', 'Benjamin', '0', 1, 1, NULL),
(11, 2, 49.5, NULL, 'cancelado', '2022-02-10 08:50:15', '2022-02-10 11:57:29', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(12, 1, 33, NULL, 'cancelado', '2022-02-10 08:50:40', '2022-02-10 12:04:49', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(13, 4, 16.5, NULL, 'cancelado', '2022-02-10 09:17:35', '2022-02-10 12:04:34', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(14, 10, 82.5, NULL, 'cancelado', '2022-02-10 09:20:42', '2022-02-10 12:01:56', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(15, 5, 16.5, NULL, 'cancelado', '2022-02-10 09:27:26', '2022-02-10 12:04:55', NULL, NULL, 'Benjamin', '0', NULL, 1, NULL),
(16, 9, 99, NULL, 'pendiente', '2022-02-10 12:16:53', '2022-02-10 12:16:53', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(17, 11, 16.5, NULL, 'pagado', '2022-02-10 12:17:05', '2022-02-11 23:35:47', NULL, 'Benjamin', NULL, 'Benjamin', 1, NULL, 1),
(18, NULL, 16.5, NULL, 'pendiente', '2022-02-12 01:57:51', '2022-02-12 01:57:51', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(19, NULL, 16.5, NULL, 'pendiente', '2022-02-11 21:03:10', '2022-02-11 21:03:10', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(20, NULL, 16.5, NULL, 'pendiente', '2022-02-11 21:04:12', '2022-02-11 21:04:12', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(21, NULL, 33, NULL, 'pendiente', '2022-02-11 22:05:27', '2022-02-11 22:05:27', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(22, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:15:16', '2022-02-11 22:15:16', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(23, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:16:31', '2022-02-11 22:16:31', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(24, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:17:14', '2022-02-11 22:17:14', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(25, NULL, 16.5, NULL, 'cancelado', '2022-02-11 22:19:07', '2022-02-11 22:19:10', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(26, NULL, 33, NULL, 'cancelado', '2022-02-11 22:20:21', '2022-02-11 22:20:25', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(27, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:20:48', '2022-02-11 22:20:48', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(28, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:23:15', '2022-02-11 22:23:15', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(29, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:30:55', '2022-02-11 22:30:55', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(30, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:31:32', '2022-02-11 22:31:32', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(31, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:33:30', '2022-02-11 22:33:30', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(32, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:36:32', '2022-02-11 22:36:32', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(33, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:49:51', '2022-02-11 22:49:51', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(34, NULL, 33, NULL, 'pendiente', '2022-02-11 22:50:35', '2022-02-11 22:50:35', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(35, NULL, 16.5, NULL, 'pendiente', '2022-02-11 22:57:11', '2022-02-11 22:57:11', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(36, NULL, 16.5, NULL, 'pendiente', '2022-02-11 23:00:29', '2022-02-11 23:00:29', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(37, NULL, 33, NULL, 'pendiente', '2022-02-11 23:01:02', '2022-02-11 23:01:02', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(38, NULL, 16.5, NULL, 'pagado', '2022-02-11 23:22:35', '2022-02-11 23:22:46', NULL, 'Benjamin', NULL, 'Benjamin', 1, NULL, 1),
(39, NULL, 33, NULL, 'pagado', '2022-02-11 23:26:50', '2022-02-11 23:27:03', NULL, 'Benjamin', NULL, 'Benjamin', 1, NULL, 1),
(40, NULL, 16.5, NULL, 'cancelado', '2022-02-11 23:38:16', '2022-02-11 23:39:22', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(42, 1, 16.5, NULL, 'cancelado', '2022-02-15 12:28:43', '2022-02-15 17:34:48', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(43, 2, 16.5, NULL, 'cancelado', '2022-02-15 12:30:41', '2022-02-15 12:46:33', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(44, 3, 16.5, NULL, 'cancelado', '2022-02-15 12:38:41', '2022-02-15 17:34:37', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(45, 4, 16.5, NULL, 'cancelado', '2022-02-15 12:39:35', '2022-02-15 18:37:13', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(46, 5, 16.5, NULL, 'pendiente', '2022-02-15 12:42:30', '2022-02-15 12:42:30', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(47, 11, 16.5, NULL, 'cancelado', '2022-02-15 12:46:01', '2022-02-15 16:59:47', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(48, 2, 16.5, NULL, 'pagado', '2022-02-15 12:46:38', '2022-02-15 14:07:29', NULL, 'Benjamin', NULL, 'Benjamin', 1, NULL, 1),
(49, 6, 16.5, NULL, 'cancelado', '2022-02-15 12:47:22', '2022-02-15 17:06:22', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(51, 13, 16.5, NULL, 'pendiente', '2022-02-15 12:51:43', '2022-02-15 12:51:43', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(52, 14, 16.5, NULL, 'pendiente', '2022-02-15 12:52:30', '2022-02-15 12:52:30', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(53, 7, 16.5, NULL, 'pendiente', '2022-02-15 12:53:43', '2022-02-15 12:53:43', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(64, 2, 33, NULL, 'cancelado', '2022-02-15 16:35:21', '2022-02-15 17:20:09', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(65, 16, 33, NULL, 'pendiente', '2022-02-15 16:52:38', '2022-02-15 16:52:38', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(66, 16, 33, NULL, 'pendiente', '2022-02-15 16:52:41', '2022-02-15 16:52:41', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(67, 15, 33, NULL, 'pendiente', '2022-02-15 16:53:40', '2022-02-15 16:53:40', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(68, 8, 33, NULL, 'pendiente', '2022-02-15 16:59:21', '2022-02-15 16:59:21', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(69, 10, 16.5, NULL, 'cancelado', '2022-02-15 17:00:42', '2022-02-15 17:06:15', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(70, 11, 16.5, NULL, 'cancelado', '2022-02-15 17:05:15', '2022-02-15 17:34:43', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(71, 6, 16.5, NULL, 'pendiente', '2022-02-15 17:07:33', '2022-02-15 17:07:33', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(72, 10, 16.5, NULL, 'pendiente', '2022-02-15 17:19:47', '2022-02-15 17:19:47', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(73, 2, 16.5, NULL, 'cancelado', '2022-02-15 17:21:44', '2022-02-15 17:34:07', NULL, 'Benjamin', 'Benjamin', NULL, 1, 1, NULL),
(74, 2, 16.5, NULL, 'cancelado', '2022-02-15 17:34:17', '2022-02-15 17:34:33', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(75, 2, 16.5, NULL, 'cancelado', '2022-02-15 17:35:07', '2022-02-15 18:37:08', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(76, NULL, 16.5, NULL, 'pendiente', '2022-02-15 17:35:09', '2022-02-15 17:35:09', NULL, 'Benjamin', NULL, NULL, 1, NULL, NULL),
(77, 3, 16.5, NULL, 'cancelado', '2022-02-15 17:35:34', '2022-02-15 18:37:03', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(78, 1, 16.5, NULL, 'cancelado', '2022-02-15 17:35:52', '2022-02-15 18:37:18', NULL, 'Benjamin', 'Julio', NULL, 1, 2, NULL),
(79, 1, 98, NULL, 'pagado', '2022-02-15 21:11:00', '2022-02-15 21:12:10', NULL, 'Julio', NULL, 'Julio', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2Pr0n5mDdr6GzKMqMMFni4c7EAZ89BulNhKWuxl6', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia1lQQ20xQmNRQ2E1ajJGTEk3T0pLeHUyeERNUmFrOXV4WkNhdFBSSCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHouaHlOdzVSOE0yMUh0VGVqeEdQNmVLeG4yNHVreDJhaGJ2VWdGS3RhN0VBeXZJdVpuc2VDIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR6Lmh5Tnc1UjhNMjFIdFRlanhHUDZlS3huMjR1a3gyYWhidlVnRkt0YTdFQXl2SXVabnNlQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1645040615),
('8sxgKG8IDpRHSNMKP3Z340fiMCekAErJW5yss7wj', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZ3llYmVpbzZ0aG9HRVBmcDBXMndkQkMxaWJuYkVTS0Fmb0tCSHRXSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjE4OiJodHRwczovL3Rvb2xzLnRlc3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkei5oeU53NVI4TTIxSHRUZWp4R1A2ZUt4bjI0dWt4MmFoYnZVZ0ZLdGE3RUF5dkl1Wm5zZUMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHouaHlOdzVSOE0yMUh0VGVqeEdQNmVLeG4yNHVreDJhaGJ2VWdGS3RhN0VBeXZJdVpuc2VDIjt9', 1644959805),
('LZzgbsEF1PfSXAf4xhCqtFO1kKUuwSpZ7ZenO4vq', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia01qbFV4S2ZJb1ZYczdGNXZQbjN3cTJqQlpnVWtlQlRuTlhtZDcybSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHouaHlOdzVSOE0yMUh0VGVqeEdQNmVLeG4yNHVreDJhaGJ2VWdGS3RhN0VBeXZJdVpuc2VDIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR6Lmh5Tnc1UjhNMjFIdFRlanhHUDZlS3huMjR1a3gyYWhidlVnRkt0YTdFQXl2SXVabnNlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdG9vbHMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1644975982),
('oiClIpOCTHxvJnLnbgbGjZqPr1wBkw610YikSJk9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.82 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGtod2dzZmdZV3V1SDN5bWJFdWNpN2NRaXJJSGNqV3pBMWlaenljbyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE82SnpyZEZ2V3hHODdmLkdneHo2VXVXY3l6QXZhSWVXU2xpQ25BNkEwQzVuZEhESlZ2dWhlIjtzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1644959500),
('uCIYEJMiQ1gMyt3gyDTqUshaKH4j6kKVROSz4b0z', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNWExczB2T0gzalRHdlVaakJQeVVSazRNME5JNHUyM1pCcEY0SDUxUCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHouaHlOdzVSOE0yMUh0VGVqeEdQNmVLeG4yNHVreDJhaGJ2VWdGS3RhN0VBeXZJdVpuc2VDIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR6Lmh5Tnc1UjhNMjFIdFRlanhHUDZlS3huMjR1a3gyYWhidlVnRkt0YTdFQXl2SXVabnNlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdG9vbHMudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1645040615),
('WPnkN6AlGKYcUVGQ1XaNnS5au0peC07sj034xLm9', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNUF2ZFFGWVcySFRncEpjcnBoc0tEMTVYVGI4ZkZsN1VOazlxdnY1MSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHouaHlOdzVSOE0yMUh0VGVqeEdQNmVLeG4yNHVreDJhaGJ2VWdGS3RhN0VBeXZJdVpuc2VDIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR6Lmh5Tnc1UjhNMjFIdFRlanhHUDZlS3huMjR1a3gyYWhidlVnRkt0YTdFQXl2SXVabnNlQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1644975964);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mozo',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dni`, `categoria`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `estado`) VALUES
(1, 'Benjamin', 'benjamin_unitek@hotmail.com', '77685850', 'mozo', NULL, '$2y$10$O6JzrdFvWxG87f.Ggxz6UuWcyzAvaIeWSliCnA6A0C5ndHDJVvuhe', NULL, NULL, 't1UDdf4o3QdwFhUF6JFgICZeeCOYdOexvtazdpIeuuU1fspci3XZgkeo23MN', NULL, NULL, '2022-02-05 06:42:02', '2022-02-05 06:42:02', '1'),
(2, 'Julio', 'julio@hotmail.com', '12345678', 'caja', NULL, '$2y$10$z.hyNw5R8M21HtTejxGP6eKxn24ukx2ahbvUgFKta7EAyvIuZnseC', NULL, NULL, 'VT9UAucfQqOq0SADjsfWTov4qonDOlIEizlbUqALUWlyCnkkwQ550TvdwBGn', NULL, NULL, '2022-02-08 06:35:47', '2022-02-08 06:35:47', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallepedidos`
--
ALTER TABLE `detallepedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
