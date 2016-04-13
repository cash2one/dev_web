<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<?php 
//if (!defined('ROOT_PATH'))
//	die('不能访问'); //防止直接访问
?>
	
<h1>测试</h1>
<div class="menu">
<?php include 'menu.php';?>
</div>
<?php
echo "Hello World!";
?>
<br>
<?php
include 'vars.php';
echo "我有一辆" . $color . $car ;
?>
<br>

<?php
echo "file noFileExists.php is not exists";
#require 'noFileExists.php';
include 'noFileExists.php';
echo "I have a $color $car.";
?>

<br>
<?php include 'edit.php';?>

<?php include '../Config/configconst.inc.php';
echo constant("TESTVAR1");
echo "<br>";
echo $test_def1['testvar_1'];
echo "<br>";
$test_v2 = $test_def1['testvar_2']; 
echo $test_v2['testv_2_1'];
echo "<br>";
echo $test_v2['testv_2_2'];
?>

<br>
<?php include '../DBMySQL/DBConnect.php';
?>
<br>
<?php include '../DBMySQL/SQLCreate.php';
?>

<?php include 'footer.php';?>
</body>
</html>