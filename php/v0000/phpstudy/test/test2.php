<?php 

echo "test2";
echo "<br>";
include './TestClass.class.php';

$e = new TestClass();
$e->data1 = 5;
$e->data2 = 7;
echo $e->sum();
echo "<br>";
echo "end.";