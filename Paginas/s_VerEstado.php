<?php

include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dto/SolicitudDto.php';
include_once '../Dto/PostulanteDto.php';

if (isset($_SESSION["logged"])) {

    $dto = new PostulanteDto();
    $dto = $_SESSION["logged"];
    $id = SolicitudDaoImp::MostrarEstadoPorRut($dto->getRut());
    session_start();
    $_SESSION["estado"] = SolicitudDaoImp::IdToText($id);
}
Header('Location:v_VerEstado.php');
//include_once 'v_VerEstado.php';