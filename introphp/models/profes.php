<?php

	include("../inc/functions.php");
	session_start();
	if (isset($_POST['acc']) && $_POST['acc']=='login') {
		$password=sha1(md5($_POST['pass']));
		// encriptado de clave
		$mySql="SELECT `idProfe`,`tipo`,`nombre`,`cognom1`
		FROM `profes`
		WHERE `email`='{$_POST['email']}'
		AND `pass`='{$password}'";
		$conexion=conectar();
		$resultProfe=mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$cantidadRegistros=mysqli_num_rows($resultProfe);
		// creo las variables de sesion con mis datos
		if ($cantidadRegistros==1) {
			$row=mysqli_fetch_row($resultProfe);
			$_SESSION['login']['idProfe']=$row[0];
			$_SESSION['login']['tipo']=$row[1];
			$_SESSION['login']['nombre']=$row[2];
			$_SESSION['login']['cognom1']=$row[3];
			echo '[{"message":true}]';
		}
		else{
			echo '[{"message":"Error en validación"}]';
		}
	}
	if (isset($_POST['acc']) && $_POST['acc']=='logout') {
		session_unset();
		session_destroy();
		echo '[{"message": "Sesión cerrada"}]';
	}
	if (isset($_POST['acc']) && $_POST['acc']=='r') {
		$mySql="SELECT `tipo`,`nombre`,`cognom1`,`cognom2`,`email`,`telefon`
		FROM `profes`
		WHERE `idProfe`='{$_SESSION['login']['idProfe']}'";
		// echo $mySql;
		$conexion=conectar();
		$resultProfe=mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$cantidadRegistros=mysqli_num_rows($resultProfe);
		if($cantidadRegistros==1){
			$row= mysqli_fetch_row($resultProfe);
			echo json_encode($row);
		}
	}

	// actualizar en base de datos
	if (isset($_POST['acc']) && $_POST['acc']=='u')
	{
		$mySql="UPDATE `profes` 
		SET `tipo`='{$_POST["tipo"]}',`nombre`='{$_POST["nombre"]}',`cognom1`='{$_POST["cognom1"]}',`cognom2`='{$_POST["cognom2"]}',`email`='{$_POST["email"]}',`telefon`='{$_POST["telefon"]}' 
		WHERE `idProfe`='{$_SESSION['login']['idProfe']}'";
		$mySql2="SELECT `tipo`,`nombre`,`cognom1`,`cognom2`,`email`,`telefon`
		FROM `profes`
		WHERE `idProfe`='{$_SESSION['login']['idProfe']}'";
		echo $mySql;
		$conexion=conectar();
		$resultDatos=mysqli_query($conexion,$mySql);
		$resultDatosNuevos=mysqli_query($conexion,$mySql2);
		desconectar($conexion);
		echo $resultDatos;
	}
	// echo "intento validar con: {$_POST['email']}.{$_POST['pass']}";
	if (isset($_POST['acc']) && $_POST['acc']=='l')
	{
		$mySql="SELECT `idProfe`,`nombre`,`cognom1`,`cognom2` 
			FROM `profes`";
			if (isset($_POST['tipo'])) $mySql.=" WHERE `tipo`='d'"; 
			$mySql.=" ORDER BY `cognom1`,`cognom2`,`nombre`";
		// echo $mySql;
		$conexion=conectar();
		$resultProfe=mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$rows=array();
		while($row=mysqli_fetch_array($resultProfe)){
			$rows[]=$row;
		}
		echo json_encode($rows);
	}
?>