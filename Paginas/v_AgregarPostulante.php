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
        <form action="s_AgregarPostulante.php" method="POST">
            <div>
                <table align="center" border="0">
                    <tbody>
                        <tr>
                            <td>Rut</td>
                            <td><input type="text" name="txtRut" value="" /></td>
                            <td>Telefono</td>
                            <td><input type="text" name="txtTelefono" value="" /></td>
                        </tr>

                        <tr>
                            <td>Nombre</td>
                            <td><input type="text" name="txtNombre" value="" /></td>
                            <td>Email</td>
                            <td><input type="text" name="txtEmail" value="" /></td>
                        </tr>

                        <tr>
                            <td>Apellido Paterno</td>
                            <td><input type="text" name="txtPaterno" value="" /></td>
                            <td>Dirección</td>
                            <td><input type="text" name="txtDireccion" value="" /></td>
                        </tr>

                        <tr>
                            <td>Apellido Materno</td>
                            <td><input type="text" name="txtMaterno" value="" /></td>
                            <td>Comuna</td>
                            <td><select name="dropComuna">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/ComunaDaoImp.php';
                                    $opcion = ComunaDaoImp::ListarTodas();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Fecha Nacimiento</td>
                            <td><input type="date" name="dateNacimiento" value="" /></td>
                            <td>Educación</td>
                            <td><select name="dropEducacion">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EducacionDaoImp.php';
                                    $opcion = EducacionDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Sexo</td>
                            <td>M<input type="radio" name="radioSexo" value="" /> F<input type="radio" name="radioSexo" value="" /></td>
                            <td>Renta</td>
                            <td><select name="dropRenta">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/RentaDaoImp.php';
                                    $opcion = RentaDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Estado Civil</td>
                            <td><select name="dropEstadoCivil">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EstadoCivilDaoImp.php';
                                    $opcion = EstadoCivilDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                            <td>Sueldo Líquido</td>
                            <td><input type="text" name="txtSueldoLiquido" value="" /></td>
                        </tr>

                        <tr>
                            <td>Hijos</td>
                            <td><input type="checkbox" name="checkHijos" value="ON" /> Cantidad <input type="text" name="txtHijos" value="" style="width: 30px" /></td>
                            <td>Padece Enfermedades Crónicas</td>
                            <td><input type="checkbox" name="checkEnfermedad" value="OFF" /></td>
                        </tr>
                    </tbody>
                </table>

                <div align="center">
                    <input type="submit" value="Postular" name="btnPostular" />
                </div>
            </div>
        </form>
    </body>
</html>
