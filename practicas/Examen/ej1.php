<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    <?php

      $v1;
      $cadena;
      $vuelta=[];
      $vector=array("HOLA","ADIOS","HASTA LUEGO");
      for ($i = 0; $i < sizeof($vector); $i++) {
        $v1=$vector[$i];
        echo "<p>".strlen($v1).'-> "';
        for ($a=strlen($v1)-1; $a>=0; $a--){
            $vuelta[]="$v1[$a]";
            echo $v1[$a];
        }
        
        echo '"<br></p>';
      }
      
      
    ?>
  </body>
</html>
