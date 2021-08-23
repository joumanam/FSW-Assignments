<?php

$arr = [2,3,5,7,8,10];
$oddArray = [];                                     # Preparing the lists
$evenArray = [];
foreach ($arr as $num) {
    if ($num % 2 == 0) {
        $evenArray[] = $num; }
    else {
        $oddArray[] = $num; }
}

echo "The even numbers are: \n";                     # Printing the Even list
foreach($evenArray as $evenNum) {
    echo $evenNum, "\n";
}

echo "The odd numbers are: \n";                       # Printing the Odd list
foreach($oddArray as $oddNum) {
    echo $oddNum, "\n";
}

?>