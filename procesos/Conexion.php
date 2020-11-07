<?php


     $servidor="localhost";
     $usuario="root";
     $password="";
     $bd="ventas";

    $conexion=mysqli_connect($servidor, 
                            $usuario, 
                            $password, 
                            $bd);

    if($conexion){
        echo "Conectado";

    }else {
        echo "No conectado";
    }

?>
