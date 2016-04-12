<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

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
<br>
<?php include 'footer.php';?>

<?php include '../Config/configconst.inc.php';
echo constant("TESTVAR1");?>
</body>
</html>