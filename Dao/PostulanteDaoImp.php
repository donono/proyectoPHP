<?php

include_once '../Sql/ClasePdo.php';
include_once './BaseDao.php';
include_once '../Dto/PostulanteDto.php';

class PostulanteDaoImp implements BaseDao {

    public static function agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO postulante "
                    . "(rut, nombre, ap_paterno, ap_materno, fecha_nacimiento, sexo, telefono, hijos, email, "
                    . "direccion,enfermedad, sueldo, estado, renta, educacion, comuna) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $ap_paterno);
            $stmt->bindParam(4, $ap_materno);
            $stmt->bindParam(5, $fecha_nacimiento);
            $stmt->bindParam(6, $sexo);
            $stmt->bindParam(7, $telefono);
            $stmt->bindParam(8, $hijos);
            $stmt->bindParam(9, $email);
            $stmt->bindParam(10, $direccion);
            $stmt->bindParam(11, $enfermedad);
            $stmt->bindParam(12, $sueldo);
            $stmt->bindParam(13, $estado);
            $stmt->bindParam(14, $renta);
            $stmt->bindParam(15, $educacion);
            $stmt->bindParam(16, $comuna);
            
            $rut = $dto->getRut();
            $nombre = $dto->getNombre();
            $ap_paterno = $dto->getAp_paterno();
            $ap_materno = $dto->getAp_materno();
            $sexo = $dto-getSexo();
            $telefono = $dto->getTelefono();
            $hijos = $dto->getHijos();
            $email = $dto->getEmail();
            
        } catch (Exception $ex) {
            
        }
    }

    public static function eliminar($key) {
        
    }

    public static function listarTodos() {
        
    }

    public static function modificar($dto) {
        
    }

}
