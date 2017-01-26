<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css" href=" ">
</head>

<body>
    <?php

        include_once("funciones.php");
    
        $str1 = 'Ya llega la navidad';        
        $str2 = 'Ya llega la naVidad';     
    
        $numero= primero_diferente($str1,$str2);
    
        echo "La primera posición diferente es la:".$numero." '".$str1[$numero]."'"." - "."'".$str2[$numero]."'";
        
    
    ?>
</body>
</html>
