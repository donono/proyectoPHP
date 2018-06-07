<?php


class SolicitudDto {
    private $id;
    private $estado;
    
    function __construct() {
        $this->id = 0;
        $this->estado = "";
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



}
