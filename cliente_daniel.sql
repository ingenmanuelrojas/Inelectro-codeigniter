-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2019 a las 05:39:40
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cliente_daniel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_banners`
--

CREATE TABLE `mae_banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lugar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `medidas` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_banners`
--

INSERT INTO `mae_banners` (`id`, `image`, `modulo`, `lugar`, `medidas`, `link`, `width`, `height`) VALUES
(1, '62d6cd11936d80c400261aebdb485ab0.jpg', 'home', 'porque_elegirnos', '1920xp por 800px', 'http://localhost/cliente_daniel/administrador/productosd/aaa', 1920, 800),
(2, '0e031c7f33ca1c0dd483e843292392bf.jpg', 'home', 'promocion_1', '460xp por 190px', 'http://localhost/cliente_daniel/administrador/productos', 460, 190),
(3, '4caef45e00dd764348e517c23fd0e583.jpg', 'home', 'promocion_2', '655xp por 190px', 'http://localhost/cliente_daniel/administrador/productos', 655, 190),
(4, 'dd45c88d2cebdee47d5b5c785168f7d0.jpg', 'home', 'promocion_3', '1140px por 190px', 'http://localhost/cliente_daniel/administrador/productos', 1140, 190),
(5, '0210e41e0b16eb15d7d3a4a3691a0d0b.jpg', 'home', 'nuestras_marcas', '1920xp por 300px', 'http://localhost/cliente_daniel/administrador/productos', 1920, 300),
(6, '4758bfc8c93af3de0e558d00cf98801d.jpg', 'nosotros', 'banner_nosotros', '1920xp por 160px', 'http://localhost/cliente_daniel/administrador/productos', 1920, 160),
(7, '46b362e9a143b67f2759e330284a9f4a.jpg', 'productos', 'banner_productos', '1920xp por 160px', 'http://localhost/cliente_daniel/administrador/productos', 1920, 160),
(8, '05003fa094cdf3a5b6aa624f2e4b5d35.jpg', 'contacto', 'banner_contacto', '1920xp por 160px', 'http://localhost/cliente_daniel/administrador/productos', 1920, 160),
(9, '62cd0d8bf22114f7184033c55a2a1d8f.jpg', 'cotizar', 'banner_cotizar', '1920xp por 160px', 'http://localhost/cliente_daniel/administrador/productos', 1920, 160);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_categoria`
--

CREATE TABLE `mae_categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_categoria`
--

INSERT INTO `mae_categoria` (`id`, `nombre`, `descripcion`, `fecha_hora`) VALUES
(1, 'Primera Categoria', 'Descripcion de la primera categoria', '2019-06-11 21:54:53'),
(2, 'Segunda Categoria', 'Descripcion de la segunda categoria', '2019-06-11 21:55:04'),
(3, 'Tercera Categoria', 'Esta es la descripcion de la categoria de prueba', '2019-06-14 22:33:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_codigos`
--

CREATE TABLE `mae_codigos` (
  `id` int(11) NOT NULL,
  `codigo_tabla` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `referencia` int(11) NOT NULL,
  `referencia2` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mae_codigos`
--

INSERT INTO `mae_codigos` (`id`, `codigo_tabla`, `descripcion`, `referencia`, `referencia2`, `observacion`) VALUES
(1, 'RO', 'SUPERADMIN', 0, '0', 'ROLES DE USUARIO'),
(2, 'RO', 'ADMINISTRADOR', 0, '0', 'ROLES DE USUARIO'),
(3, 'RO', 'OPERADOR', 0, '0', 'ROLES DE USUARIO'),
(4, 'MD', 'HOME', 0, '0', 'MODULOS'),
(5, 'MD', 'NOSOTROS', 0, '0', 'MODULOS'),
(6, 'MD', 'PRODUCTOS', 0, '0', 'MODULOS'),
(7, 'MD', 'CONTACTO', 0, '0', 'MODULOS'),
(8, 'BN', '¿Porque elegirnos?', 4, '1920xp por 800px', 'BANNERS'),
(9, 'BN', 'Promoción 1', 4, '460xp por 190px', 'BANNERS'),
(10, 'BN', 'Promoción 2', 4, '655xp por 190px', 'BANNERS'),
(11, 'BN', 'Promoción 3', 4, '1140px por 190px', 'BANNERS'),
(12, 'BN', 'Nuestras Marcas', 4, '1920xp por 300px', 'BANNERS'),
(13, 'BN', 'Banner Principal de Nosotros', 5, '1920xp por 160px', 'BANNERS'),
(14, 'BN', 'Banner Principal de Productos', 6, '1920xp por 160px', 'BANNERS'),
(15, 'BN', 'Banner Principal de Contacto', 7, '1920xp por 160px', 'BANNERS'),
(16, 'MD', 'COTIZAR', 0, '0', 'MODULOS'),
(17, 'BN', 'Banner Principal de Cotizar', 16, '1920xp por 160px', 'BANNERS'),
(18, 'BN', 'Sobre Nosotros', 4, '1920xp por 600px', 'BANNERS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_contacto`
--

CREATE TABLE `mae_contacto` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_contacto`
--

INSERT INTO `mae_contacto` (`id`, `direccion`, `correo`, `telefono`, `descripcion`) VALUES
(1, 'acacacacac', 'info@inelectro.com', '+56 34343 34343 3', 'dagsafadf afadf adfad fdf sdsfsfsdfdfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_images`
--

CREATE TABLE `mae_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_images`
--

INSERT INTO `mae_images` (`id`, `image`, `id_producto`, `orden`, `fecha_hora`) VALUES
(1, 'b174e6be6af0a6ff7b97ef238aa880d1.jpg', 1, 1, '2019-06-16 20:30:22'),
(2, '665b63526b887d6606ee71e3f1b335c0.jpg', 2, 1, '2019-06-16 20:30:56'),
(3, '0386a7332cd4a28c8396c0f6db13b860.jpg', 1, 2, '2019-06-16 20:31:22'),
(4, '64dc59a9ee23e10440b42381280a1de4.jpg', 2, 2, '2019-06-16 20:31:37'),
(5, '021656186404db797088f1a590f42f1a.jpg', 3, 1, '2019-06-16 20:36:53'),
(6, '8af8f5d5e837856a83ae56d2e4cc8086.jpg', 4, 1, '2019-06-16 20:46:14'),
(7, '1abd0426c9d1d9b7ef02cbc7093527ff.jpg', 5, 1, '2019-06-16 20:46:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_nosotros`
--

CREATE TABLE `mae_nosotros` (
  `id` int(11) NOT NULL,
  `quienes_somos` text COLLATE utf8_unicode_ci NOT NULL,
  `mision` text COLLATE utf8_unicode_ci NOT NULL,
  `vision` text COLLATE utf8_unicode_ci NOT NULL,
  `porque_elegirnos` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_nosotros`
--

INSERT INTO `mae_nosotros` (`id`, `quienes_somos`, `mision`, `vision`, `porque_elegirnos`) VALUES
(1, '                              Nuestra compañía fue fundada en el año 2008, pero con amplia experiencia en el desarrollo de Sistemas Electrónicos desde el año 1990.  Hoy contamos con un gran grupo humano que trabaja día a día para entregar a nuestros clientes lo mejor de nuestra experiencia en entregar soluciones a todas las necesidades que requieran, de forma efectiva, eficiente y muy transparente.\r\n\r\n\r\nDurante nuestros primeros años procuramos dar a conocer la tecnología LED en nuestro País, recorriéndolo de Arica a Puerto Montt, cuando esta tecnología era muy poco considerada y apreciada por las personas o simplemente por ser desconocida. Este trabajo hoy día rinde sus frutos gracias a que la tecnología LED está presente en casi todos los ámbitos de la Industria en Chile. Todo lo anterior para estar siempre a la vanguardia de la tecnología.\r\n\r\nLos años siguientes, se ha trabajado arduamente para mantener y mejorar la calidad de nuestros productos, el buen servicio y un grato ambiente laboral, aspectos que nos diferencian y nos permiten formar una alianza duradera con nuestros clientes y socios comerciales para alcanzar en conjunto las metas que nos planteamos cada año.                            ', '                              Buscamos formar vínculos comerciales duraderos con nuestros clientes entregándoles productos de calidad y un servicio que se diferencia de otras compañías en la constante preocupación por mejorar aquellos aspectos del negocio que le otorgan un valor agregado a nuestros productos y a nuestro servicio, planificando nuestra organización con base en valores y principios que nos definen, como lo son la transparencia, el respeto y por supuesto, nuestro compromiso social, con nuestros clientes y con el medio ambiente.                            ', '                               Cada día trabajamos en ser una empresa líder en el Desarrollo de productos y sistemas Electrónicos para la Industria y también en el ámbito de la eficiencia energética y las energías renovables, llevando la vanguardia en tecnologías de la Electrónica, iluminación, etc. \r\nTambién deseamos entregar a nuestros clientes una atención diferente, un servicio centrado en la confianza y la entrega de información oportuna y accesible, para esto invertimos tiempo y recursos en la implementación de mejoras tecnológicas y digitales, siempre enfocados en el avance de nuestra experiencia de comercialización y desarrollo de Electrónica a Medida y en la compra de nuestros productos por parte de los clientes, además de considerar siempre su nivel de satisfacción… por que los Proyectos y productos adquiridos por nuestros clientes, son la base que nos mueve en cada instante para prestar el mejor de los servicios desde el inicio a su fin.\r\n                            ', '                               Porque en nuestra empresa podrá encontrar exactamente lo que su empresa requiere y con un alto grado tecnológico, donde le prestaremos toda nuestra experiencia para llevar a cabo su proyecto, sea cual sea el grado de dificultad.                            ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_productos`
--

CREATE TABLE `mae_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_corta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_larga` text COLLATE utf8_unicode_ci NOT NULL,
  `caracteristicas` text COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_productos`
--

INSERT INTO `mae_productos` (`id`, `nombre`, `descripcion_corta`, `descripcion_larga`, `caracteristicas`, `id_categoria`, `estatus`, `fecha_hora`) VALUES
(1, 'Primer Producto', 'Esta es la descripcion corta del producto', 'Esta es la descripcion larga del producto, Esta es la descripcion larga del producto, Esta es la descripcion larga del producto.', '<p><strong>adfadfadfadfadfadfadf</strong></p>\n', 1, 'Nuevo', '2019-06-16 20:30:11'),
(2, 'Segundo Producto', 'Esta es la descripción corta del producto', 'Esta es la descripción larga del producto, Esta es la descripción larga del producto.', '<p>adfadf<strong>adfadfadf</strong></p>\n', 3, 'Mas Vendidos', '2019-06-16 20:30:48'),
(3, 'Tercer Producto', 'adfadfad fafadfadfdfadfad fadfadf', 'adfadfwrt rfdfadfadfa dfadfadf', '<p>adfadfadf<strong>adf adfadfadfd</strong></p>\n', 1, 'Nuevo', '2019-06-16 20:32:10'),
(4, 'Cuarto Producto', 'adfadfad', 'fadfadf', '<p>adfadfad</p>\n', 1, 'Nuevo', '2019-06-16 20:46:08'),
(5, 'Quinto Producto', 'addafadf', 'adfadf', '<p>adfadf</p>\n', 3, 'Mas Vendidos', '2019-06-16 20:46:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_slider`
--

CREATE TABLE `mae_slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `texto_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `texto_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mae_slider`
--

INSERT INTO `mae_slider` (`id`, `image`, `orden`, `texto_1`, `texto_2`, `descripcion`, `fecha_hora`) VALUES
(5, '44e59d01152379150ab2b0d0ca4e3fd2.jpg', 1, 'Los mejores productos,', 'la mejor calidad', 'Esto es una prueba de descripción', '2019-06-16 20:10:53'),
(6, '12b76461d2d68c760bee286f8c087efb.jpg', 2, 'Encuentra con nosotros', 'lo que buscas', 'Esto es una prueba de descripción', '2019-06-16 20:12:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus_admin`
--

CREATE TABLE `menus_admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `icon` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menus_admin`
--

INSERT INTO `menus_admin` (`id`, `nombre`, `link`, `parent`, `icon`) VALUES
(1, 'Dashboard', 'administrador/dashboard', 0, 'fa fa-tachometer'),
(2, 'Configuración', '#', 0, 'fa fa-cogs'),
(3, 'Usuarios', 'administrador/configuracion/usuarios', 2, ''),
(4, 'Permisos', 'administrador/configuracion/permisos', 2, ''),
(5, 'Categorías', 'administrador/categoria', 0, 'fa fa-qrcode'),
(6, 'Productos', 'administrador/productos', 0, 'fa fa-shopping-cart'),
(7, 'Nosotros', 'administrador/nosotros', 0, 'fa fa-building'),
(8, 'Sliders', 'administrador/slider', 0, 'fa fa-object-group	'),
(9, 'Contacto', 'administrador/contacto', 0, 'fa fa-user'),
(10, 'Banners', 'administrador/banner', 0, 'fa fa-image');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_admin`
--

CREATE TABLE `permisos_admin` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `insert` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `permisos_admin`
--

INSERT INTO `permisos_admin` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1, 1),
(7, 7, 1, 1, 1, 1, 1),
(8, 8, 1, 1, 1, 1, 1),
(9, 9, 1, 1, 1, 1, 1),
(10, 10, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `imagen`, `username`, `password`, `rol`, `estado`, `tipo`) VALUES
(1, 'ENMANUEL ARTURO', 'ROJAS', '123456789', 'ingenmanuelrojas@gmail.com', '', 'erojas', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mae_banners`
--
ALTER TABLE `mae_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_categoria`
--
ALTER TABLE `mae_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_codigos`
--
ALTER TABLE `mae_codigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_contacto`
--
ALTER TABLE `mae_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_images`
--
ALTER TABLE `mae_images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_nosotros`
--
ALTER TABLE `mae_nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_productos`
--
ALTER TABLE `mae_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mae_slider`
--
ALTER TABLE `mae_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus_admin`
--
ALTER TABLE `menus_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mae_banners`
--
ALTER TABLE `mae_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mae_categoria`
--
ALTER TABLE `mae_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mae_codigos`
--
ALTER TABLE `mae_codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `mae_contacto`
--
ALTER TABLE `mae_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mae_images`
--
ALTER TABLE `mae_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mae_nosotros`
--
ALTER TABLE `mae_nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mae_productos`
--
ALTER TABLE `mae_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mae_slider`
--
ALTER TABLE `mae_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menus_admin`
--
ALTER TABLE `menus_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos_admin`
--
ALTER TABLE `permisos_admin`
  ADD CONSTRAINT `fk_permisos_admin_1` FOREIGN KEY (`menu_id`) REFERENCES `menus_admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`rol`) REFERENCES `mae_codigos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
