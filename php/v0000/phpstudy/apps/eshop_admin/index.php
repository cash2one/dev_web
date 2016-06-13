<?php

namespace  eshop_admin;
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

include 'EShop_Admin.php';
$app = new EShop_Admin();
$app->run();
?>
