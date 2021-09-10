<?php 
	include("../inc/functions.php");
	if (isset($_POST['acc']) && $_POST['acc']=="r") 
	{	
		// Sentencia consulta, query
		$mySql="SELECT `idCasa`,`nombre`,`idProfe`
		FROM `casesoficis`
		ORDER BY `nombre`";
		$conexion=conectar();
		$resultCases= mysqli_query($conexion,$mySql);
		desconectar($conexion);
		// echo print_r($resultCases) numero de registros;
		$cantidadCases= mysqli_num_rows($resultCases);
	  
	 if ($cantidadCases!=0) {
	 	// Si tengo claro que solo me devuelve un registro:
	 	$row=mysqli_fetch_row($resultCases);
	 	// print_r($row);
	 	// print_r($resultCases);
	 	// Si tengo varios registros
	 	mysqli_data_seek($resultCases,0);
	 	$rows= array();

	 	while ($row=mysqli_fetch_array($resultCases)) {
	 		$rows[]=$row;
	 	}
	 	echo json_encode($rows);
	 }}
	if (isset($_POST['acc']) && $_POST['acc']=="c") 
	{
		$mySql="INSERT INTO `casesoficis`(`idCasa`, `nombre`, `idProfe`) VALUES (NULL,'{$_POST['nombre']}','{$_POST['idProfe']}')";
		$conexion=conectar();
		$correcto= mysqli_query($conexion,$mySql);
		$idInsertado=mysqli_insert_id($conexion);
		desconectar($conexion);
		echo $idInsertado;
	}

 ?>
