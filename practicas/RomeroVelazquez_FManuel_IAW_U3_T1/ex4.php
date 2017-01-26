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
        
        $num=0; //Creamos una variable con valor 0 para usarla mas adelante.
        $num2=0; //Creamos otra variable con valor 0 para usarla mas adelante.
    
        $abc="abc"; //Creamos una variable con una cadena de caracteres
        while ($num!=9){
            echo ("$abc ");
            $num++;
        } //Usamos la funcion while para repetir en pantalla la cadena de caracteres hasta que se cumpla la condición e incrementamos el valor de $num en cada ciclo.
        echo ("<br><br>"); //Doble salto de línea.
        
        $xyz="xyz"; //Creamos una variable con una cadena de caracteres.
        do {
            echo ("$xyz ");
            $num2++;
        } while($num2!=9); //Usamos la función do-while para mostrar en pantalla la cadena de caracteres 9 veces, usando la variable $num2 en la condición e incrementando su valor en cada ciclo.
        echo ("<br><br>"); //Doble salto de línea.
    
        for ($i=1; $i<=9; $i++) {
            echo ("$i ");
        } //Con la función for mostramos el valor de i en pantalla.
        echo ("<br><br>"); //Doble salto de línea.
    
        for ($i=1, $A="A"; $i<=9; $i++, $A++) {
            echo ("$i. Item $A ");
            echo ("<br>");
        } //Usando la funcion for, creamos las variables $i y $A para mostrar en pantalla una lista numerada.
    
    ?>
</body>
</html>