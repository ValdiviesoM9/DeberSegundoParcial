<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>

            <?php

            $conex = mysqli_connect("127.0.0.1"."root","admin123","deb1");

            if(!$conex){
                echo"Error: no se pudo conectar a Mysql".PHP_EOL;
                echo "error de depuración: " . mysqli_connect_errno() .PHP_EOL;
                echo "error de depuración: " . mysqli_connect_errno() .PHP_EOL;
                exit;
            }
            echo "Exito: se realizó una conexión apropiada a MySQL". PHP_EOL;
            mysqli_close($conex);

            ?>
        </body>


</html>