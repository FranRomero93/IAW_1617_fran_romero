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

        echo"<table>";
            for($i=0;$i<=100;$i++){
                echo"<tr>";
                if ($i==0){
                    echo"<td style='height:10px; width:10px;' border='1'><p>Numero</p></td>";
                    echo"<td style='height:10px; width:10px;' border='1'><p>2</p></td>";
                    echo"<td style='height:10px; width:10px;' border='1'><p>3</p></td>";
                    echo"<td style='height:10px; width:10px;' border='1'><p>4</p></td>";
                    echo"<td style='height:10px; width:10px;' border='1'><p>5</p></td>";
                }
                else {
                    echo"<td style='height:10px; width:10px;' border='1'><p>".$i."</p></td>";
                    for($a=2;$a<=5;$a++){
                        if($i%$a==0){
                            echo"<td style='height:10px; width:10px;' border='1'><p>x</p></td>";
                        }
                        else{
                            echo"<td style='height:10px; width:10px;' border='1'><p>-</p></td>";
                        }
                    }
                }                
                echo"</tr>";
          }
       echo "</table>";
        
    ?>
</body>
</html>
