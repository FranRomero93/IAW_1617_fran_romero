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
                                        echo "<li class='active'><a href='administracion.php'>Administración</a></li>";
                                    } else {
                                        header("Location: index.php");
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
                            $i=0;
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<form action='editar.php?id_usuario='".$obj->id_usuario."' method='post'>";
                                echo "<td><input type='text' name='nombre' class='combo' value='".$obj->nombre."'></td>";
                                echo "<td><input type='text' name='apellidos' class='combo' value='".$obj->apellidos."'></td>";
                                echo "<td><input type='text' name='dni' class='combo' value='".$obj->dni."'></td>";
                                echo "<td><input type='text' name='email' class='combo_grande' value='".$obj->email."'></td>";
                                echo "<td><input type='text' name='telefono' class='combo' value='".$obj->telefono."'></td>";
                                echo "<td><input type='text' name='direccion' class='combo_grande' value='".$obj->direccion."'></td>";
                                echo "<td><input type='text' name='nivel_usuario' class='combo' value='".$obj->nivel_usuario."'></td>";
                                echo "<td><input type='submit' value='' name='txtName' class='input'></td>";
                                echo "<td><a href='borrar.php?tabla=usuarios&campo=id_usuario&id=$obj->id_usuario'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</form>";
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
                            <th>Titulo</th>
                            <th>Editorial</th>
                            <th>Descripción</th>
                            <th>Disponibles</th>
                            <th>Fecha_lanzamiento</th>
                            <th>Imagen</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<form action='editar.php?id_libro='".$obj->id_libro."' method='post'>";
                                echo "<td><input type='text' name='titulo' class='combo' value='".$obj->titulo."'></td>";
                                echo "<td><input type='text' name='editorial' class='combo_grande' value='".$obj->editorial."'></td>";
                                echo "<td><input type='text' name='descripcion' class='combo_grande descripcion' value='".$obj->descripcion."'></td>";
                                echo "<td><input type='text' name='disponibles' class='combo' value='".$obj->disponibles."'></td>";
                                echo "<td><input type='text' name='fecha_lanzamiento' class='combo' value='".$obj->fecha_lanzamiento."'></td>";
                                echo "<td><input type='text' name='imagen' class='combo' value='".$obj->imagen."'></td>";
                                echo "<td><input type='submit' value='' name='txtName' class='input'></td>";
                                echo "<td><a href='borrar.php?tabla=libro&campo=id_libro&id=$obj->id_libro'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</form>";
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
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<form action='editar.php?id_autor='".$obj->id_autor."' method='post'>";
                                echo "<td><input type='text' name='nombre' class='combo' value='".$obj->nombre."'></td>";
                                echo "<td><input type='text' name='apellidos' class='combo' value='".$obj->apellidos."'></td>";
                                echo "<td><input type='submit' value='' name='txtName' class='input'></td>";
                                echo "<td><a href='borrar.php?tabla=autor&campo=id_autor&id=$obj->id_autor'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</form>";
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
                            <th>Nombre de categoría</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()) {
                                echo "<tr>";
                                echo "<form action='editar.php?id_categoria='".$obj->id_categoria."' method='post'>";
                                echo "<td><input type='text' name='nombre_categoria' class='combo' value='".$obj->nombre_categoria."'></td>";
                                echo "<td><input type='submit' value='' name='txtName' class='input'></td>";
                                echo "<td><a href='borrar.php?tabla=categoria&campo=id_categoria&id=$obj->id_categoria'><img src='img/borrar.jpg' class='img-responsive' alt='Imagen responsive' width='30pt' height='30pt'></img></td>";
                                echo "</form>";
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