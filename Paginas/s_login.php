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
        $logged = $dao->getUsuario($rut);
        $_SESSION["rut"] = $logged->getRut();
        $_SESSION["pass"] = $logged->getContrasena();
        $_SESSION["nombre"] = $logged->getNombre() . ' ' . $logged->getAp_paterno() . ' ' . $logged->getAp_materno();
        session_commit();
        include_once 'v_inicio.php';
    } else {
        include_once 'v_login.php';
        echo '<script>badLogin();</script>';
    }
} else {
    include_once 'v_login.php';
    echo '<script>badRut();</script>';
}



