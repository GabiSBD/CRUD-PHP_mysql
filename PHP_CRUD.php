<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clase 43 insertando registros</title>
        <link rel="stylesheet" href="css/estilo_insertandoRegistros.css" type="text/css">
    </head>
    <body>
        <form action="busqueda_resultados.php" method="post">
            <fieldset>
                <legend><h3>Buscador clientes BBDD </h3></legend>
                <label>Buscar empresa: <input type="text" name="buscar"></label>
                <input type="submit" name="query" value="iniciar">
            </fieldset>
        </form>
        
        <form action="insertandoRegistros_resultado_preparedStatement.php" method="post">
            <fieldset>
                <legend><h3>Formulario de registro de clientes</h3></legend>
                <table>
                    <tr>
                        <td><label>Código:</label></td> 
                        <td><label for= "codigo"><input type="text" name="codigo" id="codigo"></label></td>
                    </tr>
                    <tr>
                        <td><label>Nombre: </label></td>
                        <td><label for= "nombre"><input type="text" name="nombre" id="nombre"></label></td>
                    </tr>
                    <tr>
                        <td><label>Dirección: </label></td> 
                        <td><label for= "direccion"><input type="text" name="direccion" id="direccion"></label></td>
                    </tr>
                    <tr>
                        <td><label>Ciudad: </label></td> 
                        <td><label for= "ciudad"><input type="text" name="ciudad" id="ciudad"></label></td>
                    </tr>
                    <tr>
                        <td><label>Telefono: </label></td> 
                        <td><label for= "telf"><input type="text" name="telf" id="telf"></label></td>
                    </tr>
                    <tr>
                        <td><label>Responsable: </label></td> 
                        <td><label for= "responsable"><input type="text" name="responsable" id="responsable"></label></td>
                    </tr>
                    <tr>
                        <td><label>Historial: </label></td> 
                        <td><label for= "historial"><input type="text" name="historial" id="historial"></label></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="registrar" value="registrar"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <form action="eliminandoRegistros_resultado.php" method="post">
            <fieldset>
                <legend><h3>Formulario de eliminacion  de clientes</h3></legend>
                <table>
                    <tr>
                        <td><label>Código:</label></td> 
                        <td><label for= "codigo"><input type="text" name="codigo" id="codigo"></label></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="eliminar" name="eliminar"></td>
                    </tr>
                </table>
            </fieldset>
        </form> 
        <form action="interfaz_actualiza.php" method= "post">
            <fieldset>
                <legend><h3>Formulario de actualizacion de Clientes</h3></legend>
                <table>
                    <tr>
                        <td><label>Código:</label></td> 
                        <td><label for= "codigo"><input type="text" name="codigo" id="codigo"></label></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="actualizar" name="actualizar"></td>
                    </tr>
                </table>
            </fieldset>
        </form>   
        
    </body>
</html>
