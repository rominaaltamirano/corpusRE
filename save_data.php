<?php
	
	$id_persona = $_GET['id_persona'];
	$id_mapa = $_GET['id_mapa'];
	$expresion_referencial = $_GET['expresion_referencial'];
	$numero_mostrado = $_GET['numero_mostrado'];	
	console.log($numero_mostrado);
	$db = pg_connect("host=localhost dbname='corpus' user='postgres' password='*postgres-'") or die(pg_last_error());
	$sql = "insert into expresiones_referenciales (id_persona,id_mapa,expresion_referencial) values ($id_persona,'$id_mapa','$expresion_referencial')";
	$resultado = pg_exec($db,$sql);
	
	if ($numero_mostrado=='20')
	{
		$sql = "update personas set fecha_hora_fin=CURRENT_TIMESTAMP(2) where id_persona='$id_persona'";
		$resultado = pg_exec($db,$sql);
	}

?>
