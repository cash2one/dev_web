<?php
$color='银色的';
$car='奔驰轿车';
$intvalue = $GLOBALS['inttest'];

/*
 * 超全局变量是：
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
*/
if (!$intvalue) {
	$GLOBALS['inttest'] = 1;	
}

