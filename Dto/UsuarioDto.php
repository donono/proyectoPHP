<?php


class UsuarioDto {
    private $rut;
    private $contrasena;
    
    function __construct() {
        $this->rut = "";
        $this->contrasena = "";
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



}
