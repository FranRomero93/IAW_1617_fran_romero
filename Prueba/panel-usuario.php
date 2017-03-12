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
            <h1><a href="index.php">Biblioteca Virtual</a><small> Panel de usuario</small></h1>
        </div>
        <div id="nav-">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">BV</a>
                    </div>
                        <ul class="nav navbar-nav">
                        </ul>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de usuario</div> 
                    <?php
                        $query="SELECT * from usuarios where id_usuario=".$_SESSION["id_usuario"];
                        if ($result = $connection->query($query)) {
                    ?>
                    <table class="table">
                    <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Mail</th>
                            <th>Teléfono</th>
                            <th>Direccion</th>
                            <th>Nivel de Usuario</th>
                        </thead>
                        <tbody>

                        <?php
                            while($obj = $result->fetch_object()){
                                echo "<tr>";
                                echo "<td><p type='text' >".$obj->nombre."</p></td>";
                                echo "<td><p type='text' >".$obj->apellidos."</p></td>";
                                echo "<td><p type='text' >".$obj->dni."</p></td>";
                                echo "<td><p type='text' >".$obj->email."</p></td>";
                                echo "<td><p type='text' >".$obj->telefono."</p></td>";
                                echo "<td><p type='text' >".$obj->direccion."</p></td>";
                                echo "<td><p type='text' >".$obj->nivel_usuario."</p></td>";
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
        </div>
    </div>
    
    <?php if (isset($_POST["mail"])) {
                $consulta="select * from usuarios where
          mail='".$_POST["mail"]."' and password=md5('".$_POST["password"]."');";
                if ($result = $connection->query($consulta)) {
                    $obj = $result->fetch_object();
                    
                    //No rows returned
                    if ($result->num_rows===0) {
                        echo "LOGIN INVALIDO";
                    } else {
                        //VALID LOGIN. SETTING SESSION VARS
                        $_SESSION["mail"]=$_POST["mail"];
                        $_SESSION["user"]=$obj->nombre;
                        header("Location: index.php");
                    } 

                }else {
                    echo "Wrong Query";
                    var_dump($consulta);
                }
            }
        ?>
    
</body>
</html>