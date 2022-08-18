SELECT
	t1.id,
	t0.id id_po,
	t5.descripcion,
	T5.id id_mercado,
	T0.id_shipto,
	t2.Articulo_exactus,
	t2.Clasificacion_1,
	t2.Clasificacion_2,
	t2.Clasificacion_3,
	t2.id_type_product,
	t2.descripcion_corta, 
	t2.descripcion_larga,
	t1.cantidad ,
	t3.descripcion Estado,
	t0.fecha_orden_compra,
	'0' DiasAcumulados,
	t0.fecha_despacho,
	T0.fecha_estimada,
	t4.Descripcion Via,
	t0.num_po,
	t0.factura,
	t0.recibo,	
	t1.minsa,
	(SELECT  count(*) FROM tbl_imp_comentario t6 WHERE t6.id_linea= t1.id ORDER BY T6.ID desc LIMIT 1 ) Commentario,
	t1.TieneVenta,
	t1.mific,
	t1.regencia,
	t1.minsa eminsa,
	T0.created_at
FROM
	tbl_imp_importacion T0
	INNER JOIN tbl_imp_importacion_detalle T1 ON T0.id = T1.id_importacion 
	INNER JOIN tbl_imp_product T2 ON T1.id_product = T2.id
	INNER JOIN tbl_imp_estado_orden T3 ON T1.Estado = T3.id
	INNER JOIN tbl_imp_vias T4 ON T0.id_via = T4.id
	INNER JOIN tbl_imp_mercado T5 ON t1.id_tipo_mecado = T5.ID
WHERE
	T0.activo = 'S'