<?php

include_once '../Dao/PostulanteDaoImp.php';
include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dto/PostulanteDto.php';
include_once '../Dto/SolicitudDto.php';
include_once '../Dao/ComunaDaoImp.php';
include_once '../Dao/EducacionDaoImp.php';
include_once '../Dao/EstadoCivilDaoImp.php';
include_once '../Dao/RentaDaoImp.php';

$dto = new SolicitudDto();
$postulante = new PostulanteDto();

//Modificar solicitud
$dto->setEstado($_POST["radioEstado"]);
$dto->setRut($_POST["txtRut"]);

// Modificar postulante
$postulante->setRut($_POST["txtRut"]);
$postulante->setNombre($_POST["txtNombre"]);
$postulante->setAp_paterno($_POST["txtPaterno"]);
$postulante->setAp_materno($_POST["txtMaterno"]);
$postulante->setFechaNacimiento($_POST["dateNacimiento"]);
$postulante->setSexo($_POST["radioSexo"]);
if (!isset($_POST["checkHijos"])) {
    $postulante->setHijos(0); //si no se selecciona el checkbox de hijos la cantidad sera 0 por defecto
} else {
    $postulante->setHijos($_POST["txtHijos"]);
}
$postulante->setTelefono($_POST["txtTelefono"]);
$postulante->setEmail($_POST["txtEmail"]);
$postulante->setDireccion($_POST["txtDireccion"]);

if (isset($_POST["checkEnfermedad"])) {
    $postulante->setEnfermedad(1);
} else {
    $postulante->setEnfermedad(0);
}

$postulante->setSueldo($_POST["txtSueldo"]);

$estadoCivil = trim($_POST["dropEstadoCivil"]);
$postulante->setEstadoCivil(EstadoCivilDaoImp::TextToId($estadoCivil));

$renta = trim($_POST["dropRenta"]);
$postulante->setRenta(RentaDaoImp::TextToId($renta));

$educacion = trim($_POST["dropEducacion"]);
$postulante->setEducacion(EducacionDaoImp::TextToId($educacion));

$comuna = trim($_POST["dropComuna"]);
$postulante->setComuna(ComunaDaoImp::TextToId($comuna));


if (PostulanteDaoImp::modificar($postulante) && SolicitudDaoImp::Modificar($dto)) {
    include_once 'v_MostrarTodas.php';
    echo '<script>Success();</script>';
} else {
    include_once 'v_MostrarTodas.php';
    echo '<script>Error();</script>';
}


