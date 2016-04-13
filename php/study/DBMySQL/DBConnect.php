<?php

$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

//$_SESSION['db'] = $con;
$GLOBALS['db'] = $con;

echo "<p> my sql connection OK</p>";

if (mysql_query("CREATE DATABASE IF NOT EXISTS test1 DEFAULT CHARSET utf8 COLLATE utf8_general_ci;", $con))
{
	echo "Database created";
}
else
{
	echo "Error creating database: " . mysql_error();
}

// here can not close mysql connection else will error on other page
// mysql_close($con);