<?php

class PostulanteDto {

    private $rut;
    private $nombre;
    private $ap_paterno;
    private $ap_materno;
    private $fechaNacimiento;
    private $sexo;
    private $hijos;
    private $telefono;
    private $email;
    private $direccion;
    private $enfermedad;
    private $sueldo;
    private $estadoCivil;
    private $renta;
    private $educacion;
    private $comuna;

    function __construct() {
        $this->rut = "";
        $this->nombre = "";
        $this->ap_paterno = "";
        $this->ap_materno = "";

        $this->fechaNacimiento = date("d-m-Y");
        $this->sexo = "";
        $this->hijos = "";
        $this->telefono = "";
        $this->email = "";
        $this->direccion = "";
        $this->enfermedad = "";
        $this->sueldo = "";
        $this->estadoCivil = "";
        $this->renta = "";
        $this->educacion = "";
        $this->comuna = "";
    }

    function getRut() {
        return $this->rut;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAp_paterno() {
        return $this->ap_paterno;
    }

    function getAp_materno() {
        return $this->ap_materno;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getHijos() {
        return $this->hijos;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEnfermedad() {
        return $this->enfermedad;
    }

    function getSueldo() {
        return $this->sueldo;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getRenta() {
        return $this->renta;
    }

    function getEducacion() {
        return $this->educacion;
    }

    function getComuna() {
        return $this->comuna;
    }

    function setRut($rut) {
        $this->rut = $rut;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAp_paterno($ap_paterno) {
        $this->ap_paterno = $ap_paterno;
    }

    function setAp_materno($ap_materno) {
        $this->ap_materno = $ap_materno;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setHijos($hijos) {
        $this->hijos = $hijos;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEnfermedad($enfermedad) {
        $this->enfermedad = $enfermedad;
    }

    function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setRenta($renta) {
        $this->renta = $renta;
    }

    function setEducacion($educacion) {
        $this->educacion = $educacion;
    }

    function setComuna($comuna) {
        $this->comuna = $comuna;
    }

}
