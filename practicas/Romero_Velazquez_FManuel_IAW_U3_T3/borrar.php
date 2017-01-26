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

      if ($result = $connection->query("SELECT * FROM REPARACIONES WEHRE IdReparacion=".$_GET['Id']." ;")) {
          
        if ($result = $connection->query("DELETE FROM FACTURAS JOIN REPARACIONES WEHRE IdReparacion=".$_GET['Id']." ;")){
            
            printf("Ha sido eliminada la reparación con Id=".$_GET['Id'].":</p>");
        
        }
            
      }else {printf("No existe la reparación con Id=".$_GET['Id'].":</p>");}
    
      echo "<br><button type='button'><a href='reparaciones.php'>Volver</a></button>";
      ?>              
    
  </body>
</html>