<?php

include_once '../Dao/UsuarioDaoImp.php';

if (isset($_POST["txtRut"])) {
    $data = $_POST["txtRut"];

    if (UsuarioDaoImp::validarRut($data)) {
        echo json_encode(array("d"=>'1'));
    } else {
        echo json_encode(array("d"=>'0'));
    }
}