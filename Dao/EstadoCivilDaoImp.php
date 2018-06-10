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
    
        public static function TextToId($text){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_estado FROM estado_civil WHERE nombre=?");
            $stmt->bindParam(1, $text);
            $stmt->execute();
            
            $res = $stmt->fetchAll();
            
            foreach ($res as $nombre) {
                return $nombre['id_estado'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir ".  $ex->getMessage();
        }
        return 0;
    }
    
        public static function IdToText($id){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT nombre FROM estado_civil WHERE id_estado=?");
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
