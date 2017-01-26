<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    <?php

      
      $connection = new mysqli("localhost", "tf", "12345", "tf");

      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      $m=$_GET['marca'];
      
      $consulta= "SELECT * FROM VEHICULOS where marca='$m'";
      
      if ($result = $connection->query("$consulta")) {
          printf("Vehiculos atendidos: %d ", $result->num_rows);

      }
        echo "<br><a href='vehiculos.php'>Volver</a>";
          
          unset($connection);
 

    ?>
  </body>
</html>