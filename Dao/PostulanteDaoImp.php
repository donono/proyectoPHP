<?php

include_once '../Sql/ClasePdo.php';
include_once 'BaseDao.php';
include_once '../Dto/PostulanteDto.php';
include_once '../Dto/SolicitudDto.php';

class PostulanteDaoImp implements BaseDao {

    public static function agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO postulante "
                    . "(rut, nombre, ap_paterno, ap_materno, fecha_nacimiento, sexo, telefono, hijos, email, "
                    . "direccion, enfermedad, sueldo, id_estado, id_renta, id_educacion, id_comuna) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
            $fecha_nacimiento = $dto->getFechaNacimiento();
            $sexo = $dto->getSexo();
            $telefono = $dto->getTelefono();
            $hijos = $dto->getHijos();
            $email = $dto->getEmail();
            $direccion = $dto->getDireccion();
            $enfermedad = $dto->getEnfermedad();
            $sueldo = $dto->getSueldo();
            $estado = $dto->getEstadoCivil();
            $renta = $dto->getRenta();
            $educacion = $dto->getEducacion();
            $comuna = $dto->getComuna();


            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }

            $pdo = null;
        } catch (Exception $ex) {
            echo "No se pudo agregar. Stacktrace: " . $ex->getMessage();
        }
        return false;
    }

    public static function eliminar($rut) {
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM postulante WHERE rut=?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            echo "No se pudo eliminar ". $ex->getMessage();
        }
        return false;
        
    }

    public static function listarTodos() {
        $postulantes = new ArrayObject();
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT rut, nombre, ap_paterno FROM postulante");
            $stmt->execute();
            
            $rs = $stmt->fetchAll();
            
            foreach ($rs as $sol) {
                $dto = new PostulanteDto();
                $dto->setRut($sol["rut"]);
                $dto->setNombre($sol["nombre"]);
                $dto->setAp_paterno($sol["ap_paterno"]);
                $postulantes->append($dto);
            }
            return $postulantes;
            
        } catch (Exception $ex) {
            echo "Error al listar ".$ex->getMessage();
        }
        
    }

    public static function modificar($dto) {
        
    }

    public static function BuscarPorRut($rut) {
        $salida = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM postulante WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $rs = $stmt->fetchAll();

            foreach ($rs as $sol) {
                if ($sol["rut"] == $rut) {
                    $dto = new PostulanteDto();
                    $dto->setRut($sol["rut"]);
                    $dto->setNombre($sol["nombre"]);
                    $dto->setAp_paterno($sol["ap_paterno"]);
                    $dto->setAp_materno($sol["ap_materno"]);
                    $dto->setFechaNacimiento($sol["fecha_nacimiento"]);
                    $dto->setSexo($sol["sexo"]);
                    $dto->setHijos($sol["hijos"]);
                    $dto->setTelefono($sol["telefono"]);
                    $dto->setEmail($sol["email"]);
                    $dto->setDireccion($sol["direccion"]);
                    $dto->setEnfermedad($sol["enfermedad"]);
                    $dto->setSueldo($sol["sueldo"]);
                    $dto->setEstadoCivil($sol["id_estado"]);
                    $dto->setRenta($sol["id_renta"]);
                    $dto->setEducacion($sol["id_educacion"]);
                    $dto->setComuna($sol["id_comuna"]);
                    $salida->append($dto);
                } else {
                    echo "No hay solicitudes con ese rut";
                }
            }
            return $salida;
        } catch (Exception $ex) {
            echo "Error al mostrar " . $ex->getMessage();
        }
    }

}
