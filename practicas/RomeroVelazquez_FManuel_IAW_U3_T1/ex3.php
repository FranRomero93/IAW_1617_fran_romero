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
        
        $mes=date("M"); //Creamos una variable donde guardaremos el mes actual.
        if ($mes=="Aug"){
            echo ("It's August, so it's really hot");
        } //Usamos el comando if para que, cuando se cumpla la condición (sea agosto), muestre el mensaje.
        else {
            echo ("Not August, so at least not in the peak of the heat");
        } //Cuando la condicion del if no se cumpla se mostrará este otro mensaje.
    
    ?>
</body>
</html>