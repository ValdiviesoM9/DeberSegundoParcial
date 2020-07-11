<!DOCTYPE php>
<html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>

            <?php
            
            $conex = mysqli_connect("127.0.0.1","root","admin123","deb1");

            if(!$conex){
                echo"Error: no se pudo conectar a Mysql".PHP_EOL;
                echo "error de depuración: " . mysqli_connect_errno() .PHP_EOL;
                echo "error de depuración: " . mysqli_connect_error() .PHP_EOL;
                exit;
            }
                     "Exito: se realizó una conexión apropiada a MySQL". PHP_EOL;
           
        
            ?>


            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>NOMBRE APELLIDO</td>
                    <td>FECHA DE NACIMIENTO</td>
                    <td># GOLES</td>
                </tr>

                <?php
                    $result= $conex->query("select * from goleadores ");

                    if($result->num_rows>0){
                        while($row =$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row["cod_goleador"]; ?></td>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["fecha_nacimiento"]; ?></td>
                    <td><?php echo $row["goles"]; ?></td>
                </tr>
                        <?php }
                    } else { ?>
                    <tr>
                    <td colspan="4"> No hay datos</td>
                    </tr>
                    <?php } ?>

            </table>

        </body>

</html>