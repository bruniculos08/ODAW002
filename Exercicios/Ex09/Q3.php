<?php
    $reader = fopen("Q3.txt", "r");
    $num = fgets($reader);
    $num = intval($num) + 1;
    echo $num."\n";
    fclose($reader);
    $writer = fopen("Q3.txt", "w");
    fwrite($writer, $num);
?>