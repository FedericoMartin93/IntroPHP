<?php
	require("../inc/functions.php");
	$mySqlAlumnos="
		SELECT `nom`,`cog1`,`cog2`
		FROM `alumnes` 
		ORDER BY `cog1`,`cog2`,`nom`
		LIMIT 10;";

	$mySqlProfes="
		SELECT `nombre`,`cognom1`,`cognom2` 
		FROM `profes` 
		WHERE `tipo`='p'
		ORDER BY `cognom1`,`cognom2`,`nombre`
		LIMIT 2;";

	$conexion=conectar();
	$resultAlumnes=mysqli_query($conexion,$mySqlAlumnos);
	$resultProfes=mysqli_query($conexion,$mySqlProfes);
	desconectar($conexion);

// Creamos JSON múltiple

	$datosExportar='{"datosAlumnos":';

	// echo $mySqlAlumnos.";".$mySqlProfes;
// creo un array
	$rows=array();
// recorro el array con los resultados de la query
	while ($row=mysqli_fetch_array($resultAlumnes)) {
		$rows[]=$row;
	}

	$datosExportar.=json_encode($rows);
	$datosExportar.=',"datosProfe":';

	$rows=array();

	while ($row=mysqli_fetch_array($resultProfes)) {
		$rows[]=$row;
	}
	$datosExportar.=json_encode($rows);
	$datosExportar.="}";
	echo $datosExportar;

?>