<?php

//ONLINE
/*
  define('HOST', 'localhost');
  define('DATABASE', 'evoluo_db');
  define('USER', 'evoluo_db');
  define('PASSWORD', 'AOJJRaHDuU9p');
*/

//XAMP
/*
define('HOST', 'localhost');
  define('DATABASE', 'web2');
  define('USER', 'root');
  define('PASSWORD', '');
  */

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'loginsystem');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>
