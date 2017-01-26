<!--
    Author: Juan Diego Pérez @pekechis
    E-mail: contact@jdperez.es
    Description: GETTING DATA FROM A MYSQL DATABASE
    Date: November 2015
    Reference: http://php.net/manual/mysqlinfo.api.choosing.php
               http://php.net/manual/book.mysqli.php
<th>CodCliente</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>DNI</th>
              <th>Direccion</th>
              <th>Teléfono</th>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    <?php if (!isset($_POST["cod"])) : ?>
      <form method="post">
        <fieldset>
          <legend>Insert Client</legend>
          <span>CodCliente:</span><input type="text" name="cod" required><br>
          <span>Nombre:</span><input type="text" name="name" required><br>
          <span>Apellidos:</span><input type="text" name="lastname" required><br>
          <span>DNI:</span><input type="int" name="dni" required><br>
          <span>Dirección:</span><input type="text" name="dir" required><br>
          <span>Telefono:</span><input type="text" name="tel" required><br>
          <p><input type="submit" value="Send"></p>
        </fieldset>
      </form>
    <?php else: ?>
    <?php
      
      $cod=$_POST["cod"];
      $name=$_POST["name"];
      $lastname=$_POST["lastname"];
      $dni=$_POST["dni"];
      $dir=$_POST["dir"];
      $tel=$_POST["tel"];
      
      //CREATING THE CONNECTION
      $connection = new mysqli("localhost", "tf", "12345", "tf");
      
      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      $connection->query("INSERT INTO clientes (CodCliente,Nombre,Apellidos,DNI,Direccion,telefono)
VALUES ('$cod','$name','$lastname','$dni','$dir','$tel')");
      //MAKING A SELECT QUERY
      /* Consultas de selección que devuelven un conjunto de resultados */
      
      if ($result = $connection->query("SELECT * FROM CLIENTES;")) {

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

    ?>
      
    <?php endif ?>
  </body>
</html>

