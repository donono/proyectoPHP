<?php

class UsuarioDto {

    private $rut;
    private $contrasena;
    private $nombre;
    private $ap_materno;
    private $ap_paterno;

    function __construct() {
        $this->rut = "";
        $this->contrasena = "";
        $this->nombre = "";
        $this->ap_materno = "";
        $this->ap_paterno = "";
    }
    

    function getRut() {
        return $this->rut;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAp_materno() {
        return $this->ap_materno;
    }

    function getAp_paterno() {
        return $this->ap_paterno;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAp_materno($ap_materno) {
        $this->ap_materno = $ap_materno;
    }

    function setAp_paterno($ap_paterno) {
        $this->ap_paterno = $ap_paterno;
    }

}
