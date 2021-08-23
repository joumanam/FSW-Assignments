<?php

function arrayUnion ($arr1, $arr2) {
    foreach ($arr2 as $elmt) {
        // echo ($elmt);
        if (!in_array($elmt,$arr1)) {
            $arr1[] = $elmt;}
    }
    print_r($arr1);
}
arrayUnion([1,3,4,5], [3, 'hi', 6,4,9,7,8]);

?>