<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    
    <?php
      //CREATING THE CONNECTION
      $connection = new mysqli("localhost", "tf", "12345", "tf");
      
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
      $sql1="Select DNI, Nombre, Apellidos from clientes where direccion like '%".$ciu."'";
      
      $connection->query($sql1);
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      
      if (($result = $connection->query($sql1))&&($result->num_rows!=0)) {

          printf("<p>Hay %d clientes en $ciu.</p>", $result->num_rows);

      ?>

          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>DNI</th>
              <th>Nombre</th>
              <th>Apellidos</th>
          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              echo "<tr>";
              echo "<td>".$obj->CodCliente."</td>";
              echo "<td>".$obj->Nombre."</td>";
              echo "<td>".$obj->Apellidos."</td>";
              echo "<td>".$obj->DNI."</td>";
              echo "<td>".$obj->Direccion."</td>";
              echo "<td>".$obj->Telefono."</td>";
              echo "</tr>";
          }

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
      else {
          printf("<p>No hay clientes en $ciu.</p>");
      }
      
    ?>
  </body>
</html>

