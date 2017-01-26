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

        $variable=8; //Creamos una variable, al cual le asignaremos un entero (en este caso 8).
        echo "Value is now
        $variable.<br>"; //Para mostrar el valor el mensaje con la variable en pantalla utilizamos el comando echo.
    
        $variable=$variable+2; //Ahora cambiamos el valor de la variable por su valor mas 2.
        echo "Add 2. Value is now $variable.<br>";//Volvemos a mostrarlo en pantalla con el comando echo.
    
        $variable=$variable-4; //Cambiamos el valor de la variable por su mismo valor menos 4.
        echo "Subtract 4. Value is now $variable.<br>"; //Y lo mostramos con el comando echo.
        
        $variable=$variable*5; //Asignamos a la variable su mismo valor multiplicado por 5.
        echo "Multiply bye 5. Value is now $variable.<br>"; //Lo mostramos en pantalla.
    
        $variable=$variable/3; //Cambiamos el valor de la variable por su valor dividido por 3.
        echo "Divide by 3. Value is now $variable.<br>"; //Mostramos el mensaje con la variable.
    
        $variable++; //Incrementamos la variable en 1.
        echo "Increment value by one. Value is now $variable.<br>"; //Mostramos el mensaje en pantalla.
    
        $variable--; //Realizamos el decremento de la variable en 1.
        echo "Decrement value by one. Value is now $variable.<br>"; //Lo mostramos en pantalla.
        
    ?>
</body>
</html>
