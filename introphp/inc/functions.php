<?php
	function conectar(){
		// // función para conectar con base de datos
		//$conexion=@mysqli_connect("localhost","root","","projecteco");
		$conexion = @mysqli_connect("bbdd.cobd.es", "ddb170735", "Proj@2021", "ddb170735");
		if (!$conexion) {
			// si no hay conexion, dará mensaje de error
			die("Error en la conexion con la DDBB: ".mysqli_connect_error());
		}
		mysqli_set_charset($conexion,"utf8");
		mysqli_query($conexion,"SET lc_time_names='es_ES'");
		return $conexion;
	}
	function desconectar($conexion){
		mysqli_close($conexion);
	}

	function sendmail($mailTo,$asunto,$body,$adjuntos=""){
		 require_once("../inc/phpmailer.class.php");
		 $mySql="SELECT `emailhost`,`emailPort`,`emailUsername`,`emailPassword`,`emailFromName`,`emailFrom` from `parametros`";

    $conexion=conectar();

    $resultMail=mysqli_query($conexion,$mySql);

    desconectar($conexion);

    $row=mysqli_fetch_row($resultMail);
		$mail= new PHPMailer();
	   	$mail->IsSMTP();
	    $mail->SMTPAuth=true;
	    $mail->SMTPSecure="tls";
	    $mail->Host=$row[0];
	    $mail->Port=$row[1];
	    $mail->Username=$row[2];
	    $mail->Password=$row[3];
	    $mail->FromName=$row[4];
	    $mail->From=$row[5];
	 
	    $mail->SMTPDebug=1; //Mostrar fallos conexión SMTP.
	    $mail->SMTPDebug=2; //Mostrar pasos que va haciendo en conexión SMTP.
	 
	    $mail->AddReplyTo($row[5]);
	    $mail->AddAddress($mailTo);
	    $mail->Timeout=100;
	    $mail->IsHTML(true);
	    $mail->CharSet="UTF-8";
	 
	    $mail->Subject=$asunto;
	    //$mail->AddEmbeddedImage("../img/noimage.png","Imagen corporativa");
	 
	    $mail->Body =$body;
	    $mail->AltBody =$body;
	     //Solo texto.
	    if($adjuntos!=""){
	    	$ficheroAdjunto=explode(",",$adjuntos);

	    	foreach($ficheroAdjunto as $fichero){
	    		$mail->AddAttachment($fichero);
	    	}
	    }
	   // $mail->AddAttachment("../inc/functions.php");
	    
	   $exito=$mail->Send();
	    $mail->ClearAddresses();
	 
	    if(!$exito) return $mail->ErrorInfo;
	    else echo "Mail Enviado";
	}
?>