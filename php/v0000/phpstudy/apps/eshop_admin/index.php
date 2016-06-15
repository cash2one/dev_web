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
echo "good123";
echo "<br>";

include '\objects\User.php';
$userobj = new User();
$userobj->id             = 21;
$userobj->loginName = "admin";

echo json_encode($userobj);
echo "<br>";
echo "jsonsobj";
echo "<br>";

include 'EShop_Admin.php';
$app = new EShop_Admin();
$app->run();
?>
