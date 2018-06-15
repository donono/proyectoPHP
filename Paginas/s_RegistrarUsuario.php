<?php

include_once '../Dto/UsuarioDto.php';
include_once '../Dao/UsuarioDaoImp.php';

$dto = new UsuarioDto();

$dto->setRut($_POST["txtRut"]);
$dto->setNombre($_POST["txtNombre"]);
$dto->setAp_paterno($_POST["txtPaterno"]);
$dto->setAp_materno($_POST["txtMaterno"]);
$dto->setContrasena($_POST["txtContrasena"]);

if (UsuarioDaoImp::agregar($dto)) {
    include_once 'v_RegistrarUsuario.php';
    echo '<script>ExitoRegister();</script>';
} else {
    include_once 'v_RegistrarUsuario.php';
    echo '<script>badRegister();</script>';
}

