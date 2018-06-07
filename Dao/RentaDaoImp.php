<?php

include_once '../Sql/ClasePdo.php';

class RentaDaoImp {

    static function Listar() {
        $rentas = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM renta ORDER DESC");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $renta) {
                $rentas->append($renta['descripcion']);
            }
            return $rentas;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

}
