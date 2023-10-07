<?php
    $reader = fopen("Q3.txt", "r");
    $num = fgets($reader);
    echo $num."\n";
    fclose($reader);
    $num = intval($num) + 1;
    $writer = fopen("Q3.txt", "w");
    fwrite($writer, $num);
?>