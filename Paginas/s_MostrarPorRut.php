<?php
session_start();

include_once '../Dao/PostulanteDaoImp.php';
$rut = $_POST["rutMostrar"];
$_SESSION["salida"] = PostulanteDaoImp::BuscarPorRut($rut);
session_commit();
include_once 'v_MostrarPorRut.php';
