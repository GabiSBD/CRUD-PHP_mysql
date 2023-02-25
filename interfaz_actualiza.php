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
        $codigo = $_POST["codigo"];

        require("datos_conexion.php");

        $connect = new mysqli($db_host, $db_user, $db_password);
        
        if($connect -> connect_errno){
            echo " Error al conectar con la BBDD";
            exit();
        }
        $codigo = $connect -> real_escape_string($codigo);

        $connect -> set_charset("utf8");
        $connect -> select_db($db_nombre) or die("<h3>no se encuentra la BBDD referenciada</h3>");

        $resultSet = $connect -> query("SELECT * FROM CLIENTES WHERE CÓDIGOCLIENTE = '$codigo';");

        while($row = $resultSet -> fetch_assoc()){
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

        $connect -> close();
    
    ?>
</body>
</html>