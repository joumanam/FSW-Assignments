<?php

$list1 = "4, 5, 6, 7";                      
$list2 = "4, 5, 7, 8"; 
$newlist = str_split($list1 . ", " . $list2);
$finalList = [];

$res = '';

for ($i=0; $i<count($newlist); $i+=3) {
    if (!in_array($newlist[$i], $finalList)) {
        $finalList[] = $newlist[$i];
        $res = $res . $newlist[$i];
        if ($i != count($newlist)-1) {
            $res = $res . ', ';
        }
    }
}

echo $res;

?>
