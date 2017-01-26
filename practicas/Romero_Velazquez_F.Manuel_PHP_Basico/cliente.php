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
      $c=$_GET['id'];
      
      if ($result = $connection->query("SELECT *
                  FROM clientes c JOIN vehiculos v on c.codcliente=v.codcliente
                  WHERE c.codcliente='$c'
                  group by c.nombre,c.apellidos,c.dni")) {
          $obj = $result->fetch_object();
          echo "$obj->Nombre $obj->Apellidos";
          echo "<br>";
                  
          printf("<p>Numero de vehiculos: %d.</p>", $result->num_rows);
    
        echo "<br><a href='vehiculos.php'>Volver</a>";
          
          unset($connection);

      } 

    ?>
  </body>
</html>