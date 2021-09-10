<?php
	$cantidadPendiente = count($_POST);

		$mySql="UPDATE `profes` SET ";

		foreach ($_POST as $key => $value) {
			if($key!="idProfe"){
			$mySql.="`{$key}` = '{$value}'";
			if ($cantidadPendiente!=1) $mySql.=", ";
			}
			$cantidadPendiente--;
		}
		$mySql.="WHERE idProfe=".$_POST["idProfe"];
		// echo $mySql;

		$grupoPersonas="Adrián Myrella Anthony Ahmed Rafia Genís Pris Federico";

		$persona=explode(" ",$grupoPersonas);

	//	echo count($persona);

		// echo $persona[0];

	//	echo $persona[count($persona)-1];

		$datos="Carlos:Antón:Mesa:Experto Docente";

		echo strlen($datos);

		$datosUnoaUno=explode(":",$datos);

	//	echo $datosUnoaUno[0];

		list($nombre, $ap1, $ap2, $cargo)=explode(":",$datos);

	//	echo "mi nombre es: {$nombre}";

	//	echo substr('Cadena',0,4);

	//	echo substr('Cadena',-3,2);

	//	echo substr('Cadena',1);

		// $variable = "   Texto   ";

		// echo $variable."-";

		// echo trim($variable);

		// echo str_pad("frase",3,"-");


//		setlocale(LC_ALL,es_ES.UTF-8);

	//	strftime($b);

		echo "Fecha 1: ".date("d-m-Y H:i:s");

		echo "Fecha 2: ".date('Y/m/d');

		$hoy=getdate();

		echo "Estamos a: {$hoy['weekday']}";

		echo "Estamos a: {$hoy['hours']} horas y {$hoy['minutes']} minutos y {$hoy['seconds']} segundos";

		$fechaActual=date('Y-m-d');

		echo "\n\r{$fechaActual}";

		echo "\n\rSemana: ".date("W");

		echo "\n\rSemana: ".date("W",strtotime("2021-10-30"));

		echo "\n\rMes letra: ".date("F",strtotime($fechaActual));

		echo date("m");

		echo "\n\rCantidad días mes: ".date("d",mktime(0,0,0,6,0,date('Y')));

		echo "\n\r día anterior y posterior: ";

		$data['fechaAnt']= date("d/m/Y",strtotime($fechaActual)-3600);

		$data['fechaPost']= date('d-m-Y',mktime(0,0,0,6,0,date('Y')));

		echo "\n\rFecha 1:".date("d-m-Y H:i:s");
	    // echo "\n\rFecha 2:".date('Y/m/d');
	    // echo print_r(getdate());
	    // $hoy=getdate();
	    // echo "\n\rSon las: {$hoy['hours']} horas, {$hoy['minutes']} minutos y {$hoy['seconds']} segundos";
	 
	    // $fechaActual=date('Y-m-d');
	    // echo "\n\r{$fechaActual}";
	    // echo "\n\rSemana: ".date("W");
	    // echo "\n\rSemana: ".date("W",strtotime("2021-10-30"));
	    // echo "\n\rMes letra: ".date("F",strtotime($fechaActual));
	    // echo date("m");
	    // echo "\n\rCantidad días mes: ".date("d",mktime(0,0,0,6,0,date('Y')));
	    // echo "\n\r Día anterior y posterior: ";
	    // $data['fechaAnt']= date("d/m/Y",strtotime($fechaActual)-3600);
	    // $data['fechaPost']=date("d/m/Y",mktime(0,0,0,substr($fechaActual,5,2), substr($fechaActual,8,2), substr($fechaActual,0,4))+86400);
	    // echo "\n\rAnterior: ".$data['fechaAnt'];
	    // echo "\n\rSiguiente: ".$data['fechaPost'];
	    // echo "\n\rLa funcion devuelve: ".anteriorPosterior("2020-03-15");
	    // $fechasJuntas=anteriorPosterior("2020-03-15");
	    // $fechasSeparadas=explode("-",$fechasJuntas);
	    // echo "\n\rAyer fue: ".$fechasSeparadas[0];
	    // echo "\n\rMañana será: ".$fechasSeparadas[1];
	    
	    // $hoy=date("Y-m-d",time());
	    // $ayer=date("Y-m-d",time()-24*60*60);
	    // $manana=date("Y-m-d",time()+24*60*60);
	    // echo "\r\n Fecha de hoy: {$hoy}";
	    // echo "\r\n Fecha de ayer: {$ayer}";
	    // echo "\r\n Fecha de mañana: {$manana}";
	 
	    // //
	    // /**
	    //  * La fecha de tener formato YYYY-mm-dd
	    //  * return fechas separadas por guion
	    //  */
	    // function anteriorPosterior($fechaBuscar){
	    //     $ayer= date("d/m/Y",strtotime($fechaBuscar)-3600);
	    //     $manana=date("d/m/Y",mktime(0,0,0,substr($fechaBuscar,5,2), substr($fechaBuscar,8,2), substr($fechaBuscar,0,4))+86400);
	    //     return $ayer."-".$manana;
	    // }

?>