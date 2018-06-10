<?php

include_once '../Sql/ClasePdo.php';

class ComunaDaoImp {

    public static function ListarTodas() {
        $comunas = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM comuna");
            $stmt->execute();

            $res = $stmt->fetchAll();
            foreach ($res as $comuna) {
                $comunas->append($comuna['nombre']);
            }
            return $comunas;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
