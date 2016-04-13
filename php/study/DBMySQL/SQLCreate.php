<?php
// $con = $_SESSION['db'];
$con = $GLOBALS['db'];
if (mysql_query("CREATE DATABASE IF NOT EXISTS test2 DEFAULT CHARSET utf8 COLLATE utf8_general_ci;", $con))
{
	echo "Database created";
}
else
{
	echo "Error creating database: " . mysql_error();
}