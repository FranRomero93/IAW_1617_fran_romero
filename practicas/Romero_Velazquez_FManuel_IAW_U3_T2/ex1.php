<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" type="text/css" href=" ">
</head>

<body>
    <?php
        
        $v1=array("A","B","C","D");
        echo "<ul>";
        for($i=sizeof($v1)-1; $i >=0; $i--) {
            echo"<li>$v1[$i]</li>";
        }
        echo '</ul>';
    ?>
</body>
</html>