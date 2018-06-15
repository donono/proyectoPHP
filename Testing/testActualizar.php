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

$dto->setRut("105445202 ");
$dto->setNombre("Jose");
$dto->setAp_paterno("Sanchez");
$dto->setAp_materno("Martinez");
$dto->setFechaNacimiento("1985-03-25");
$dto->setSexo("M");
$dto->setHijos(0);
$dto->setTelefono("7774455");
$dto->setEmail("jsmartinez@mail.com");
$dto->setDireccion("Los andes 25");
$dto->setEnfermedad(0);
$dto->setSueldo(785000);
$dto->setEstadoCivil(1);
$dto->setRenta(1);
$dto->setEducacion(2);

$comuna = "Vitacura";
$dto->setComuna(ComunaDaoImp::TextToId($comuna));


if(PostulanteDaoImp::modificar($dto)){
    echo "Postulante actualizado";
}else{
    echo "No se actualizó";
}
