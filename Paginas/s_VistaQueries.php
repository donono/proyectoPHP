<?php

include_once '../Dto/SolicitudDto.php';
include_once '../Dao/SolicitudDaoImp.php';

$entrada = $_POST["dateInicio"];
$fin = $_POST["dateFin"];

$salida = SolicitudDaoImp::BuscarPorFecha($entrada, $fin);
$_SESSION["salida"] = $salida;

session_start();
session_commit();

include_once 'v_VistaQueries.php';

