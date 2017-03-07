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
            <h1><a href="index.php">Biblioteca Virtual</a><small> Inicio Sesión</small></h1>
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
            <div class="row">
		      <div class="col-md-4 col-md-offset-4">
    		      <div class="panel panel-default">
			  	      <div class="panel-heading">
			    	        <h3 class="panel-title">Introduca los datos</h3>
			 	       </div>
			  	      <div class="panel-body">
			    	        <form accept-charset="UTF-8" role="form" method="post">
                            <fieldset>
			    	  	     <div class="form-group">
			    		           <input class="form-control" placeholder="E-mail" name="mail" type="email" required>
			    		       </div>
			    		       <div class="form-group">
			    			      <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
			    		       </div>
			    		       <input class="btn btn-lg btn-success btn-block" type="submit" value="login">
			    	        </fieldset>
			      	      </form>
			         </div>
			     </div>
		      </div>
	       </div>
        </div>
    </div>
    
    <?php if (isset($_POST["mail"])) {
                $consulta="select * from usuarios where
          email='".$_POST["mail"]."' and password=md5('".$_POST["password"]."');";
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