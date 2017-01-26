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
        
        $v1=[["A" =>1,"B"=>2,"C"=>3],["D"=>4,"E"=>5,"F"=>6],["G"=>7,"H"=>8,"I"=>9]];
    
        echo "<table style=\"border:1px solid black\">";
        
        for($i=0; $i<sizeof($v1); $i++){
            echo "<tr>";
            foreach ($v1[$i] as $key =>$valor){
            echo "<td width='50' height='50'>$key:$valor</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
        
    ?>
</body>
</html>