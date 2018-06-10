<?php

include_once '../Sql/ClasePdo.php';

class EstadoCivilDaoImp {

    public static function Listar() {
        $estado = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM estado_civil");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $est) {
                $estado->append($est['nombre']);
            }
            return $estado;
        } catch (Exception $ex) {
            echo "Error al listar estados " . $ex->getMessage();
        }
        $estado->append("No hay estados");
    }

}
