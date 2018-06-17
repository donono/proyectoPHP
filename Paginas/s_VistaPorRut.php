<?php

include_once '../Dto/SolicitudDto.php';
include_once '../Dao/SolicitudDaoImp.php';

$rut = $_POST["txtRut"];
$salida = SolicitudDaoImp::ListarPorRut($rut);
$_SESSION["salida"] = $salida;


session_start();
session_commit();

include_once 'v_VistaQueries.php';