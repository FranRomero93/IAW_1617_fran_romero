<?php
      session_start();
?>

<!doctype html>
<html class="no-js" lang="">
 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
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
            <h1><a href="index.php">Biblioteca Virtual</a><small> Administración</small></h1>
            <?php
                if (!isset($_SESSION["user"])){
                    echo "<p class='navbar-text pull-right'><a  href='login.php'>Iniciar Sesión</a> | <a     href=registro.php>Registrarte</a></p>";
                } else {
                    $user=$_SESSION["user"];
                    echo "<p class='navbar-text pull-right'>Conectado como <a href='#' class='navbar-   link'>$user</a> | <a href=logout.php>Cerrar    Sesion</a></p>";
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
                            <li><a href="contacto.php">Contacto</a></li>
                            <?php                              
                                if(isset($_SESSION["user"])){
                                    $consulta="select nivel_usuario from usuarios where
    nombre='".$_SESSION["user"]."'";
                                    $result = $connection->query($consulta);
                                    $obj = $result->fetch_object();
                                    $nivel=$obj->nivel_usuario;
                                    if ($nivel==1){
                                        echo "<li class='active'><a href='administracion.php'>Administración</a></li>";
                                    }
                                }
                                unset($result);
                                unset($obj);
                            ?>
                        </ul>
                </div>
            </nav> 
        </div>
        <div class="content">
            <div id="usuarios" class="table-responsive">
                <h2>Usuarios</h2>
                <?php
                    $query="SELECT * from usuarios";
                    if ($result = $connection->query($query)) {
                ?>

                    <table class="table table-hover" class="table">
                        <thead>
                            <tr>
                            <th>Id usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Mail</th>
                            <th>Teléfono</th>
                            <th>Direccion</th>
                            <th>Nivel de Usuario</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                    echo "<td>".$obj->id_usuario."</td>";
                                    echo "<td>".$obj->nombre."</td>";
                                    echo "<td>".$obj->apellidos."</td>";
                                    echo "<td>".$obj->dni."</td>";
                                    echo "<td>".$obj->email."</td>";
                                    echo "<td>".$obj->telefono."</td>";
                                    echo "<td>".$obj->direccion."</td>";
                                    echo "<td>".$obj->nivel_usuario."</td>";
                                    echo "<td><a href='editar.php?tabla=usuarios&campo=id_usuario&id=$obj->id_usuario'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                    echo "<td><a href='borrar.php?tabla=usuarios&campo=id_usuario&id=$obj->id_usuario'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</tr>";
                            }

                            $result->close();
                            unset($obj);
                            unset($result);
                            unset($query);
                        } 

                        ?>
                        </tbody>
                    </table>
            </div>
            <div id="libro" class="table-responsive">
                <h2>Libros</h2>
                <?php
                    $query="SELECT * from libro";
                    if ($result = $connection->query($query)) {
                ?>

                    <table class="table table-hover" class="table">
                        <thead>
                            <tr>
                            <th>Id libro</th>
                            <th>Id autor</th>
                            <th>Id categoría</th>
                            <th>Titulo</th>
                            <th>Editorial</th>
                            <th>Descripción</th>
                            <th>Disponibles</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                    echo "<td>".$obj->id_libro."</td>";
                                    echo "<td>".$obj->id_autor."</td>";
                                    echo "<td>".$obj->id_categoria."</td>";
                                    echo "<td>".$obj->titulo."</td>";
                                    echo "<td>".$obj->editorial."</td>";
                                    echo "<td>".$obj->descripcion."</td>";
                                    echo "<td>".$obj->disponibles."</td>";
                                    echo "<td><a href='editar.php?tabla=libro&campo=id_libro&id=$obj->id_libro'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                    echo "<td><a href='borrar.php?tabla=libro&campo=id_libro&id=$obj->id_libro'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</tr>";
                            }

                            $result->close();
                            unset($obj);
                            unset($result);
                        } 

                        ?>
                        </tbody>
                    </table>
            </div> 
            <div id="autor" class="table-responsive">
                <h2>Autores</h2>
                <?php
                    $query="SELECT * from autor";
                    if ($result = $connection->query($query)) {
                ?>

                    <table class="table table-hover" class="table">
                        <thead>
                            <tr>
                            <th>Id autor</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                    echo "<td>".$obj->id_autor."</td>";
                                    echo "<td>".$obj->nombre."</td>";
                                    echo "<td>".$obj->apellidos."</td>";
                                    echo "<td><a href='editar.php?tabla=autor&campo=id_autor&id=$obj->id_autor'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                    echo "<td><a href='borrar.php?tabla=autor&campo=id_autor&id=$obj->id_autor'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</tr>";
                            }

                            $result->close();
                            unset($obj);
                            unset($result);
                        } 

                        ?>
                        </tbody>
                    </table>
            </div>
            <div id="categoria" class="table-responsive">
                <h2>Categorias</h2>
                <?php
                    $query="SELECT * from categoria";
                    if ($result = $connection->query($query)) {
                ?>

                    <table class="table table-hover" class="table">
                        <thead>
                            <tr>
                            <th>Id categoria</th>
                            <th>Nombre de categoría</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                    echo "<td>".$obj->id_categoria."</td>";
                                    echo "<td>".$obj->nombre_categoria."</td>";
                                    echo "<td><a href='editar.php?tabla=categoria&campo=id_categoria&id=$obj->id_categoria'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                    echo "<td><a href='borrar.php?tabla=categoria&campo=id_categoria&id=$obj->id_categoria'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</tr>";
                            }

                            $result->close();
                            unset($obj);
                            unset($result);
                        }

                        ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>