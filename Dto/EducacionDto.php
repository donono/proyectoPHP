<?php


class EducacionDto {
    private $id;
    private $descripcion;
    
    function __construct() {
        $this->id = 0;
        $this->descripcion = "";
    }
    
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



}
