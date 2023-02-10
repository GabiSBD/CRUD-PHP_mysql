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

        $connect = mysqli_connect($db_host, $db_user, $db_password);
        
        if(mysqli_connect_errno()){
            echo " Error al conectar con la BBDD";
            exit();
        }

        $codigo= mysqli_real_escape_string($connect, $codigo);
        $nombre=mysqli_real_escape_string($connect, $nombre);
        $direccion=mysqli_real_escape_string($connect, $direccion);
        $ciudad=mysqli_real_escape_string($connect, $ciudad);
        $telf=mysqli_real_escape_string($connect, $telf);
        $responsable=mysqli_real_escape_string($connect, $responsable);
        $historial=mysqli_real_escape_string($connect, $historial);

        mysqli_set_charset($connect, "utf8");
        mysqli_select_db($connect, $db_nombre) or die("<h3>no se encuentra la BBDD referenciada</h3>");

    $query = mysqli_query($connect, "UPDATE CLIENTES SET 
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
    
    ?>
</body>
</html>