CREATE TABLE `importacion` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `factura` varchar(10),
  `recibo` varchar(10),
  `id_unidad_negocio` int,
  `fecha_despacho` date,
  `fecha_orden_compra` date,
  `estado` int(5),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `importacion_detalle` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_importacion` int(10),
  `id_laboratorio` int,
  `articulo` varchar(10),
  `descripcion` varchar(100),
  `cantidad` decimal(10,2),
  `precio_farmacia` decimal(10,2),
  `precio_publico` decimal(10,2),
  `precio_institucion` decimal(10,2),
  `mific` varchar(5),
  `regencia` varchar(5),
  `minsa` varchar(10),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `Laboratorio` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(100),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `unidad_negocio` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(100),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `importacion_detalle` ADD FOREIGN KEY (`id_importacion`) REFERENCES `importacion` (`id`);

ALTER TABLE `importacion_detalle` ADD FOREIGN KEY (`id_laboratorio`) REFERENCES `Laboratorio` (`id`);

ALTER TABLE `importacion` ADD FOREIGN KEY (`id_unidad_negocio`) REFERENCES `unidad_negocio` (`id`);
