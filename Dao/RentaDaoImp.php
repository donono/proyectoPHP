<?php

include_once '../Sql/ClasePdo.php';

class RentaDaoImp {

    public static function Listar() {
        $rentas = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT nombre FROM renta");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $renta) {
                $rentas->append($renta['nombre']);
            }
            return $rentas;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }

    public static function TextToId($text) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_renta FROM renta WHERE nombre=?");
            $stmt->bindParam(1, $text);
            $stmt->execute();

            $res = $stmt->fetchAll();

            foreach ($res as $nombre) {
                return $nombre['id_renta'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
        return 0;
    }

    public static function IdToText($id) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT nombre FROM renta WHERE id_renta=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $rs = $stmt->fetchAll();

            foreach ($rs as $edu) {
                return $edu['nombre'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
    }

}
