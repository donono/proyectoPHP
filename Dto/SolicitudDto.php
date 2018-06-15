<?php

class SolicitudDto {

    private $id;
    private $estado;
    private $rut;
    private $fecha;

    function __construct() {
        $this->id = "";
        $this->estado = "";
        $this->rut = "";
        $this->fecha = date('yyyy-mm-dd');
    }

    function getId() {
        return $this->id;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getFecha(){
        return $this->fecha;
    }
    function setDate($fecha){
        $this->fecha = $fecha;
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
