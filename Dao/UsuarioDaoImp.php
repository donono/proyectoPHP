<?php

include_once './BaseDao.php';
include_once '../Sql/ClasePdo.php';

class UsuarioDaoImp extends BaseDao {

    public static function agregar($dto) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO usuario(rut,contrasena) "
                    . "values(?,?)");

            $stmt->bindValue(1, $dto->getRut());
            $stmt->bindValue(2, $dto->getContrasena());

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

    public static function login($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rut= ? AND contrasena = ?");
            $stmt->bindValue(1, $dto->getRut());
            $stmt->bindValue(2, $dto->getContrasena());
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario. Trace: " . $ex->getTraceAsString());
        }
        return false;
    }

}
