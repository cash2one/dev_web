<?php

namespace  eshop_admin;
session_start();

   echo "\eshop_admin\index.php"."<br>";
   echo $_SERVER["PHP_SELF"]."<br>";
   echo __FILE__."<br>";
   //echo $GLOBALS['HTTP_RAW_POST_DATA']."<br>";
   echo "**********************<br>";
   
if (0 != defined("APP")) {
    echo constant("APP");
 } else {
     echo "NO APP";
 }
/*//
include '\objects\User.php';
$userobj = new User();
$userobj->id             = 21;
$userobj->loginName = "admin";

echo json_encode($userobj);
echo "<br>";
echo "jsonsobj";
echo "<br>";
//*/

include 'EShop_Admin.php';
$app = new EShop_Admin();
$app->run();
?>
