<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resolución</title>
        <link rel="stylesheet" href="css/estilo_insertandoRegistros.css" type="text/css">
    </head>
    <body>
        <?php
            $codigo=$_GET["codigo"];
            
    
            require("datos_conexion.php");
    
            //conexion BBDD por procedimientos
            $connect = mysqli_connect($db_host, $db_user, $db_password/*, $db_nombre*/);
    
            if(mysqli_connect_errno()){
                echo " Error al conectar con la BBDD";
                exit();
            }
            
            mysqli_set_charset($connect, "utf8");
    
            mysqli_select_db($connect, $db_nombre) or die ("no se encuentra la BBDD");

            $codigo = mysqli_real_escape_string($connect, $codigo);
        
            $verificacion = mysqli_query($connect, "Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");
    
            if(!mysqli_fetch_row($verificacion)){
            echo "<h1>El registro insertado es erroneo o ya existe en la base de datos, revise su codigoCliente</h1>";
                
            }else{
    
                    $delete = "DELETE FROM CLIENTES WHERE CÓDIGOCLIENTE = '$codigo';";
                    $query = mysqli_query($connect, $delete);
    
                
                $comprobacion = mysqli_query($connect, "Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");
                
                if(mysqli_fetch_row($comprobacion)==null){
                    echo "<h1>El registro $codigo ha sido correctamente eliminado</h1>";  
                    
                } else {
                echo "<h1>el registro no se pudo borrar de la BBDD, compruebe los datos, o contacte con servicio tecnico, Disculpe las molestias</h1>";}
            }
    
            mysqli_close($connect); 
        ?>
    </body>
</html>