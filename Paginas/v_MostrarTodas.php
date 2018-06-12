<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../Dto/PostulanteDto.php';
        include_once '../Dao/PostulanteDaoImp.php';
        include_once '../Dao/SolicitudDaoImp.php';
        $listaPostulantes = PostulanteDaoImp::listarTodos();
        ?>
        <table>
            <thead>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Acción</th>
        </thead>
        <tbody>

            <?php foreach ($listaPostulantes as $postulante) { ?>

                <tr>
                    <td> <?php echo $postulante->getRut(); ?> </td>
                    <td> <?php echo $postulante->getNombre() . " " . $postulante->getAp_paterno(); ?></td>
                    <?php $estado = SolicitudDaoImp::MostrarEstado($postulante->getRut()); ?>
                    <td> <?php $estado; ?> </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
