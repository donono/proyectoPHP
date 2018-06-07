<?php


class ComunaDto {
    private $id;
    private $comuna;
    
    function __construct() {
        $this->id = 0;
        $this->comuna = "";
    }
    
    function getId() {
        return $this->id;
    }

    function getComuna() {
        return $this->comuna;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }



}
