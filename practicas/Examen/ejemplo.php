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

      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      if ($result = $connection->query("select km from reparaciones where matricula='4455 ABC' order by km DESC limit 1;")) {

          printf("<p>The select query returned %d rows.</p>", $result->num_rows);

      ?>

          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>CodCliente</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>DNI</th>
              <th>Direccion</th>
              <th>Teléfono</th>
          </thead>

      <?php

          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
          while($obj = $result->fetch_object()) {
              //PRINTING EACH ROW
              $v1=$obj->km;
              echo "<tr>";
              echo "<td>".$obj->km."</td>";
              echo "<td>".$v1."</td>";
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

    ?>
  </body>
</html>
