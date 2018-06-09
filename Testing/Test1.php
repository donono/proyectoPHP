<?php
include_once '../Dao/PostulanteDaoImp.php';
include_once '../Dto/PostulanteDto.php';

$dto = new PostulanteDto();
$dao = new PostulanteDaoImp();

$dto->setRut("167778889");
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
$dto->setComuna(22);

if($dao->agregar($dto)){
    echo "Agregado con éxito";
}else{
    echo "No se agregó";
}
