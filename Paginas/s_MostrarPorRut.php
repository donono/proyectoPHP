<?php

include_once '../Dao/PostulanteDaoImp.php';
$rut = $_POST["rutMostrar"];
session_start();
$_SESSION["salida"] = PostulanteDaoImp::BuscarPorRut($rut);
include_once 'v_MostrarPorRut.php';
exit;

