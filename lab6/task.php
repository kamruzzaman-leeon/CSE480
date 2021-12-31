<?php
function Jaccard($item1, $item2, $separator = ",")
{
    $item1 = array_unique(array_map('trim', explode($separator, strtolower($item1))));
    $item2 = array_unique(array_map('trim', explode($separator, strtolower($item2))));
    $arrIntersection = array_intersect($item2, $item1);
    $arrUnion = array_unique(array_merge($item1, $item2));
    $cofficient = count($arrIntersection) / count($arrUnion);
    return $cofficient;
}

$task1 = file_get_contents('file1.txt');

$task2 = file_get_contents('file2.txt');

 echo $task1 . '<br>' . $task2. '<br>' ;

echo "The result of two file is " . Jaccard($task1, $task2,"\n");
