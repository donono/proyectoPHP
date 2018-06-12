<?php

include_once '../Dto/SolicitudDto.php';
include_once '../Sql/ClasePdo.php';

class SolicitudDaoImp {

    public static function AgregarSolicitud($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO solicitud (rut, estado) VALUES (?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $estado);

            $rut = $dto->getRut();
            $estado = $dto->getEstado();

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

    public static function ListarTodas() {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT estado FROM solicitud");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $solicitud) {
                $dto = new SolicitudDto();
                $dto->setEstado($solicitud["estado"]);
                $lista->append($dto);
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Error al listar " . $ex->getMessage();
        }
    }

    public static function MostrarEstadoPorRut($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $estado = "";

            foreach ($resultado as $value) {
                if ($value["rut"] == $rut) {
                    $estado = $value["estado"];
                }
            }
            return $estado;
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al mostrar estado " . $ex->getTraceAsString());
        }
    }
    
    public static function IdToText($id){
        try{
            $texto = "";
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE estado=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $rs = $stmt->fetchAll();
            
            foreach ($rs as $value) {
                if($value["estado"]==1){
                    $texto = "Pendiente";
                }else if($value["estado"]==2){
                    $texto = "Aprobada";
                }else{
                    $texto = "Reprobada";
                }
            }
            return $texto;
                    
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
    }
    
    public static function Eliminar($rut){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM solicitud WHERE rut=?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            echo "No se pudo eliminar " . $ex->getMessage();
        }   
        return false;
    }

}
