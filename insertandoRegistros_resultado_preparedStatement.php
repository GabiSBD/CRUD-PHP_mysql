<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado</title>
        <link rel="stylesheet" href="css/estilo_insertandoRegistros.css" type="text/css">
    </head>
    <body>
        <?php

            require("datos_conexion.php");

            
            $connect = new mysqli($db_host, $db_user, $db_password);
            if($connect -> connect_errno){
                echo " Error al conectar con la BBDD";
                exit();
            }

            $connect -> set_charset("utf8");

            $connect -> select_db($db_nombre) or die ("no se encuentra la BBDD");

            $codigo=$_GET["codigo"];
            $nombre=$_GET["nombre"];
            $direccion=$_GET["direccion"];
            $ciudad=$_GET["ciudad"];
            $telf=$_GET["telf"];
            $responsable=$_GET["responsable"];
            $historial=$_GET["historial"];

            $verificacion = $connect -> query("Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");

            if($verificacion -> fetch_row()){
            echo "<h1>El registro insertado es erroneo o ya existe en la base de datos, revise su codigoCliente</h1>";

            } else {
            if ($historial == "" || $historial == " ") {

                $insert = "INSERT INTO CLIENTES (CÓDIGOCLIENTE, EMPRESA ,DIRECCIÓN, POBLACIÓN, TELÉFONO, RESPONSABLE) VALUES (?, ?, ?, ?, ?, ?);";
            
                $query = $connect -> prepare($insert);
                $ok = $query -> bind_param("ssssis",$codigo, $nombre, $direccion, $ciudad, $telf, $responsable);
                
                if(!$ok ){echo "error bind_param";}
                
                $ok = $query -> execute();
                if(!$ok){
                    echo "<h3>Error en execute</h3>"; 
                    exit();
                }
                

            } else {

                $insert = "INSERT INTO CLIENTES VALUES (?, ?, ?, ?, ?, ?, ?);";
            
                $query = $connect -> prepare($insert);

                $ok = $query -> bind_param("ssssiss",$codigo, $nombre, $direccion, $ciudad, $telf, $responsable, $historial);
                

                if(!$ok ){echo "error en bind_param";}
                $ok = $query -> execute();
                if(!$ok){
                    echo "<h3>Error en mysqli_execute</h3>";
                    exit();
                }
                
            }

            $comprobacion = $connect -> query("Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");

            if ($comprobacion) {
                echo "<h1>El registro $codigo ha sido correctamente insertado</h1>";

                while ( $row= $comprobacion -> fetch_assoc()) {
                    echo "Resgitro insertado: " . $row["CÓDIGOCLIENTE"] .", " 
                    . $row["EMPRESA"] . ", " . $row["DIRECCIÓN"] . ", " . $row["POBLACIÓN"] . ", " . $row["TELÉFONO"] . ", " . $row["RESPONSABLE"]
                    . ", HISTORIAL: " . $row["HISTORIAL"];
                    
                    
                }
            } else {
                echo "<h1>el registro no se pudo persistir en la BBDD, compruebe los datos, o contacte con servicio tecnico, Disculpe las molestias</h1>";
            }
            }

            $connect -> close();   
        ?>
    </body>
</html>