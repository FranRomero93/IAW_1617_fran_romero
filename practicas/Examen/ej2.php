<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GETTING DATA FROM A MYSQL DATABASE</title>
  </head>
  <body>
    <?php
      
      $cadena1="Hola alumno, ¿cómo estás?";
      $caracter=",";
      
      //include_once("library.php");
      
       //echo dividir($cadena1, $caracter);
      
    $resultado=0;
    $v1=0;
    $parte1=[];
    $parte2;
    for ($i=0; $i<strlen($cadena1); $i++){
        if($cadena1[$i]!=$caracter && $v1=0):
            $parte1[]=$cadena1[$i];
        elseif ($cadena1[$i]==$caracter && $v1=1):
            $parte2[]=$cadena1[$i];
        elseif ($cadena1[$i]==$caracter && $v1=0):
            $v1=1;
            echo "$cadena1[$i]";
        endif;
    }
    
    echo "parte1".$parte1;
    echo "parte2".$parte2;
    echo $resultado;
      
    ?>
  </body>
</html>
