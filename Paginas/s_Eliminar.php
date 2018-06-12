<?php

include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dao/PostulanteDaoImp.php';

$postulante = new PostulanteDaoImp();
$solicitud = new SolicitudDaoImp();

$rut = $_POST["rutEliminar"];

if($postulante->eliminar($rut) && $solicitud->Eliminar($rut)){
    echo "<script> alert('Registro eliminado con éxito') </script>";
}else{
    echo "<script> alert('No se ha podido eliminar') </script>";
}

include_once 'v_MostrarTodas.php';