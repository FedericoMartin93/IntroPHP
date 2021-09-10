<?php

// ver el resultado del formulario recorriendo los datos que nos da mediante el metodo post
	// foreach ($_POST as $clave => $dato) {
	// 	echo "Recibo {$clave} con {$dato}";
	// }
	// if ($_FILES['nameInputFile']['name']){


	// 	$fileinfo=$_FILES['nameInputFile'];


	// 	$filepath=$fileinfo['tmp_name'];


	// 	$filename=$fileinfo['name'];

	// 	$datosFichero=explode(".",$filename);

	// 	$nuevoNombre=$datosFichero[0].date("Y-m-d_His").".".$datosFichero[1];

	// 	echo "<br>Datos: <br>{$filepath}<br>{$filename}";

	// 	move_uploaded_file($filepath,"../img/".$nuevoNombre);


	// }

	//echo count($_FILES['nameInputFile2']);

	for ($i=0; $i < count($_FILES['nameInputFile2']); $i++) { 
		$fichTemporal=$_FILES['nameInputFile2']['tmp_name'][$i];
		if ($fichTemporal!="") {
			$destino="../img/".$_FILES['nameInputFile']['name'][$i];
			if(move_uploaded_file($fichTemporal,$destino)) echo "Se ha subido el fichero $".$_FILES['nameInputFile']['name'][$i]."<br>";
		}
	}
?>