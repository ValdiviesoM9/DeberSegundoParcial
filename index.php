<?php

$conex = mysqli_connect("127.0.0.1","root","admin123","deb1");

if(!$conex){
    echo"Error: no se pudo conectar a Mysql".PHP_EOL;
    echo "error de depuración: " . mysqli_connect_errno() .PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() .PHP_EOL;
    exit;
}
         echo "conexion exitosa";

  if(isset($_POST["nombre"])){
    $stmt = $conex->prepare("INSERT INTO goleadores (nombre, fecha_nacimiento, goles) VALUES (?, ?, ?)");
    $stmt -> bind_param('sss',$nombre, $fechaNacimiento, $goles);
    $nombre = $_POST("nombre");
    $fecha_nacimiento=$_POST("fechaNacimiento");
    $goles = $_POST("goles");
    $stm->execute();
    $stmt->close();
  }
  
  echo "conexion exitosa";
?>
<!DOCTYPE php>
<html>
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="Deerhost Template">
            <meta name="keywords" content="Deerhost, unica, creative, html">
            <meta name="viewport" content="width=device-width, initial-scale=0.9">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>DEERHOST | Template</title>
            <link rel="stylesheet" href="./css/style.css" type="text/css">
        </head>
    <body class="bg-gradient-primary">

            <?php
            
        
            ?>
             <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
                <a href="#" class="btn btn-danger btn-primary">
                <i class="fas fa-trash"></i>Eliminar
                </a>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <td>ID</td>
                        <td>NOMBRE APELLIDO</td>
                        <td>FECHA DE NACIMIENTO</td>
                        <td># GOLES</td>
                        </tr>
                    </thead>
                     <tbody>
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
                    </tbody>
                    </table>
                </div>
            </div>
     </div>
     <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6"></div>
        <div class="p-5">
          <div class="text-center" class="form-control form-control-user">
            <h1 class="h4 text-gray-900 mb-4">Copa Libertadores de América</h1>
          </div>
          <form  name = "forma" class="user" method = "post" action="index.php">
            <p>Nombre:<input type ="text" name="nombre"></p>
            <p>Fecha Nacimieno:<input type ="date" name="fechaNacimiento"></p>
            <p>Goles:<input type ="number" name="goles"></p>
            <p><input type="submit" value = "Agregar"></p>
              
           
          </form>
          

        </div>
      </div>

    </div>




  </div>

</div>
</div>


     
    </body>

</html>