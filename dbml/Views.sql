-- MASTER DE POS
SELECT
	T0.id,
	t0.num_po,
	T1.nombre_shipto,
	T1.Descripcion,
	t0.activo,
FROM
	tbl_imp_importacion T0
	INNER JOIN tbl_imp_shipto T1 on T0.id_shipto = T1.id