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

    public static function MostrarPorRut($rut) {
        $listaSolicitud = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $rs = $stmt->fetchAll();

            foreach ($rs as $sol) {
                $dto = new SolicitudDto();
                $dto->setEstado($sol['estado']);
                $listaSolicitud->append($dto);
            }
            return $listaSolicitud;
        } catch (Exception $ex) {
            
        }
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

    public static function MostrarEstado($rut) {
        $estado = "";
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT estado FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                if ($value["rut"] == $rut) {
                    $estado = $value["estado"];
                }
            }
            return $estado;
        } catch (Exception $ex) {
            echo "Error " . $ex->getMessage();
        }
    }

}
