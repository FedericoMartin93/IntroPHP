<h1>
	<?php
		include("../inc/functions.php");
		echo saluda();
		$sql="SELECT * FROM `profes`";
		$conexion= conectar();
		$resultProfes=mysqli_query($conexion,$sql);
		desconectar($conexion);
		$cantidadProfes=mysqli_num_rows($resultProfes);
		$cantidadCampos=mysqli_num_fields($resultProfes);
		$datosUnProfe=mysqli_fetch_row($resultProfes);
		mysqli_data_seek($resultProfes,0);
		// echo "<br>Cantidad de registros: ".$cantidadProfes;
		// echo "\n\r" .print_r($datosUnProfe);
		// echo "\n\rNombre: ".$datosUnProfe[2];

		$datosConsulta= array();
		$i=0;
		while($row=mysqli_fetch_array($resultProfes)){
			// echo print_r($row);
			$datosConsulta[$i]=$row;
			$i++;
		}
		// echo print_r($datosConsulta);
		echo json_encode($datosConsulta);
	?>
</h1>