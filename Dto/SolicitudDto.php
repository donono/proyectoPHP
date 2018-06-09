<?php


class SolicitudDto {
    private $id;
    private $estado;
    private $rut;
    
    function __construct() {
        $this->id = "";
        $this->estado = "";
        $this->rut = "";
    }
    
    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function getRut() {
        return $this->rut;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }





}
