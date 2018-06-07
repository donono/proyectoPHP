<?php

include_once '../Dao/UsuarioDaoImp.php';
include_once '../Dto/UsuarioDto.php';

$post = json_decode(file_get_contents('php://input'), true);


if (isset($post["rut"])) {
    $dto = new UsuarioDto();
    $dto->setRut($post["rut"]);
    $dto->setContrasena($post["contrasena"]);

    if (UsuarioDaoImp::login($dto)) {
        
    }
}


header("Location: login_page.php");
