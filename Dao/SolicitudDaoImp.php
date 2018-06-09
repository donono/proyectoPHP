<?php

include_once '../Dto/SolicitudDto.php';
include_once '../Sql/ClasePdo.php';

class SolicitudDaoImp {

    function AgregarSolicitud($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO solicitud (rut, estado) VALUES (?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $estado);

            $rut = $dto->getRut();
            $estado = $dto->getEstado();

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            echo "No se pudo agregar. Stacktrace: " . $ex->getMessage();
        }
        return false;
    }
    
    function MostrarPorRut($rut){
        $listaSolicitud = new ArrayObject();
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT estado FROM solicitud WHERE rut = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();
            
            $rs = $stmt->fetchAll();
            
            foreach ($rs as $sol) {
                $dto = new SolicitudDto();
                $dto->setEstado($sol['estado']);
                $listaSolicitud->append($dto);
            }
            return $listaSolicitud;
            
        } catch (Exception $ex) {

        }
    }

}
