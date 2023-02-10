<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buscador</title>
    <link rel="stylesheet" type="text/css" href="css\cssEmpresarial.css">

</head>
<body>
    <?php

        $busqueda = $_GET["buscar"];

        require("datos_conexion.php");
        $connect = mysqli_connect($db_host, $db_user, $db_password);

        if(mysqli_connect_errno()){
            echo "Eroor al conectar con el servidor";
            exit();
        }

        mysqli_set_charset($connect, "utf8");
        mysqli_select_db($connect, $db_nombre) or die("no se encontro la BBDD");

        $busqueda = mysqli_real_escape_string($connect, $busqueda);

        $query = "SELECT * FROM clientes WHERE empresa LIKE '%$busqueda%'";

        $resultSet = mysqli_query($connect, $query);

        echo "<table> 
                    <tr>
                        <th>CÓDIGOCLIENTE</th>
                        <th>EMPRESA</th>
                        <th>DIRECCIÓN</th>
                        <th>POBLACIÓN</th>
                        <th>TELÉFONO</th>
                        <th>RESPONSABLE</th>
                        <th>HISTORIAL</th>
                    </tr>";
        while($row = mysqli_fetch_row($resultSet)){
            echo "<tr>";
            foreach($row as $data){
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($connect);



    ?>
</body>
</html>