CREATE TABLE `tbl_imp_importacion` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `num_po` varchar(20),
  `id_vendor` int(10),
  `id_shipto` int(10),
  `id_via` int(10),
  `id_estados_pagos` int(10),
  `estados_pagos` int(5),
  `tipo_carga` int(5),
  `factura` varchar(10),
  `recibo` varchar(10),
  `fecha_despacho` date,
  `fecha_orden_compra` date,
  `estado_importacion` int(5),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_vias` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `Descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_tipo_carga` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `Descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_estados_pagos` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `Descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_vendor` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombre_vendor` varchar(100),
  `Descripcion` varchar(250),
  `time_despacho` int(10),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_shipto` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombre_shipto` varchar(250),
  `Descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_importacion_detalle` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_importacion` int(10),
  `id_laboratorio` int(10),
  `id_product` int(10),
  `articulo` varchar(10),
  `descripcion` varchar(250),
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

CREATE TABLE `tbl_imp_Laboratorio` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `tbl_imp_Product` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `Articulo_exactus` varchar(50),
  `descripcion` varchar(250),
  `activo` varchar(5),
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `tbl_imp_importacion_detalle` ADD FOREIGN KEY (`id_importacion`) REFERENCES `tbl_imp_importacion` (`id`);

ALTER TABLE `tbl_imp_importacion_detalle` ADD FOREIGN KEY (`id_laboratorio`) REFERENCES `tbl_imp_Laboratorio` (`id`);

ALTER TABLE `tbl_imp_vendor` ADD FOREIGN KEY (`id`) REFERENCES `tbl_imp_importacion` (`id_vendor`);

ALTER TABLE `tbl_imp_shipto` ADD FOREIGN KEY (`id`) REFERENCES `tbl_imp_importacion` (`id_shipto`);

ALTER TABLE `tbl_imp_importacion_detalle` ADD FOREIGN KEY (`id_product`) REFERENCES `tbl_imp_Product` (`id`);

ALTER TABLE `tbl_imp_vias` ADD FOREIGN KEY (`id`) REFERENCES `tbl_imp_importacion` (`id_via`);

ALTER TABLE `tbl_imp_estados_pagos` ADD FOREIGN KEY (`id`) REFERENCES `tbl_imp_importacion` (`id_estados_pagos`);

ALTER TABLE `tbl_imp_tipo_carga` ADD FOREIGN KEY (`id`) REFERENCES `tbl_imp_importacion` (`tipo_carga`);
