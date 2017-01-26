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

      
      if ($result = $connection->query("SELECT * FROM RECAMBIOS JOIN INCLUYEN WHERE IdReparacion=".$_GET['Id']." ;")) {

          printf("Estos piezas se usaron en la reparación con Id=".$_GET['Id'].":</p>", $result->num_rows);

      ?>

          <table style="border:2px solid black">
          <thead>
            <tr>
              <th>IdRecambio</th>
              <th>Descripción</th>
              <th>UnidadBase</th>
              <th>Stock</th>
              <th>PrecioReferencia</th>
          </thead>

      <?php

          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->IdRecambio."</td>";
              echo "<td>".$obj->Descripcion."</td>";
              echo "<td>".$obj->UnidadBase."</td>";
              echo "<td>".$obj->Stock."</td>";
              echo "<td>".$obj->PrecioReferencia."</td>";
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