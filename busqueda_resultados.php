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

        $busqueda = $_POST["buscar"];

        require("datos_conexion.php");
        $connect = new mysqli($db_host, $db_user, $db_password);

        if($connect -> connect_errno){
            echo "Error al conectar con el servidor";
            exit();
        }

        $connect -> set_charset("utf8");
        $connect -> select_db($db_nombre) or die("no se encontro la BBDD");

        
        $busqueda = $connect -> real_escape_string($busqueda);

        if($busqueda=="*") $query = "SELECT * FROM clientes";

        else if($busqueda==""||$busqueda==" ") exit();

        else $query = "SELECT * FROM clientes WHERE empresa LIKE '%$busqueda%'";

       
       $resultSet = $connect ->query($query);


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
        while($row = $resultSet -> fetch_row()){
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