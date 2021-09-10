<?php
// correo estático
    require("../inc/functions.php");
    $asunto="saludos terrícolas";
    $body="saludamos a ";

    $mySql="INSERT INTO `emails`(`asunto`,`body`,`fecha`) VALUES ('saludos','saludamos a nombre persona',CURRENT_TIME)";

    $mySql="SELECT `nom`,`email`,`idProfe` FROM `profes` WHERE `idProfe`>7";

    $conexion=conectar();

    $resultNombre=mysqli_query($conexion,$mySql);

    $resultMail=mysqli_query($conexion,$mySql);
    
    $idemail=mysqli_insert_id($conexion);

    desconectar($conexion);

    $rows=array();

    while ($row=mysqli_fetch_array($resultMail)) {
        //echo print_r($row);
        //echo $row['nom'];
        $body=$row['nom'];

        $mySql="INSERT INTO `emailsusers`(`idemail`, `idprofe`, `fecha`) VALUES ({$idemail},{$row['idProfe']},CURRENT_TIME)";

        sendmail($row['email'],$asunto,$body);

        $conexion=conectar();
        $resultMail=mysqli_query($conexion,$mySql);
        desconectar($conexion);
        }
    //echo json_encode($rows);    
    
?>