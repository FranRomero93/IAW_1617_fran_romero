<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAW_U3_T3</title>
  </head>
  <body>
      
    
      
      
    <?php

      $connection = new mysqli("localhost", "tf", "12345", "tf");

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      
      if ($result = $connection->query("SELECT * FROM EMPLEADOS JOIN INTERVIENEN WHERE IdReparacion=".$_GET['Id']." ;")) {

          printf("Estos empleados trabajan en la reparación con Id=".$_GET['Id'].":</p>", $result->num_rows);

      ?>

          <table style="border:2px solid black">
          <thead>
            <tr>
              <th>CodEmpleado</th>
              <th>DNI</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Categoria</th>
          </thead>

      <?php

          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->CodEmpleado."</td>";
              echo "<td>".$obj->DNI."</td>";
              echo "<td>".$obj->Nombre."</td>";
              echo "<td>".$obj->Apellidos."</td>";
              echo "<td>".$obj->Direccion."</td>";
              echo "<td>".$obj->Telefono."</td>";
              echo "<td>".$obj->Categoria."</td>";
              echo "</tr>";
          }
          
          echo "</table>";
          echo "<br><button type='button'><a href='reparaciones.php'>Volver</a></button>";
          
          $result->close();
          unset($obj);
          unset($connection);

      }
      
    ?>
              
    
  </body>
</html>