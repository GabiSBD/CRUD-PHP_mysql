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

        //conexion BBDD por procedimientos
        $connect = mysqli_connect($db_host, $db_user, $db_password/*, $db_nombre*/);

        if(mysqli_connect_errno()){
            echo " Error al conectar con la BBDD";
            exit();
        }
        
        mysqli_set_charset($connect, "utf8");

        mysqli_select_db($connect, $db_nombre) or die ("no se encuentra la BBDD");

        $codigo=$_GET["codigo"];
        $nombre=$_GET["nombre"];
        $direccion=$_GET["direccion"];
        $ciudad=$_GET["ciudad"];
        $telf=$_GET["telf"];
        $responsable=$_GET["responsable"];
        $historial=$_GET["historial"];
    
        $verificacion = mysqli_query($connect, "Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");

        if(mysqli_fetch_row($verificacion)){
        echo "<h1>El registro insertado es erroneo o ya existe en la base de datos, revise su codigoCliente</h1>";

    } else {
        if ($historial == "" || $historial == " ") {

            $insert = "INSERT INTO CLIENTES (CÓDIGOCLIENTE, EMPRESA ,DIRECCIÓN, POBLACIÓN, TELÉFONO, RESPONSABLE) VALUES (?, ?, ?, ?, ?, ?);";
            $query = mysqli_prepare($connect, $insert);
            $ok = mysqli_stmt_bind_param($query,"ssssis",$codigo, $nombre, $direccion, $ciudad, $telf, $responsable);
            
            if(!$ok ){echo "error en msqli_stmt_bind_param";}
            
            $ok = mysqli_stmt_execute($query);
            if(!$ok){
                echo "<h3>Error en mysqli_execute</h3>"; 
                exit();
            }
            

        } else {

            $insert = "INSERT INTO CLIENTES VALUES (?, ?, ?, ?, ?, ?, ?);";
            $query = mysqli_prepare($connect, $insert);

            $ok = mysqli_stmt_bind_param($query,"ssssiss",$codigo, $nombre, $direccion, $ciudad, $telf, $responsable, $historial);
            

            if(!$ok ){echo "error en mysqli_stmt_bind_param";}
            $ok = mysqli_stmt_execute($query);
            if(!$ok){
                echo "<h3>Error en mysqli_execute</h3>";
                exit();
            }
            
        }

        $comprobacion = mysqli_query($connect, "Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");

        if ($comprobacion) {
            echo "<h1>El registro $codigo ha sido correctamente insertado</h1>";

            while ( $row= mysqli_fetch_row($comprobacion)) {
                echo "Resgitro insertado: ";
                foreach($row as $data){echo "$data,";}
                
            }
        } else {
            echo "<h1>el registro no se pudo persistir en la BBDD, compruebe los datos, o contacte con servicio tecnico, Disculpe las molestias</h1>";
        }
    }

        mysqli_close($connect);    
    ?>
</body>
</html>