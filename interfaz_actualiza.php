<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza Registro</title>
    <link rel="stylesheet" href="css/estilo_insertandoRegistros.css" type="text/css">
</head>
<body>
    <?php
        $codigo = $_GET["codigo"];

        require("datos_conexion.php");

        $connect = mysqli_connect($db_host, $db_user, $db_password);
        
        if(mysqli_connect_errno()){
            echo " Error al conectar con la BBDD";
            exit();
        }
        $codigo = mysqli_real_escape_string($connect, $codigo);

        mysqli_set_charset($connect, "utf8");
        mysqli_select_db($connect, $db_nombre) or die("<h3>no se encuentra la BBDD referenciada</h3>");

        $resultSet = mysqli_query($connect, "SELECT * FROM CLIENTES WHERE CÓDIGOCLIENTE = '$codigo';");

        while($row=mysqli_fetch_array($resultSet)){
            echo "<form action='resultado_actualiza.php' method='get'>
                    <input type='text' name='codigo' value='" . $row["CÓDIGOCLIENTE"] . "' readonly><br>
                    <input type='text' name='empresa' value='" . $row["EMPRESA"] . "'><br>
                    <input type='text' name='direccion' value='" .$row["DIRECCIÓN"]. "'><br>
                    <input type='text' name='POBLACIÓN' value='" .$row["POBLACIÓN"]. "'><br>
                    <input type='text' name='TELÉFONO' value='" .$row["TELÉFONO"]. "'><br>
                    <input type='text' name='RESPONSABLE' value='" .$row["RESPONSABLE"]. "'><br>
                    <input type='text' name='HISTORIAL' value='" .$row["HISTORIAL"]. "'><br>
                    <input type='submit' name='actualiza' value='actualizar'>
                </form>";

        }

    
    ?>
</body>
</html>