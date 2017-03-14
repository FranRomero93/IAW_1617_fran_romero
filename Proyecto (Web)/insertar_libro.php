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

    <!-- JS -->
    <script src="../Prueba/js/jquery-3.1.1.js"></script>
    
    <?php
        include_once ('library/conexion-bd.php');
    ?>
</head>

<body>
    <div class="container background">
        <div id="header" class="header">
            <h1><a href="index.php">Biblioteca Virtual</a><small> Añadir Libro</small></h1>
        </div>
        <div id="nav-">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">BV</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	       <div class="panel panel-default">
                        <div class="panel-heading">
			    		   <h3 class="panel-title">Datos del nuevo libro</h3>
                        </div>
			 			<div class="panel-body">
                            <form action="insertar_libro.php" method="post" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="titulo" class="form-control input-sm" placeholder="Titulo" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="editorial" class="form-control input-sm" placeholder="Editorial" required>
			    					</div>
			    				</div>
			    			</div>

                            <div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <input type="text" list="autores" name="nom_autor"  class="form-control input-sm" placeholder="Nombre Autor" required>
                                        <?php
                                            $consulta="Select nombre from autor";
                                            echo "<datalist id='autores'>";
                                            var_dump($consulta);
                                            if ($result = $connection->query($consulta)) {
                                                while($obj = $result->fetch_object()) {
                                                    echo "<option value='".$obj->nombre."'>";
                                                    if (isset($_POST["titulo"])){
                                                        if ($_POST["nom_autor"]==$obj->nombre){
                                                            $nom_check=1;
                                                        } else {
                                                            $nom_check=0;
                                                        }
                                                    }
                                                }
                                                echo"</datalist>";
                                            }
                                            $result->close();
                                            unset($obj);
                                            unset($result);
                                            unset($consulta);
                                        ?>
                                    </div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
                                        <input type="text" list="ape_autores" name="ape_autor"  class="form-control input-sm" placeholder="Apellido Autor" required>
                                        <?php
                                            $consulta="Select apellidos from autor";
                                            echo "<datalist id='ape_autores'>";
                                            var_dump($consulta);
                                            if ($result = $connection->query($consulta)) {
                                                while($obj = $result->fetch_object()) {
                                                    echo "<option value='".$obj->apellidos."'>";
                                                    if (isset($_POST["titulo"])){
                                                        if ($_POST["ape_autor"]==$obj->apellidos){
                                                            $ape_check=1;
                                                        } else {
                                                            $ape_check=0;
                                                        }
                                                    }
                                                }
                                                echo"</datalist>";
                                            }
                                            $result->close();
                                            unset($obj);
                                            unset($result);
                                            unset($consulta);
                                        ?>
                                    </div>
			    				</div>
			    			</div>
                            
			    			<div class="form-group">
			    				<input type="text" list="categorias" name="categoria"  class="form-control input-sm" placeholder="Categoria" required>
                            <?php
                                $consulta="Select nombre_categoria from categoria";
                                echo "<datalist id='categorias'>";
                                var_dump($consulta);
                                if ($result = $connection->query($consulta)) {
                                    while($obj = $result->fetch_object()) {
                                        echo "<option value='".$obj->nombre_categoria."'>";
                                        if (isset($_POST["titulo"])){
                                            if ($_POST["categoria"]==$obj->nombre_categoria){
                                                $cate_check=1;
                                            } else {
                                                $cate_check=0;
                                            }
                                        }
                                    }
                                    echo"</datalist>";
                                }
                                $result->close();
                                unset($obj);
                                unset($result);
                                unset($consulta);
                            ?>
			    			</div>

			    			<div class="form-group">
			    				<input type="number" name="disponibles"  class="form-control input-sm" placeholder="Disponibles" required>
			    			</div>
                                
                            <div class="form-group">
			    				<input type="text" name="descripcion"  class="form-control input-sm" placeholder="Descripcion" required>
                            </div>  
                                
                            <div class="form-group">
			    				<input type="date" name="fecha_lanzamiento"  class="form-control input-sm" placeholder="Fecha lanzamiento" required>
                            </div>  
                                
                            
                                
			    			<input type="submit" value="Añadir" class="btn btn-info btn-block">
                       </form>
    
    <?php
         if (isset($_POST["titulo"])) {
            
            $titulo=$_POST["titulo"];
            $editorial=$_POST["editorial"];
            $nom_autor2=$_POST["nom_autor"];
            $ape_autor2=$_POST["ape_autor"];
            $categoria=$_POST["categoria"];
            $disponibles=$_POST["disponibles"];
            $descripcion=$_POST["descripcion"];
            $fecha_lanzamiento=$_POST["fecha_lanzamiento"];
            
            if($nom_check!=1 and $ape_check!=1){
                $consulta="insert into `autor` (`id_autor`, `nombre`, `apellidos`) values (null, '".$_POST["nom_autor"]."', '".$ape_autor2=$_POST["ape_autor"]."');";
                $result = $connection->query($consulta);
                unset($obj);
                unset($result);
                unset($consulta);
            }
             
            $consulta="select id_autor from autor where nombre='".$_POST["nom_autor"]."';";
            if ($result = $connection->query($consulta)) {
                while($obj = $result->fetch_object()) {
                    $id_autor=$obj->id_autor;
                }
            }
            unset($obj);
            unset($result);
            unset($consulta);
             
            if($cate_check!=1){
                $consulta="insert into `categoria` (`id_categoria`, `nombre_categoria`) values (null, '".$_POST["categoria"]."');";
                $result = $connection->query($consulta);
                unset($obj);
                unset($result);
                unset($consulta);
            } 
            
            $consulta="select id_categoria from categoria where nombre_categoria='".$_POST["categoria"]."';";
            if ($result = $connection->query($consulta)) {
                while($obj = $result->fetch_object()) {
                    $id_categoria=$obj->id_categoria;
                }
            }
            unset($obj);
            unset($result);
            unset($consulta);
             
            $consulta="insert into `libro` (`id_libro`, `id_autor`, `id_categoria`, `titulo`, `editorial`, `descripcion`, `disponibles`, `fecha_lanzamiento`, `imagen`) values (null, '$id_autor', '$id_categoria', '$titulo', '$editorial', '$descripcion', '$disponibles', '$fecha_lanzamiento', 'null');";
            var_dump($consulta);
            $result = $connection->query($consulta);
            unset($obj);
            unset($result);
            unset($consulta);
            
        }
    ?>

			    	</div>
	    		</div>
    		  </div>
    	   </div>
        </div>
    </div>
</body>
</html>