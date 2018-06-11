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
                $comunas->append(utf8_encode($comuna['nombre']));
            }
            return $comunas;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }
    
        public static function TextToId($text){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_comuna FROM comuna WHERE nombre=?");
            $stmt->bindParam(1, $text);
            $stmt->execute();
            
            $res = $stmt->fetchAll();
            
            foreach ($res as $nombre) {
                return $nombre['id_comuna'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir ".  $ex->getMessage();
        }
        return 0;
    }
    
        public static function IdToText($id){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT nombre FROM comuna WHERE id_comuna=?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            
            $rs = $stmt->fetchAll();
            
            foreach ($rs as $edu) {
                return $edu['nombre'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir ".$ex->getMessage();
        }
    }

}
