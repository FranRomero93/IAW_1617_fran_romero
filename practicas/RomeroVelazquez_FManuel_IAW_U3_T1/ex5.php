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

        echo"<table >"; //Abrimos una tabla donde iran las celdas de colores.
            //Usamos la funcion para crear las celdas de las filas de la tabla.
            for($i=0;$i<=9;$i++){ 
               echo"<tr>"; //Abrimos la fila.
                //Usando la función if, asignamos el estilo de las celdas impares.
                if($i%2 == 1){  
                    for($a=0;$a<=9;$a++){
                    echo"<td style='background-color:gray;height:50px; width:50px;' border='1'></td>"; //Estilo de las celdas impares.
                    }    
                }
                //Si no se cumple la anterior condición, asignamos el estilo de las celdas pares.
                else{
                 for($a=0;$a<=9;$a++){
                    echo"<td style='background-color:red;height:50px; width:50px;' border='1'></td>"; //Estilo de las celdas pares.
                    }
                }
                echo"</tr>"; //Cerramos el codigo de la fila
          }
       echo "</table>"; //Terminamos el codigo de la tabla:
        
    ?>
</body>
</html>
