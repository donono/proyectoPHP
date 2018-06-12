<?php

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

        session_start();
        $_SESSION["logged"] = $dao->getUsuario($rut);

        header("Location: v_inicio.php");
    } else {
        header("Location: v_login.php");
        echo '<script>badLogin();</script>';
    }
} else {
    header("Location: v_login.php");
    echo '<script>badRut();</script>';
}



