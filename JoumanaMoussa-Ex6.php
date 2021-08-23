<?php

function binToDec($x) {                     //turning the variable to an array so we can iterate through it
    $newx = str_split($x);
    $newx = array_reverse($newx);           //reversing the array so we can use the index as the power value
    $dec = 0;
    print_r($newx);

    foreach($newx as $index => $elmt) {
        if ($elmt == 1) {
            $dec += 2 ** $index;
        };
    };
    return $dec;
}

echo binToDec(1100);