<?php

include_once '../Sql/ClasePdo.php';

class EstadoCivilDaoImp {

    static function Listar() {
        $estado = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM estadocivil ORDER DESC");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $est) {
                $estado->append($est['descripcion']);
            }
            return $estado;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
