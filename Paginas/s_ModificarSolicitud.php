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
$postulante->setHijos($_POST["txtHijos"]);
$postulante->setTelefono($_POST["txtTelefono"]);
$postulante->setEmail($_POST["txtEmail"]);
$postulante->setDireccion($_POST["txtDireccion"]);

if (isset($_POST["checkEnfermedad"])) {
    $postulante->setEnfermedad(1);
} else {
    $postulante->setEnfermedad(0);
}

$postulante->setSueldo($_POST["txtSueldo"]);
$postulante->setEstadoCivil(EstadoCivilDaoImp::TextToId($_POST["dropEstadoCivil"]));
$postulante->setRenta(RentaDaoImp::TextToId($_POST["dropRenta"]));
$postulante->setEducacion(EducacionDaoImp::TextToId($_POST["dropEducacion"]));
$postulante->setComuna(ComunaDaoImp::TextToId($_POST["dropComuna"]));


if(PostulanteDaoImp::modificar($postulante) && SolicitudDaoImp::Modificar($dto)){
    echo "<script> alert('Registros modificados')</script>";
}else{
    echo "<script> alert('No se modificó')</script>";
}

include_once 'v_MostrarTodas.php';

