<?php

include_once '../Dao/SolicitudDaoImp.php';
include_once '../Dao/UsuarioDaoImp.php';

$rut = "187654825";
$estado = 3;

echo "Estado ". SolicitudDaoImp::IdToText($estado);