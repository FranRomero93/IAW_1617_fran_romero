<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
      
    
      
      
    <?php
      //Realizamos la conexion con la base de datos
      $connection = new mysqli("localhost", "tf", "12345", "tf");
      //Si la conexión es fallida, mostramos el error
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      //Hacemos la consulta
      if ($result = $connection->query("SELECT * FROM REPARACIONES;")) {

          printf("Hay %d Reparaciones.</p>", $result->num_rows);

      ?>
          <!-- Realizamos la tabla en el html -->
          <table style="border:2px solid black">
          <thead>
            <tr>
              <th>IdReparacion</th>
              <th>Matricula</th>
              <th>Fecha Entrada</th>
              <th>KM</th>
              <th>Averia</th>
              <th>Asignar</th>
              <th>Empleados</th>
              <th>Piezas</th>
              <th>Borrar</th>
          </thead>

      <?php

          //Hacemos un fetch para mostrar en cada fila todos los datos
          
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->IdReparacion."</td>";
              echo "<td>".$obj->Matricula."</td>";
              echo "<td>".$obj->FechaEntrada."</td>";
              echo "<td>".$obj->Km."</td>";
              echo "<td>".$obj->Averia."</td>";
              //Añadimos una imagen que, al hacer click, nos enviará a asignar.php con la id de la reparación
              echo "<td><a href='asignar.php?Id=".$obj->IdReparacion."'><img src=asignar.png height='30pt' width='30pt'></a></td>";
              //Añadimos una imagen que, al hacer click, nos enviará a empleados.php con la id de la reparación
              echo "<td><a href='empleados.php?Id=".$obj->IdReparacion."'><img src=empleado.jpg height='30pt' width='30pt'></a></td>";
              //Añadimos una imagen que, al hacer click, nos enviará a piezas.php con la id de la reparación
              echo "<td><a href='piezas.php?Id=".$obj->IdReparacion."'><img src=piezas.png height='30pt' width='30pt'></a></td>";
              //Añadimos una imagen que, al hacer click, nos enviará a borrar.php con la id de la reparación
              echo "<td><a href='borrar.php?Id=".$obj->IdReparacion."'><img src=borrar.jpg height='30pt' width='30pt'></a></td>";
              echo "</tr>";
          }

          //Cerramos la variable $result y vaciamos las variables $obj y $connection
          $result->close();
          unset($obj);
          unset($connection);

      }

    ?>
  </body>
</html>
