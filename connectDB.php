<?php
session_start();
 
$dbhost = "localhost";
$dbname = "wand";
$dbuser = "root";
$dbpass = "Rw6nNKc5AHe7";
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
