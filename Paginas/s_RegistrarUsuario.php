<?php
include_once '../Dto/UsuarioDto.php';
include_once '../Dao/UsuarioDaoImp.php';

$dto = new UsuarioDto();

$dto->setRut($_POST["txtRut"]);
$dto->setNombre($_POST["txtNombre"]);
$dto->setAp_paterno($_POST["txtPaterno"]);
$dto->setAp_materno($_POST["txtMaterno"]);
$dto->setContrasena($_POST["txtContrasena"]);

if(UsuarioDaoImp::agregar($dto)){
    echo "<script> alert('Usuario ha sido registrado') </script>";
}else{
    echo "<script> alert('Usuario no se ha podido agregar')</script>";
}

include_once 'v_RegistrarUsuario.php';
