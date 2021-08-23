<?php

function remove_entry($arr, $x) {
    $newArr = [];
    foreach ($arr as $elmt) {
        if ($elmt != $x) {
            $newArr[] = $elmt;
        }
    }
    print_r($newArr);

    // or the below to have them in one line
    // foreach ($newArr as $elmt) {
    //     echo $elmt;
    // }
}

remove_entry([1,4,2,6,7], 2);

?>