<?php

include_once 'BaseDao.php';
include_once '../Sql/ClasePdo.php';
include_once '../Dto/UsuarioDto.php';

class UsuarioDaoImp implements BaseDao {

    public static function agregar($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO usuario(rut,contrasena, nombre, ap_paterno, ap_materno) "
                    . "values(?,?,?,?,?)");

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $contrasena);
            $stmt->bindParam(3, $nombre);
            $stmt->bindParam(4, $ap_paterno);
            $stmt->bindParam(5, $ap_materno);

            $rut = $dto->getRut();
            $contrasena = $dto->getContrasena();
            $nombre = $dto->getNombre();
            $ap_paterno = $dto->getAp_paterno();
            $ap_materno = $dto->getAp_materno();

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al agregar un usuario. Trace: " . $ex->getTraceAsString());
        }
        return false;
    }

    public static function eliminar($key) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("DELETE FROM usuario WHERE rut = ?");

            $stmt->bindValue(1, $key);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al eliminar un usuario. Trace: " . $ex->getTraceAsString());
        }
        return false;
    }

    public static function listarTodos() {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario");
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new UsuarioDto();
                $dto->setRut($value['rut']);
                $dto->setContrasena($value['contrasena']);
                $lista->append($dto);
            }

            $pdo = null;
            return $lista;
        } catch (Exception $ex) {
            throw new Exception("Error al listar los usuarios. Trace: " . $ex->getTraceAsString());
        }
        return null;
    }

    public static function modificar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE usuario"
                    . "SET contrasena"
                    . "WHERE rut = ?");
            $stmt->bindValue(1, $dto->getRut());
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al modificar un usuario. Trace: " . $ex->getTraceAsString());
        }
        return false;
    }

    public static function validarRut($key) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rut = ?");
            $stmt->bindParam(1, $key);
            $stmt->execute();
            $resultado = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            }
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario. Trace: " . $ex->getTraceAsString());
        }
        $pdo = null;
        return false;
    }

    public static function login($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rut = ? AND contrasena = ?");
            $rut = $dto->getRut();
            $pass = utf8_decode($dto->getContrasena());
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach ($resultado as $value) {
                if ($value["rut"] === $rut && $value["contrasena"] === $pass) {
                    return true;
                } else {
                    return false;
                }
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function getUsuario($key) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rut = ?");
            $stmt->bindParam(1, $key);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new UsuarioDto();
                $dto->setRut($value["rut"]);
                $dto->setContrasena($value["contrasena"]);
                $dto->setNombre($value["nombre"]);
                $dto->setAp_paterno($value["ap_paterno"]);
                $dto->setAp_materno($value["ap_materno"]);
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario. Trace: " . $ex->getTraceAsString());
        }
        return null;
    }

}
