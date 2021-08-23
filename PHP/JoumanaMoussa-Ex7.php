<?php

$arr = [1,3,9,2];
$highest = $arr[0];

foreach ($arr as $index => $num) {
    if ($num > $highest) {
        $highest = $num;
        $ind = $index;
    }
}
echo "The index of the highest value is $ind";

?>