<?php
	require("../inc/functions.php");
	if (isset($_POST['acc']) && $_POST['acc']=="reset") {
		 $recontra=sha1(md5(date("d-m-Y H:i:s")));
		 $mySql="UPDATE `profes` SET `recontra`='{$recontra}' WHERE `email`='{$_POST['email']}'"; echo $mySql;
		$conexion=conectar();
		$result=mysqli_query($conexion,$mySql);
		desconectar($conexion);
		$body="<!DOCTYPE html>
		<html>
		<head>
			<meta charset='utf-8'>
			<title>Recuperación contraseña</title>
		</head>
		<body>";
		$body.="<p>Para cambiar<a href='http://federico.cobd.es/introphp/models/recupera.php?change={$recontra}&newPass=12345'>Recuperar contraseña</a>" ;
		$body.="</body></html>";
		sendmail($_POST['email'],'Reestablecer clave',$body);
		//echo $body;
	}
	if(isset($_GET['change'])){
		$mySql="UPDATE `profes` SET `pass`='{$_GET['newPass']}' WHERE `recontra`='{$_GET['change']}';";
        $mySql2="UPDATE `profes` SET `recontra`= NULL WHERE `recontra`='{$_GET['change']}';";
        $conexion=conectar();
        mysqli_query($conexion,$mySql);
        mysqli_query($conexion,$mySql2);
        desconectar($conexion);
	}	
?>