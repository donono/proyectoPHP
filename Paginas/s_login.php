<?php
session_start();

include_once '../Dao/UsuarioDaoImp.php';
include_once '../Dto/UsuarioDto.php';

$rut = $_POST["txtRut"];
$contraseña = $_POST["txtContraseña"];

$dao = new UsuarioDaoImp();

$dto = new UsuarioDto();
$dto->setRut($rut);
$dto->setContrasena($contraseña);

if ($dao->validarRut($dto->getRut())) {

    if ($dao->login($dto)) {

        $_SESSION["logged"] = $dao->getUsuario($rut);
        include_once 'v_inicio.php';
    } else {
        include_once 'v_login.php';
        echo '<script>badLogin();</script>';
    }
} else {
    include_once 'v_login.php';
    echo '<script>badRut();</script>';
}



