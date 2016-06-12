<?php

namespace  eshop;

session_start();
 
echo defined("APP");
echo "<br>";
if (0 != defined("APP")) {
    echo constant("APP");
 } else {
     echo "NO APP";
 }
echo "<br>";
echo "good";

include 'EShop.php';
$app = new EShop();

?>
