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
        
        $v1=array("2","4","6","8");
        $v2=array("7","8","9","10");
        
        $vc=array ();
    
        for($i=0; $i<sizeof($v1); $i++) {
          $vc[]="$v1[$i]";  
        }
        
        for($i=0; $i<sizeof($v2); $i++) {
          $vc[]="$v2[$i]";  
        }
        
        var_dump($vc);
        
    ?>
</body>
</html>