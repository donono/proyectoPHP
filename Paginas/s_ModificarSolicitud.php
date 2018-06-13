<?php

include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dto/SolicitudDto.php';
$dto = new SolicitudDto();

$dto->setEstado($_POST["radioEstado"]);
$dto->setRut($_POST["rutModificar"]);

if(SolicitudDaoImp::Modificar($dto)){
    echo "<script> alert('Registro modificado') </script>";
}else{
    echo "<script> alert('Registro no se pudo modificar') </script>";
}

include_once 'v_MostrarTodas.php';

