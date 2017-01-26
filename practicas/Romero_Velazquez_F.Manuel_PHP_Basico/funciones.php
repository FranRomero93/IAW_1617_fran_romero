<?php

function primero_diferente ($cadena1,$cadena2) {
    $a="";
    $fin=0;
    for($i=0;$i<=strlen($cadena1);$i++){
        if ($cadena1[$i]!=$cadena2[$i] || $fin=0){
            $a = $i;
            break;
        }
    }
    return $a;
}

?>