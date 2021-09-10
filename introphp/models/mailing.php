<?php
// correo estático
    require("../inc/functions.php");

    require("../inc/phpmailer.class.php");

    $mySql="SELECT `emailhost`,`emailPort`,`emailUsername`,`emailPassword`,`emailFromName`,`emailFrom` from `parámetros`";

    $conexion=conectar();

    $resultMail=mysqli_query($conexion,$mySql);

    desconectar($conexion);

    $row=mysqli_fetch_row($resultMail);

    echo print_r($row);

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
    $mail->AddAddress($row[5]);
    $mail->Timeout=100;
    $mail->IsHTML(true);
    $mail->Charset="UTF-8";
 
    $mail->Subject="Asunto del email 14000";
    $mail->AddEmbeddedImage("../img/noimage.png","Imagen corporativa");
 
    $cuerpo="Contenido del email CON formato exquisito";
 
    $mail->Body =$cuerpo;
    $mail->AltBody ="Contenido nuevo perreque"; //Solo texto.
    $mail->AddAttachment("../inc/functions.php");
    
    $exito=$mail->Send();
    $mail->ClearAddresses();
 
    if(!$exito) return $mail->ErrorInfo;
    else echo "Mail Enviado";
 
?>
