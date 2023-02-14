<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resolucion de Actualizacion</title>
    <link rel="stylesheet" href="css/cssEmpresarial.css" type="text/css">
</head>
<body>
    <?php
        $codigo=$_GET["codigo"];
        $nombre=$_GET["empresa"];
        $direccion=$_GET["direccion"];
        $ciudad=$_GET["POBLACIÓN"];
        $telf=$_GET["TELÉFONO"];
        $responsable=$_GET["RESPONSABLE"];
        $historial=$_GET["HISTORIAL"];

        require("datos_conexion.php");

        $connect = new mysqli($db_host, $db_user, $db_password);
        
        if($connect -> connect_errno){
            echo " Error al conectar con la BBDD";
            exit();
        }

        $codigo= $connect -> real_escape_string($codigo);
        $nombre= $connect ->real_escape_string($nombre);
        $direccion= $connect -> real_escape_string($direccion);
        $ciudad= $connect -> real_escape_string($ciudad);
        $telf= $connect -> real_escape_string($telf);
        $responsable= $connect -> real_escape_string($responsable);
        $historial= $connect -> real_escape_string($historial);

        $connect ->set_charset("utf8");
        $connect -> select_db($db_nombre) or die("<h3>no se encuentra la BBDD referenciada</h3>");

    $query = $connect -> query( "UPDATE CLIENTES SET 
                                    EMPRESA='$nombre',
                                    DIRECCIÓN='$direccion',
                                    POBLACIÓN='$ciudad',
                                    TELÉFONO='$telf',
                                    RESPONSABLE='$responsable',
                                    HISTORIAL='$historial'
                                WHERE CÓDIGOCLIENTE='$codigo';");
        if(!$query){
        echo "<h3>UPPS! Error al actualizar el registro</h3>";
    } else {
        echo "<h3>Registro actualizado correctamente</h3";
    }
    $connect -> close();
    
    ?>
</body>
</html>