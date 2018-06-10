<?php

include_once '../Sql/ClasePdo.php';

class EducacionDaoImp {

    public static function Listar() {
        $edu = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM educacion");
            $stmt->execute();

            $res = $stmt->fetchAll();
            foreach ($res as $educacion) {
                $edu->append($educacion['nombre']);
            }
            return $edu;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
