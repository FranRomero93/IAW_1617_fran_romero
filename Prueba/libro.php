<?php
      session_start();
?>

<!doctype html>
<html class="no-js" lang="">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Virtual</title> 

    <!-- CSS Needed for BooStrap -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

    <!-- My own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <?php
        include_once ('library/conexion-bd.php');
    ?>
</head>

<body>
    <div class="container background">
        <div id="header" class="header">
            <h1><a href="index.php">Biblioteca Virtual</a></h1>
            <?php
                if (!isset($_SESSION["user"])){
                    echo "<p class='navbar-text pull-right'><a  href='login.php'>Iniciar Sesión</a> | <a     href=registro.php>Registrarte</a></p>";
                } else {
                    $user=$_SESSION["user"];
                    echo "<p class='navbar-text pull-right'>Conectado como <a href='panel-usuario.php' class='navbar-   link'>$user</a> | <a href=logout.php>Cerrar    Sesion</a></p>";
                }
            ?> 
        </div>
        <div id="nav-">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">BV</a>
                    </div>
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Novedades </a></li>
                            <li><a href="categorias.php">Categorias</a></li>
                            <li><a href="autores.php">Autores</a></li>
                            <?php                              
                                if(isset($_SESSION["user"])){
                                    $consulta="select nivel_usuario from usuarios where
    nombre='".$_SESSION["user"]."'";
                                    $result = $connection->query($consulta);
                                    $obj = $result->fetch_object();
                                    $nivel=$obj->nivel_usuario;
                                    if ($nivel==1){
                                        echo "<li><a href='administracion.php'>Administración</a></li>";
                                    }
                                    $result->close();
                                    unset($obj);
                                    unset($result);
                                }

                            ?>
                        </ul>
                </div>
            </nav> 
        </div>
        <div class="content">
            <?php
                 if (isset($_GET["id_libro"])) {
                    $consulta="select * from libro where id_libro='".$_GET['id_libro']."'";
                    $result = $connection->query($consulta);
                    $obj = $result->fetch_object();
                    
                    $result = $connection->query($consulta);
                    echo "<div class='libro .col-md-8'>";
                    echo "<a href='libro.php?' style='float: left;'><img class='imagen_libro_detalles' src='.$obj->imagen'><img></a>";
                    echo "<a href='libro.php?'><h4><br>$obj->titulo </a><small><i>$obj->fecha_lanzamiento</i></small></h4>";
                    echo "<p>$obj->descripcion</p>";
                    echo "<p>Editorial: $obj->editorial</p>";
                    echo "<p>Fecha_lanzamiento: $obj->fecha_lanzamiento</p>";
                    echo "<p>Disponibles: $obj->disponibles</p>";
                    $disponibles=$obj->disponibles;
                    if ($disponibles>0){
                        echo "<a href='reserva.php?id_libro=$obj->id_libro'><button class='pull-right' type='button' class='btn btn-default btn-lg btn-block' >Reservar</button></a>";
                    } else {
                        echo "No hay disponibles";
                    }
                    echo "</div>";
                    echo "</div>";
                    
                    $result->close();
                    unset($obj);
                    unset($result);
                } else {
                    header("Location:index.php");
                }
            ?>
        </div>
    </div>
</body>
</html>