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
        $_SESSION["logged"] = $dto;

        include_once 'inicio.php';
    } else {
        //    header("Location: login_page.php");
        include_once 'login_page.php';
        echo '<script>badLogin();</script>';
    }
} else {
//    header("Location: login_page.php");
    include_once 'login_page.php';
    echo '<script>badRut();</script>';
}



