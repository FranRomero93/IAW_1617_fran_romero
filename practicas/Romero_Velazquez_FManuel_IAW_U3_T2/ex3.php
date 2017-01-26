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
        
        $v1=array (56,77,199,21,34,123,43);
        $max=0;
        
        for($i=0; $i<sizeof($v1); $i++) {
            if ($v1[$i]>$max){
                $max=$v1[$i];
            }
        }
        
        echo "The max number in the array is $max"
        
    ?>
</body>
</html>