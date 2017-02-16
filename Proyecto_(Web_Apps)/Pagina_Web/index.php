<?php
      session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biblioteca Virtual</title>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <link rel="stylesheet" href="css/styles-index.css?asdas"> 
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>
</head>
<body>

<?php

      //CREATING THE CONNECTION
      $connection = new mysqli("localhost", "user", "2asirtriana", "biblioteca");

      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

    ?>

<div class="container">
    <div class="cabecera">
        <div class="ini-ses">
            <?php
                if (!isset($_SESSION["user"])){
                    echo "<p class='sesion'><a href='inicio_sesion.php'>Iniciar Sesión</a></p>";
                } else {
                    $user=$_SESSION["user"];
                    echo "<p class='sesion'>Hola, $user ! | <a href='library.php'>Cerrar Sesion</a></p>";
                }
            ?>
        </div>
        <div class="titulo">
            <h1>Biblioteca Virtual</h1>
        </div>
    </div>
    
    <div class="navegacion">
        <div class="novedades"><p>Novedades</p></div>
        <div class="categorias"><p>Categorias</p></div>
        <div class="autores"><p>Autores</p></div>
        <div class="contacto"><p>Contacto</p></div>
    </div>
    
    <div class="contenido">
        <div class="lista-nov">
            <div class="novedad1">
                <img src="img/imagen.jpg">
                <p>En esta trepidante y adictiva novela, una exagente que huye de la organización en la que trabajaba deberá aceptar un último caso para limpiar su nombre y salvar su vida.
    Antes trabajaba para el gobierno de Estados Unidos, aunque casi nadie lo sabía. Como experta en su campo, era uno de los secretos más oscuros de una agencia tan clandestina que ni siquiera tiene nombre. Hasta que la consideraron un lastre y fueron a por ella sin avisar.</p>
            </div>

            <div class="novedad2">
                <img src="img/imagen.jpg">
                <p>En esta trepidante y adictiva novela, una exagente que huye de la organización en la que trabajaba deberá aceptar un último caso para limpiar su nombre y salvar su vida.
    Antes trabajaba para el gobierno de Estados Unidos, aunque casi nadie lo sabía. Como experta en su campo, era uno de los secretos más oscuros de una agencia tan clandestina que ni siquiera tiene nombre. Hasta que la consideraron un lastre y fueron a por ella sin avisar.</p>
            </div>

            <div class="novedad3">
                <img src="img/imagen.jpg">
                <p>En esta trepidante y adictiva novela, una exagente que huye de la organización en la que trabajaba deberá aceptar un último caso para limpiar su nombre y salvar su vida.
    Antes trabajaba para el gobierno de Estados Unidos, aunque casi nadie lo sabía. Como experta en su campo, era uno de los secretos más oscuros de una agencia tan clandestina que ni siquiera tiene nombre. Hasta que la consideraron un lastre y fueron a por ella sin avisar.</p>
            </div>

            <div class="novedad4">
                <img src="img/imagen.jpg">
                <p><br/>En esta trepidante y adictiva novela, una exagente que huye de la organización en la que trabajaba deberá aceptar un último caso para limpiar su nombre y salvar su vida.
    Antes trabajaba para el gobi4rno de Estados Unidos, aunque casi nadie lo sabía. Como experta en su campo, era uno de los secretos más oscuros de una agencia tan clandestina que ni siquiera tiene nombre. Hasta que la consideraron un lastre y fueron a por ella sin avisar.</p>
            </div>
        </div>
        
    </div>
</div>
<php>
session_destroy();</php>
</body>
</html>