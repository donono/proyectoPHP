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
                $edu->append(utf8_encode($educacion['nombre']));
            }
            return $edu;
        } catch (Exception $ex) {
            echo "Error al listar comunas " . $ex->getMessage();
        }
    }
    
    public static function TextToId($text){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT id_educacion FROM educacion WHERE nombre=?");
            $stmt->bindParam(1, $text);
            $stmt->execute();
            
            $res = $stmt->fetchAll();
            
            foreach ($res as $nombre) {
                return $nombre['id_educacion'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir ".  $ex->getMessage();
        }
        return 0;
    }
    
    public static function IdToText($id){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT nombre FROM educacion WHERE id_educacion=?");
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
