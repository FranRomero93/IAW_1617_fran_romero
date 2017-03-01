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
            <form action="inicio_sesion.php" method="post">

              <p>Nombre de usuario: <input name="user" required></p>
              <p>Contraseña: <input name="password" type="password" required></p>
              <p><input type="submit" value="login"></p>

            </form>
        </div>
        
        <?php if (isset($_POST["user"])) {
    
                  //CREATING THE CONNECTION
                  $connection = new mysqli("localhost", "user", "2asirtriana", "biblioteca");

                  //TESTING IF THE CONNECTION WAS RIGHT
                  if ($connection->connect_errno) {
                      printf("Connection failed: %s\n", $connection->connect_error);
                      exit();
                  }
                $consulta="select * from usuarios where
          nombre='".$_POST["user"]."' and password=md5('".$_POST["password"]."');";
        
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
                }
            }
        ?>
    </div>
    
</body>
</html> 