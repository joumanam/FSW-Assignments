<?php

$arr = [1,4,5,2];
$min = $arr[0];
$max = 0;
foreach ($arr as $num) {
    if ($num < $min) {
        $min = $num;
    }
    if ($num > $max) {
        $max = $num;
    }
   }
   echo ("Minimum is: " . $min . "\nMaximum is: " . $max);


?>