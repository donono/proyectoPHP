<?php

include_once '../Dao/PostulanteDaoImp.php';
include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dto/PostulanteDto.php';
include_once '../Dto/SolicitudDto.php';
include_once '../Dao/ComunaDaoImp.php';
include_once '../Dao/EducacionDaoImp.php';
include_once '../Dao/EstadoCivilDaoImp.php';
include_once '../Dao/RentaDaoImp.php';

$dto = new PostulanteDto();
$solicitud = new SolicitudDto();

$dto->setRut($_POST["txtRut"]);
$dto->setNombre($_POST["txtNombre"]);
$dto->setAp_paterno($_POST["txtPaterno"]);
$dto->setAp_materno($_POST["txtMaterno"]);
$dto->setFechaNacimiento($_POST["dateNacimiento"]);
$dto->setSexo($_POST["radioSexo"]);

// Settear cantidad de hijos si el checkbox está marcado
if(isset($_POST["checkHijos"])){
    $dto->setHijos($_POST["txtHijos"]);
    // Settear en 0 si el checkbox no está marcado
}else{
    $dto->setHijos(0);
}

$dto->setTelefono($_POST["txtTelefono"]);
$dto->setEmail($_POST["txtEmail"]);
$dto->setDireccion($_POST["txtDireccion"]);

// Settea enfermedad
if(isset($_POST["checkEnfermedad"])){
    $dto->setEnfermedad(1);
}else{
    $dto->setEnfermedad(0);
}

$dto->setSueldo($_POST["txtSueldoLiquido"]);
$dto->setEstadoCivil(EstadoCivilDaoImp::TextToId($_POST["dropEstadoCivil"]));
$dto->setRenta(RentaDaoImp::TextToId($_POST["dropRenta"]));
$dto->setEducacion(EducacionDaoImp::TextToId($_POST["dropEducacion"]));
$dto->setComuna(ComunaDaoImp::TextToId($_POST["dropComuna"]));

$solicitud->setEstado(1);
$solicitud->setRut($_POST["txtRut"]);

if(PostulanteDaoImp::agregar($dto)&& SolicitudDaoImp::AgregarSolicitud($solicitud)){
    echo "<script> alert('Postulante y Solicitud agregados') </script>";
}else{
    echo "<script> alert('No se pudo generar registros') </script>";
}

include_once 'v_AgregarPostulante.php';
