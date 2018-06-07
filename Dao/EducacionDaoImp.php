<?php

include_once '../Sql/ClasePdo.php';

class EducacionDaoImp {

    static function Listar() {
        $edu = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM educacion ORDER DESC");
            $stmt->execute();

            $res = $stmt->fetchAll();
            foreach ($res as $educacion) {
                $edu->append($educacion['descripcion']);
            }
            return $edu;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
