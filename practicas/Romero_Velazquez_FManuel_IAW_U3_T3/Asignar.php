<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAW_U3_T3</title>
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
      if ($result = $connection->query("SELECT * FROM EMPLEADOS;")) {

          printf("Hay %d Empleados.</p>", $result->num_rows);

      ?>
          <!-- Realizamos la tabla en el html -->
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
              <th>Selección</th>
          </thead>

      <?php

          //Hacemos un fetch para mostrar en cada fila todos los datos
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->CodEmpleado."</td>";
              echo "<td>".$obj->DNI."</td>";
              echo "<td>".$obj->Nombre."</td>";
              echo "<td>".$obj->Apellidos."</td>";
              echo "<td>".$obj->Direccion."</td>";
              echo "<td>".$obj->Telefono."</td>";
              echo "<td>".$obj->Categoria."</td>";
              //Añadimos un checkbox para seleccionar
              echo "<td><input type='checkbox'></td>";
              echo "</tr>";
          }
          echo "</table>";
          //Añadimos un boton para enviar la selección
          echo "</table><br><input type='submit' name='Enviar' value='Asignar'/>
    </form>";
          //Añadimos un boton para volver a reparaciones.php
          echo "<br><button type='button'><a href='reparaciones.php'>Volver</a></button>";
          
          $result->close();
          unset($obj);
          unset($connection);

      }
      
    ?>
              
    
  </body>
</html>
