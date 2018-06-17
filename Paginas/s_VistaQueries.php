<?php

session_start();

include_once '../Dto/SolicitudDto.php';
include_once '../Dao/SolicitudDaoImp.php';

if ($_POST["dateInicio"] != "" && $_POST["dateFin"] != "") {
    $entrada = $_POST["dateInicio"];
    $fin = $_POST["dateFin"];

    $salida = SolicitudDaoImp::BuscarPorFecha($entrada, $fin);
    $_SESSION["salidaFecha"] = $salida;
    $_SESSION["salidaRut"] = null;
    session_commit();
    include_once 'v_VistaQueries.php';
} else {
    session_commit();
    include_once 'v_VistaQueries.php';
    echo "<script>swal('favor seleccione las fechas solicitadas!', '', 'warning')</script>";
}

