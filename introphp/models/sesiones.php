<?php
	session_name("Sesión1");
	$nombreAnterior=session_name("Sesión2");
	echo "\r\nNombre anterior de la sesion: ".$nombreAnterior;
	echo "\r\nNombre de la sesion actual: ".session_name();

	session_start();
	$_SESSION["nombre"]="Carlos";
	$_SESSION["ap1"]="Antón";
	$_SESSION["idProfe"]=2;
	// $_SESSion["datosSesion"]["nombre"]="Carlos";

	// print_r($_SESSION);
	// foreach ($_SESSION as $unaSesion => $valor) {
	// 	$datosClaveValor=$unaSesion."=".$valor;
	// 	echo "\n\rDatos de la variable sesion y su valor: ".$datosClaveValor;
	// }
	echo "\n\rNombre por sesión: ".$_SESSION["nombre"];
	echo "\n\rAp1 por sesión: {$_SESSION["ap1"]}";
	echo "\n\ridProfe sesión: {$_SESSION["idProfe"]}";
// eliminar esta variable sin eliminar la sesion

	unset($_SESSION["nombre"]);
// borro todas las variables sin eliminar la sesion
	session_unset();

	$_SESSION["nuevaVariable"]="blablabla";
	echo "\n\r nueva : {$_SESSION["nuevaVariable"]}";
// desconectar la sesion
	session_destroy();




?>