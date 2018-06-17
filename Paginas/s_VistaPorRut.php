<?php

session_start();

include_once '../Dto/SolicitudDto.php';
include_once '../Dao/SolicitudDaoImp.php';
if ($_POST["txtRut"] != "") {
    $rut = $_POST["txtRut"];
    $salida = SolicitudDaoImp::ListarPorRut($rut);
    $_SESSION["salidaRut"] = $salida;
    $_SESSION["salidaFecha"] = null;
    session_commit();
    include_once 'v_VistaQueries.php';
} else {
    session_commit();
    include_once 'v_VistaQueries.php';
    echo "<script>swal('no ha ingresado un rut!', '', 'warning')</script>";
}
