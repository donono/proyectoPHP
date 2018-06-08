<?php

include_once '../Dao/UsuarioDaoImp.php';
include_once '../Dto/UsuarioDto.php';

$rut = $_POST["txtRut"];
$rut = $_POST["txtRut"];
    if (UsuarioDaoImp::login($dto)) {
        
        header("Location: login_page.php");

    }
}


