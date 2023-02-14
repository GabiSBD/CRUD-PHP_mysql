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
    
            
            $connect = new mysqli($db_host, $db_user, $db_password);
    
            if($connect -> connect_errno){
                echo " Error al conectar con la BBDD";
                exit();
            }
            
            $connect -> set_charset("utf8");
    
            $connect -> select_db($db_nombre) or die ("no se encuentra la BBDD");

            $codigo = $connect -> real_escape_string($codigo);
        
            $verificacion = $connect -> query("Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");
    
            if(!($verificacion -> fetch_row())){
            echo "<h1>El registro insertado es erroneo o ya existe en la base de datos, revise su codigoCliente</h1>";
                
            }else{
    
                    $delete = "DELETE FROM CLIENTES WHERE CÓDIGOCLIENTE = '$codigo';";
                    $query = $connect -> query($delete);
    
                
                $comprobacion = $connect -> query("Select * From clientes Where CÓDIGOCLIENTE = '$codigo';");
                
                if($comprobacion -> fetch_row()==null){
                    echo "<h1>El registro $codigo ha sido correctamente eliminado</h1>";  
                    
                } else {
                echo "<h1>el registro no se pudo borrar de la BBDD, compruebe los datos, o contacte con servicio tecnico, Disculpe las molestias</h1>";}
            }
    
           $connect -> close(); 
        ?>
    </body>
</html>