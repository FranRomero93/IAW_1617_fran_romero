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
            
        $num=5;
    
        
            echo "<table border='1px solid black'>";
            echo "<tr>
                    <td>Num</td><td>Resultado</td>
                </tr>
            ";
            for ($i=1;$i<=100;$i++) {
                $resultado = $i*$multiplo;
                echo "<tr>
                    
                        <td>$multiplo*$i=</td><td>$resultado</td>
                      </tr>";
            }
            echo "</table>";
        
        
        /*$modolist = "ORD";
    
        switch ($modolist) {
            case "ORD":
                $tipolista ="ol";
                echo "<$tipolista>
                    <li>UNO</li>
                    <li>DOS</li>
                    <li>TRES</li>
                    <li>CUATRO</li>
                </$tipolista>";
                break;
                
            case "DES":
                $tipolista ="ul";
                echo "<$tipolista>
                    <li>UNO</li>
                    <li>DOS</li>
                    <li>TRES</li>
                    <li>CATRO</li>
                </$tipolista>";
                break;
                
            default:
                echo "Modo de lista desconocido";
                break;
        }*/
    
        /*if ($modolist=="ORD"){
            $tipolista ="ol";
            echo "<$tipolista>
                <li>UNO</li>
                <li>DOS</li>
                <li>TRES</li>
                <li>CUATRO</li>
             </$tipolista>";
        } elseif ($modolist=="DES") {
            $tipolista ="ul";
            echo "<$tipolista>
                <li>UNO</li>
                <li>DOS</li>
                <li>TRES</li>
                <li>CATRO</li>
             </$tipolista>";
        } else {
            echo "Modo de lista desconocido";
        }
    
        */
    ?>
</body>
</html>
