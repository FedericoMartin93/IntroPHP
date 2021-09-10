<?php
	include("../inc/functions.php");
	if (isset($_POST['acc']) && $_POST['acc']=="selCasa") {
		// echo "Llego a hacer la petición ".$_POST['idCasa'];
		$mySql="SELECT `idEsp`,`nomEspecialitat`
		FROM `especialitats`
		WHERE `idCasa`='{$_POST['idCasa']}'
		ORDER BY `nomEspecialitat`";
		$conexion=conectar();
		$resultEspecialidades=mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$cantEspecialitats=mysqli_num_rows($resultEspecialidades);
		// echo $cantEspecialitats;
		if ($cantEspecialitats!=0) {
			$rows= array();
			while ($row=mysqli_fetch_array($resultEspecialidades)) {
				$rows[]=$row;
			}
			echo json_encode($rows);
		}
		else{
			echo "No hay especialidades";
		}
	}
?>