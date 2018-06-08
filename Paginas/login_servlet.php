<?php

include_once '../Dao/UsuarioDaoImp.php';
include_once '../Dto/UsuarioDto.php';

$rut = $_POST["txtRut"];
$contraseña = $_POST["txtRut"];


$dto = new UsuarioDto();
$dto->setRut($rut);
$dto->setContrasena($contraseña);

if (UsuarioDaoImp::validarRut($dto->getRut())) {
    
    if (UsuarioDaoImp::login($dto)) {
        session_start();
        $_SESSION["logged"] = $dto;

        header("Location: inicio.php");
        echo "funciona";
    } else {
        header("Location: login_page.php");
        echo "no funciona";
        echo "<script>badLogin();</script>";
    }
} else {
    header("Location: login_page.php");
    echo "<script>badRut();</script>";
}



