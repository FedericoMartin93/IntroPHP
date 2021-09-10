<?php 
	include("../inc/functions.php");
	if (isset($_POST['acc']) && $_POST['acc']="l") 
	{	
		// Sentencia consulta, query
		$mySql="SELECT `alumnes`.`nom`,`alumnes`.`cog1`,`alumnes`.`cog2`,`alumnes`.`imatge`,`alumnes`.`tel1`,`alumnes`.`tel2` FROM `alumnes` LEFT JOIN `grupsalumnes` ON `alumnes`.`idAlumne`=`grupsalumnes`.`idAlumne` WHERE `grupsalumnes`.`idEsp`={$_POST['idEsp']}";
		$conexion=conectar();
		$resultAlumnes= mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$cantidadAlumnes= mysqli_num_rows($resultAlumnes);
	 } if ($cantidadAlumnes!=0) {
	 	// Si tengo claro que solo me devuelve un registro:
	 	//$row=mysqli_fetch_row($resultAlumnes);
	 	// print_r($row);
	 	// print_r($resultCases);
	 	// Si tengo varios registros
	 	//mysqli_data_seek($resultAlumnes,0);
	 	$rows= array();
	 	while ($row=mysqli_fetch_array($resultAlumnes)) {
	 		$rows[]=$row;
	 	}
	 	echo json_encode($rows);
	 }
	 else{
	 	echo "Parámetro incorrecto";
	 }
 ?>