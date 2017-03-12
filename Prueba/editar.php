<?php
    session_start();
    include_once ('library/conexion-bd.php');

    if (empty($_POST)) {
        
     header("Location: index.php");
        
    } else {
        if (isset($_GET["id_usuario"])){
            $query="UPDATE usuarios SET nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', dni='".$_POST['dni']."', email='".$_POST['email']."', telefono=".$_POST['telefono'].", direccion='".$_POST['direccion']."', nivel_usuario=".$_POST['nivel_usuario']." WHERE id_usuario='".$_GET['id_usuario']."';";
            
            if ($result = $connection->query($query)) {
                header("location:administracion.php");
            } else {
                echo"QUERY ERRÓNEO";
                var_dump($query);
                var_dump($_POST);
                var_dump($_GET);
            }
        }
        
        if (isset($_GET["id_libro"])){
            $query="UPDATE libro SET titulo='".$_POST['titulo']."', editorial='".$_POST['editorial']."', descripcion='".$_POST['descripcion']."', disponibles=".$_POST['disponibles'].", fecha_lanzamiento='".$_POST['fecha_lanzamiento']."' WHERE id_libro='".$_GET['id_libro']."';";
            
            if ($result = $connection->query($query)) {
                header("location:administracion.php");
            } else {
                echo"QUERY ERRÓNEO";
                var_dump($query);
                var_dump($_POST);
                var_dump($_GET);
            }
        }
        
        if (isset($_GET["id_autor"])){
            $query="UPDATE autor SET nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."' WHERE id_autor='".$_GET['id_autor']."';";
            
            if ($result = $connection->query($query)) {
                header("location:administracion.php");
            } else {
                echo"QUERY ERRÓNEO";
                var_dump($query);
                var_dump($_POST);
                var_dump($_GET);
            }
        }
        
        if (isset($_GET["id_categoria"])){
            $query="UPDATE categoria SET nombre_categoria='".$_POST['nombre_categoria']."' WHERE id_categoria='".$_GET['id_categoria']."';";
            
            if ($result = $connection->query($query)) {
                header("location:administracion.php");
            } else {
                echo"QUERY ERRÓNEO";
                var_dump($query);
                var_dump($_POST);
                var_dump($_GET);
            }
        }
    }
?>