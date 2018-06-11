<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="s_RegistrarUsuario.php" method="POST">
            <table align="center" border="0">

                <tbody>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRut" value="" /></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombre" value="" /></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno</td>
                        <td><input type="text" name="txtPaterno" value="" /></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno</td>
                        <td><input type="text" name="txtMaterno" value="" /></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="txtContrasena" value="" /></td>
                    </tr>
                    <tr>
                        <td>Repetir Contraseña
                        <td><input type="password" name="txtConfirmarContrasena" value="" /></td>
                    </tr>
                </tbody>
            </table>
            <div align="center">
                <input type="submit" value="Registrar" name="btnRegistrar" />
            </div>
        </form>
    </body>
</html>
