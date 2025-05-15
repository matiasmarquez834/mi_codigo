-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 15:57:14
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia_viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `nombre_destino` varchar(100) NOT NULL,
  `descripcion_destino` text DEFAULT NULL,
  `pais_destino` varchar(50) NOT NULL,
  `ciudad_destino` varchar(50) DEFAULT NULL,
  `atracciones_principales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre_destino`, `descripcion_destino`, `pais_destino`, `ciudad_destino`, `atracciones_principales`) VALUES
(1, 'París', 'La ciudad del amor, famosa por su arte, moda y gastronomía.', 'Francia', 'París', 'Torre Eiffel, Museo del Louvre, Catedral de Notre-Dame'),
(2, 'Roma', 'Ciudad histórica con ruinas antiguas y una rica cultura.', 'Italia', 'Roma', 'Coliseo, Foro Romano, Ciudad del Vaticano'),
(3, 'Tokio', 'Metrópolis vibrante que combina tradición y modernidad.', 'Japón', 'Tokio', 'Templo Senso-ji, Shibuya Crossing, Palacio Imperial'),
(4, 'Machu Picchu', 'Antigua ciudad inca en lo alto de los Andes peruanos.', 'Perú', 'Cusco', 'Ciudadela de Machu Picchu, Camino Inca'),
(5, 'Bali', 'Isla indonesia conocida por sus playas, templos y espiritualidad.', 'Indonesia', 'Denpasar', 'Templos de Tanah Lot y Uluwatu, playas de Kuta y Seminyak'),
(6, 'Nueva York', 'La \"Gran Manzana\", centro mundial de finanzas, cultura y entretenimiento.', 'Estados Unidos', 'Nueva York', 'Estatua de la Libertad, Times Square, Central Park'),
(7, 'Estambul', 'Ciudad transcontinental con una historia fascinante y arquitectura impresionante.', 'Turquía', 'Estambul', 'Santa Sofía, Mezquita Azul, Gran Bazar'),
(8, 'El Cairo', 'Capital de Egipto, hogar de las antiguas pirámides y la Esfinge.', 'Egipto', 'El Cairo', 'Pirámides de Giza, Museo Egipcio, Khan el-Khalili'),
(9, 'Kioto', 'Antigua capital de Japón, conocida por sus templos, jardines y casas de geishas.', 'Japón', 'Kioto', 'Templo Kinkaku-ji (Pabellón Dorado), Bosque de Bambú de Arashiyama, Santuario Fushimi Inari'),
(10, 'Barcelona', 'Ciudad costera española famosa por su arquitectura modernista y su ambiente animado.', 'España', 'Barcelona', 'Sagrada Familia, Parque Güell, Las Ramblas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL,
  `nombre_promocion` varchar(100) NOT NULL,
  `descripcion_promocion` varchar(255) DEFAULT NULL,
  `descuento_porcentaje` decimal(5,2) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id_promocion`, `nombre_promocion`, `descripcion_promocion`, `descuento_porcentaje`, `fecha_inicio`, `fecha_fin`, `id_destino`) VALUES
(1, 'Verano en París', '20% de descuento en todos los viajes a París en julio.', 20.00, '2025-07-01', '2025-07-31', 1),
(2, 'Escapada Romana', '15% de descuento en paquetes a Roma durante junio.', 15.00, '2025-06-01', '2025-06-30', 2),
(3, 'Aventura en Japón', '10% de descuento en tours por Tokio en agosto.', 10.00, '2025-08-01', '2025-08-31', 3),
(4, 'Descubre Machu Picchu', 'Paquetes especiales con guía incluido durante septiembre.', NULL, '2025-09-01', '2025-09-30', 4),
(5, 'Paraíso en Bali', 'Reserva anticipada para octubre y obtén un 5% adicional.', 5.00, '2025-10-01', '2025-10-15', 5),
(6, 'Oferta Nueva York', '12% de descuento en viajes a Nueva York en noviembre.', 12.00, '2025-11-01', '2025-11-30', 6),
(7, 'Estambul Mágico', '18% de descuento en tours por Estambul en noviembre.', 18.00, '2025-11-15', '2025-11-30', 7),
(8, 'Egipto Fascinante', 'Descuentos especiales en cruceros por el Nilo en diciembre.', NULL, '2025-12-01', '2025-12-31', 8),
(9, 'Primavera en Kioto', '15% de descuento en viajes a Kioto en marzo.', 15.00, '2026-03-01', '2026-03-31', 9),
(10, 'Barcelona con Encanto', '10% de descuento en estancias en Barcelona en abril.', 10.00, '2026-04-01', '2026-04-30', 10),
(11, 'Descuento Madrugador París 2026', 'Reserva tu viaje a París para 2026 antes de fin de año y obtén un 25% de descuento.', 25.00, '2025-11-01', '2025-12-31', 1),
(12, 'Roma para Enamorados', 'Paquetes románticos con cena incluida en Roma en febrero.', NULL, '2026-02-01', '2026-02-28', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `precio_final` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_usuario`, `id_viaje`, `fecha_reserva`, `precio_final`) VALUES
(1, 1, 1, '2025-05-12 13:55:04', 1200.00),
(2, 2, 2, '2025-05-12 13:55:04', 950.50),
(3, 3, 3, '2025-05-12 13:55:04', 1550.00),
(4, 1, 4, '2025-05-12 13:55:04', 1100.00),
(5, 4, 5, '2025-05-12 13:55:04', 1300.50),
(6, 5, 1, '2025-05-12 13:55:04', 1180.00),
(7, 6, 7, '2025-05-12 13:55:04', 1050.00),
(8, 7, 9, '2025-05-12 13:55:04', 1480.00),
(9, 8, 6, '2025-05-12 13:55:04', 1250.00),
(10, 9, 2, '2025-05-12 13:55:04', 900.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `telefono_usuario` varchar(20) DEFAULT NULL,
  `direccion_usuario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `email_usuario`, `password_usuario`, `fecha_registro`, `telefono_usuario`, `direccion_usuario`) VALUES
(1, 'Ana Pérez', 'ana.perez@email.com', 'clave123', '2025-05-12 13:55:04', '+598 99 123 456', 'Calle Falsa 123, Montevideo'),
(2, 'Carlos López', 'carlos.lopez@email.com', 'secreto456', '2025-05-12 13:55:04', '+54 11 4789 0123', 'Avenida Siempreviva 742, Buenos Aires'),
(3, 'Laura Gómez', 'laura.gomez@email.com', 'viajero789', '2025-05-12 13:55:04', '+55 21 9876 5432', 'Rua das Flores 456, Río de Janeiro'),
(4, 'Pedro Rodríguez', 'pedro.rodriguez@email.com', 'montaña', '2025-05-12 13:55:04', '+56 2 2345 6789', 'Camino a la Montaña 100, Santiago'),
(5, 'Sofía Martínez', 'sofia.martinez@email.com', 'playa', '2025-05-12 13:55:04', '+52 55 1234 5678', 'Avenida del Mar 22, Cancún'),
(6, 'Javier Vargas', 'javier.vargas@email.com', 'aventura', '2025-05-12 13:55:04', '+591 7001 2345', 'Calle Bolivar 321, La Paz'),
(7, 'Elena Ruiz', 'elena.ruiz@email.com', 'cultura', '2025-05-12 13:55:04', '+34 91 987 6543', 'Plaza Mayor 15, Madrid'),
(8, 'Martín Castro', 'martin.castro@email.com', 'relax', '2025-05-12 13:55:04', '+1 555 987 6543', 'Ocean Drive 10, Miami'),
(9, 'Isabel Torres', 'isabel.torres@email.com', 'historia', '2025-05-12 13:55:04', '+57 1 234 5678', 'Calle de la Candelaria 5, Bogotá'),
(10, 'Gabriel Núñez', 'gabriel.nunez@email.com', 'gastronomia', '2025-05-12 13:55:04', '+51 1 456 7890', 'Avenida Larco 789, Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio_viaje` decimal(10,2) NOT NULL,
  `descripcion_viaje` text DEFAULT NULL,
  `incluye_viaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `id_destino`, `fecha_inicio`, `fecha_fin`, `precio_viaje`, `descripcion_viaje`, `incluye_viaje`) VALUES
(1, 1, '2025-06-15', '2025-06-22', 1250.00, 'Viaje de una semana a París, explorando sus principales atractivos.', 'Vuelo de ida y vuelta, alojamiento en hotel 4 estrellas, tour por la ciudad'),
(2, 2, '2025-07-01', '2025-07-08', 980.50, 'Aventura histórica en Roma, descubriendo el Imperio Romano.', 'Vuelo, hotel céntrico, entradas a Coliseo y Foro'),
(3, 3, '2025-08-10', '2025-08-17', 1600.75, 'Inmersión en la cultura y modernidad de Tokio.', 'Vuelo, ryokan tradicional, Japan Rail Pass'),
(4, 4, '2025-09-05', '2025-09-12', 1150.20, 'Místico viaje a la ciudad perdida de los Incas.', 'Vuelo a Cusco, traslados, entrada a Machu Picchu, guía'),
(5, 5, '2025-10-20', '2025-10-27', 1400.90, 'Relajación y exploración en la paradisíaca isla de Bali.', 'Vuelo, villa con piscina privada, clases de yoga'),
(6, 6, '2025-11-01', '2025-11-08', 1300.00, 'Descubre los iconos de Nueva York.', 'Vuelo, hotel en Manhattan, city pass'),
(7, 7, '2025-11-15', '2025-11-22', 1100.50, 'Un viaje a través de la historia y la cultura de Estambul.', 'Vuelo, hotel boutique, crucero por el Bósforo'),
(8, 8, '2025-12-01', '2025-12-08', 1050.75, 'Aventura en la tierra de los faraones.', 'Vuelo, crucero por el Nilo, visitas a pirámides y templos'),
(9, 9, '2026-03-10', '2026-03-17', 1550.20, 'Explora la belleza tradicional de Kioto en primavera.', 'Vuelo, alojamiento tradicional, ceremonia del té'),
(10, 10, '2026-04-05', '2026-04-12', 1200.90, 'Déjate sorprender por la arquitectura y el ambiente de Barcelona.', 'Vuelo, apartamento en el centro, tour de Gaudí');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id_promocion`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_viaje` (`id_viaje`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_destino` (`id_destino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD CONSTRAINT `promocion_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
