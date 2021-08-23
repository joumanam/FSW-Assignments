<?php

function factorial($x) {
    $total = 1;
    for ($i = 1; $i < ($x + 1); $i++) {
       $total *= $i;
    }
    return $total;
}

echo(factorial(7))

?>