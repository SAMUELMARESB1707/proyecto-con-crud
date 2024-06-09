-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2024 a las 05:38:19
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
-- Base de datos: `proyecto`
--
CREATE DATABASE alumnos_y_calif;
USE alumnos_y_calif;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `semestre` int(1) NOT NULL,
  `grupo` varchar(6) DEFAULT NULL,
  `control` varchar(50) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `curp` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `semestre`, `grupo`, `control`, `edad`, `telefono`, `curp`, `foto`) VALUES
(1, 'alumno', 3, 'AMP', '13212', '12', '232132', 'XD', 'pngwing.com.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `primero` varchar(50) DEFAULT NULL,
  `segundo` varchar(50) DEFAULT NULL,
  `tercero` varchar(50) DEFAULT NULL,
  `cuarto` varchar(50) DEFAULT NULL,
  `quinto` varchar(50) DEFAULT NULL,
  `sexto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `primero`, `segundo`, `tercero`, `cuarto`, `quinto`, `sexto`) VALUES
(1, 'Ingles I', 'Ingles II', 'Ingles III', 'Ingles IV', 'Ingles V', 'FIlosofia'),
(2, 'Algebra', 'Geometria y trigonometria', 'Geometria analitica', 'Calculo Diferencial', 'Calculo integral', 'Probabilidad y estadistic'),
(3, 'Quimica I', 'Quimica II', 'Biologia', 'Fisica I', 'Fisica II', 'Asignatura propedeutica'),
(4, 'LEOyE I', 'LEOyE II', 'Etica', 'Ecologia', 'Ciencia', 'Asignatura propedeutica'),
(5, 'TICs', 'Modulo 1', 'Modulo 1', 'Modulo 1', 'Modulo 1', 'Modulo 1'),
(6, 'Logica', 'Modulo 2', 'Modulo 2', 'Modulo 2', 'Modulo 2', 'Modulo 2'),
(7, '', 'Modulo 3', 'Modulo 3', 'Modulo 3', 'Modulo 3', 'Modulo 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calif`
--

CREATE TABLE `calif` (
  `id` int(11) NOT NULL,
  `id_alumn` int(11) DEFAULT NULL,
  `m1` int(2) NOT NULL,
  `m2` int(2) NOT NULL,
  `m3` int(2) NOT NULL,
  `m4` int(2) NOT NULL,
  `m5` int(2) NOT NULL,
  `m6` int(2) NOT NULL,
  `m7` int(2) NOT NULL,
  `promedioFinal` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calif`
--

INSERT INTO `calif` (`id`, `id_alumn`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `m7`, `promedioFinal`) VALUES
(1, 1, 10, 10, 10, 10, 10, 10, 10, 0.0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nom` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nom`, `correo`, `pass`) VALUES
('Paul Christian', 'admin@gmail.com', 'admin123'),
('Alenka Gómez', 'alendgomez@gmail.com', '111111'),
('Ana García', 'anagarcia@hotmail.com', 'abc123'),
('Andrea Castro', 'andreacastro@gmail.com', '444444'),
('Carlos chidori', 'carloschidori@hotmail.com', 'asdfgh'),
('Juan Pérez', 'juanperez@gmail.com', '123456'),
('Luis Hernández', 'luishernandez@yahoo.com', 'qwerty'),
('María Rodríguez', 'mariarodriguez@gmail.com', '987654'),
('Pablo Ramírez', 'pabloramirez@yahoo.com', '333333'),
('Ruth Reyes', 'ruthireyes@gmail.com', 'zxcasd'),
('Sasuke Martínez', 'sasukimartinez@yahoo.com', 'zxcvbn'),
('Sofía Torres', 'sofiatorres@hotmail.com', '222222');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calif`
--
ALTER TABLE `calif`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `calif`
--
ALTER TABLE `calif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
