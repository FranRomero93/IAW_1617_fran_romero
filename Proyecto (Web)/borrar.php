<?php
    session_start();
    include_once ('library/conexion-bd.php');
    if (!isset($_SESSION)) {
     header("Location: index.php");
    }

    if (empty($_GET)) {
        
     echo "NOTHING HAS BEEN SENT";
        
    } else {
        $query="DELETE from ".$_GET['tabla']." where ".$_GET['campo']."='".$_GET['id']."'";
        echo ($query);
        if ($result = $connection->query($query)) {
            header("Location: administracion.php");
        } else {
            echo"QUERY ERRÓNEO";
        }
    }
?>