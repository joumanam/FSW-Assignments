<?php

function reverseArray($arr) {
    for ($i = (count($arr) - 1); $i > -1; $i--) {
        echo $arr[$i], "\n";
    }
    
}
echo reverseArray([1,4,5,2,3]);



?>