<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biblioteca Virtual</title>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <link rel="stylesheet" href="css/styles-ini.css">
      <link rel="stylesheet" href=""> 
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/funciones.js"></script>
    
    <script> 
        
    </script> 
    
    <?php
      session_start();
    ?>
</head>
<body>
    <div class="container">
        <div class="cabecera">
            <h1>Biblioteca Virtual</h1>
        </div>
        
        <div class="formulario">
            <form action="registro.php" method="post">

              <p>Nombre: <input name="user" onsubmit="comprobarClave()" required></p>
              <p>Apellidos: <input name="apellidos" type="text" required></p>
              <p>DNI: <input name="dni" type="text" required></p>
              <p>Mail: <input name="mail" type="email" required></p>
              <p>Telefono: <input name="telefono" type="number" required></p>
              <p>Direccion: <input name="direccion" required></p>
              <p>Contraseña: <input name="password" type="password" required></p>              
              <p><input type="submit" value="Registro" ></p>

            </form>
        </div>
        
        <?php 
        
                if (isset($_POST["user"])) {
    
                  //CREATING THE CONNECTION
                  $connection = new mysqli("localhost", "user", "2asirtriana", "biblioteca");

                  //TESTING IF THE CONNECTION WAS RIGHT
                  if ($connection->connect_errno) {
                      printf("Connection failed: %s\n", $connection->connect_error);
                      exit();
                  }
                    
                $user=$_POST["user"];
                $apellidos=$_POST["apellidos"];
                $dni=$_POST["dni"];
                $mail=$_POST["mail"];
                $telefono=$_POST['telefono'];
                $direccion=$_POST['direccion'];
                $password=$_POST['password'];
                    
                $consulta="insert into usuarios (nombre, apellidos, dni, mail, telefono, direccion, password) values ('$user', '$apellidos', '$dni', '$mail', $telefono, '$direccion', md5('$password'));";
        
                    
                if ($result = $connection->query($consulta)) {

                  //No rows returned
                  if ($result->num_rows===0) {
                    echo "LOGIN INVALIDO";
                  } else {
                    //VALID LOGIN. SETTING SESSION VARS
                    $_SESSION["user"]=$_POST["user"];

                    header("Location: index.php");
                  } 

                }else {
                        echo "Wrong Query";
                        var_dump($consulta);
                }
            }
        ?>
    </div>
    
</body>
</html> 