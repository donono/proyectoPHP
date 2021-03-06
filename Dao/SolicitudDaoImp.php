<?php

include_once '../Dto/SolicitudDto.php';
include_once '../Sql/ClasePdo.php';

class SolicitudDaoImp {

    public static function AgregarSolicitud($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO solicitud (rut, estado,fecha_creacion) VALUES (?,?,NOW())");
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

    public static function IdToText($id) {
        try {
            $texto = "";
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE estado=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                if ($value["estado"] == 1) {
                    $texto = "Pendiente";
                } else if ($value["estado"] == 2) {
                    $texto = "Aprobada";
                } else {
                    $texto = "Reprobada";
                }
            }

            return $texto;
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
    }

    public static function Eliminar($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM solicitud WHERE rut=?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            echo "No se pudo eliminar " . $ex->getMessage();
        }
        return false;
    }

    public static function ListarPorRut($rut) {
        $dto = new SolicitudDto();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                $dto = new SolicitudDto();
                $dto->setRut($value["rut"]);
                $dto->setEstado($value["estado"]);
                return $dto;
            }
        } catch (Exception $ex) {
            echo "Error al listar " . $ex->getMessage();
        }
    }

    public static function Modificar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE solicitud SET estado = ? WHERE rut=?");
            $stmt->bindValue(1, $dto->getEstado());
            $stmt->bindValue(2, $dto->getRut());
            $stmt->execute();

            $pdo = null;
        } catch (Exception $ex) {
            echo "Error al modificar " . $ex->getMessage();
        }
        return true;
    }

    public static function tieneSolicitud($rut) {
        $dto = new SolicitudDto();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

            $pdo = null;
        } catch (Exception $ex) {
            echo "Error al validar si el usuario ya tiene una solicitud" . $ex->getMessage();
        }
    }

    public static function BuscarPorFecha($entrada, $fin) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM SOLICITUD WHERE fecha_creacion BETWEEN ? AND ?");
            $stmt->bindParam(1, $entrada);
            $stmt->bindParam(2, $fin);
            $stmt->execute();

            $rs = $stmt->fetchAll();
            foreach ($rs as $objeto) {
                $dto = new SolicitudDto();
                $dto->setRut($objeto["rut"]);
                $dto->setEstado($objeto["estado"]);
                $lista->append($dto);
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Error al listar ".$ex->getMessage();
        }
    }

}
