<?php

include_once '../Dao/PostulanteDaoImp.php';
include_once '../Dao/SolicitudDaoImp.php';

// Prueba de commit
$rut = $_POST["rutModificar"];

$salida = PostulanteDaoImp::BuscarPorRut($rut);
$solicitud = SolicitudDaoImp::ListarPorRut($rut);
session_start();
$_SESSION["salida"] = PostulanteDaoImp::BuscarPorRut($rut);
$_SESSION["solicitud"] = SolicitudDaoImp::ListarPorRut($rut);
session_commit();
include_once 'v_ModificarSolicitud.php';

