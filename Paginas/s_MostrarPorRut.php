<?php

include_once '../Dao/PostulanteDaoImp.php';

$rut = $_POST["rutMostrar"];

$salida = PostulanteDaoImp::BuscarPorRut($rut);
if($salida->count()>0){
    session_start();
    $_SESSION["salida"]=$salida;
}else{
    echo "<script> alert('No hay solicitudes con ese RUT')</script>";
}

include_once 'v_MostrarPorRut.php';