<?php

    function swap(&$a, &$b){
        $aux = $a;
        $a = $b;
        $b = $aux;
    }

    function quickSort(&$vet, $init, $end){
        $i = $init;
        $j = $end;
        $pivot = $vet[($j + $i)/2];
        
        if($i >= $j) return $vet;

        while($i < $j){
            while($vet[$i] < $pivot){
                $i++;
            }
            while($vet[$j] > $pivot){
                $j--;
            }
            if($i <= $j){
                swap($vet[$i], $vet[$j]);
                $i++;
                $j--;
            }
        }    

        if($init < $j) quickSort($vet, $init, $j);
        if($end > $i) quickSort($vet, $i, $end);

        return $vet;
    }

    $vet = array(2, 3, 1, 4);
    quickSort($vet, 0, count($vet)-1);
    for ($i=0; $i < count($vet) ; $i++) { 
        echo $vet[$i]."\n";
    }
?>