<?php

include_once '../Sql/ClasePdo.php';

class ComunaDaoImp {

    static function ListarTodas() {
        $comunas = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM comuna ORDER DESC");
            $stmt->execute();

            $res = $stmt->fetchAll();
            foreach ($res as $comuna) {
                $comunas->append($comuna['comuna']);
            }
            return $comunas;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
