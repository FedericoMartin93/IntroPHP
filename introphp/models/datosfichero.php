<?php
    require("../inc/functions.php");
    if(isset($_POST['acc']) && $_POST['acc']=="r"){
        listadoDatosFichero();
    }
    if(isset($_POST['acc']) && $_POST['acc']=="c"){
        $mySql="INSERT INTO `datosfichero`(`descripcion`, `foto`) VALUES ('{$_POST['descripcion']}',";
        if(isset($_FILES['nuevaFoto'])){
            $fileNew=explode(".",$_FILES['nuevaFoto']['name']);
            $file=$fileNew[0].date("dmYhis").".".$fileNew[1];
            $mySql.="'{$file}'";
            move_uploaded_file($_FILES['nuevaFoto']['tmp_name'],"../img/".$file);
        } 
        else $mySql.="null";
        $mySql.=")";
        $conexion=conectar();
        mysqli_query($conexion,$mySql);
        desconectar($conexion);
        listadoDatosFichero();
    }
    if(isset($_POST['acc']) && $_POST['acc']=="u"){
        $mySql="UPDATE `datosfichero` SET `descripcion`='{$_POST['descripcion']}'";
        if(isset($_FILES['nuevaFoto'])){
            $fileNew=explode(".",$_FILES['nuevaFoto']['name']);
            $file=$fileNew[0].date("dmYhis").".".$fileNew[1];
            $mySql.=", `foto`='{$file}'";
            move_uploaded_file($_FILES['nuevaFoto']['tmp_name'],"../img/".$file);
        } 
        $mySql.=" WHERE `idDato`='{$_POST['idDato']}'";
        $conexion=conectar();
        mysqli_query($conexion,$mySql);
        desconectar($conexion);
        listadoDatosFichero();
    }
    function listadoDatosFichero(){
        $mySql="SELECT `idDato`, `descripcion`, `foto` FROM `datosfichero`";
        $conexion=conectar();
        $resultDatosFichero=mysqli_query($conexion,$mySql);
        desconectar($conexion);
        $rows=array();
        while($row=mysqli_fetch_array($resultDatosFichero)){
            $rows[]=$row;
        }
        echo json_encode($rows);
    }
?>
