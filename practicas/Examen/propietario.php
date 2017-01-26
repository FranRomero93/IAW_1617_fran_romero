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
      
      if ($result = $connection->query("SELECT * FROM VEHICULOS JOIN CLIENTES where CodCliente=".$_GET['id'].";") {

          printf("<p>The select query returned %d rows.</p>", $result->num_rows);

          
      ?>

          <!-- PRINT THE TABLE AND THE HEADER -->
          <table style="border:1px solid black">
          <thead>
            <tr>
              <th>Matricula</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Color</th>
          </thead>

      <?php
          
          
          //FETCHING OBJECTS FROM THE RESULT SET
          //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
             while($obj = $result->fetch_object()) {
                    echo "<td><a href='propietario.php?id=".$obj->CodCliente."'>".$obj->Matricula."</a></td>";
                    echo "<td>".$obj->Marca."</td>";
                    echo "<td>".$obj->Modelo."</td>";
                    echo "<td>".$obj->Color."</td>";
                    echo "</tr>";
            } 
          

          //Free the result. Avoid High Memory Usages
          $result->close();
          unset($obj);
          unset($connection);

      } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

    ?>
      </table>
  </body>
</html>