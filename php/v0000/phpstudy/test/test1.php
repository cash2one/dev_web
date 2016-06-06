<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<?php 
if (defined('ROOT_PATH')) {
    // 重定向
    header("location: http://www.baidu.com");
    exit;
	//$site = "http://www.baidu.com/";
  //fopen($site,"r");
  
  //$url='http://www.baidu.com/'; 
  //$html = file_get_contents($url);

	//echo "good";
	//echo "<br>";
	//die('不能访问'); //防止直接访问
	//exit;
}
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
$intvalue = $GLOBALS['inttest'];
$GLOBALS['inttest'] = $intvalue + 1;
echo "<br>";
echo "inttest:" . $intvalue;
echo "<br>";
?>
<br>

<?php
echo "file noFileExists.php is not exists";
#require 'noFileExists.php';
include 'noFileExists.php';
echo "I have a $color $car.";
?>

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
<?php include 'edit.php';
?>

<br>
<?php include '../DBMySQL/DBConnect.php';
?>
<br>
<?php include '../DBMySQL/SQLCreate.php';
?>

<?php include '../Net/curl/test_curlsimple1.php';
    NetTest1::simpleTest1();
?>
<?php include 'footer.php';?>
</body>
</html>