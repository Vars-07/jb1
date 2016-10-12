<?php
/*
 * File Name: Database.php
 * Date: November 18, 2008
 * Author: Angelo Rodrigues
 * Description: Contains database connection, result
 *              Management functions, input validation
 *
 *              All functions return true if completed
 *              successfully and false if an error
 *              occurred
 */
$db_infotsav = 'infotsav';  //infotsav
$db_user = 'root'; 			//username
$db_pass = '';          // Password
$db_host = 'localhost';
mysql_connect($db_host,$db_user,$db_pass) or die("Error connecting to server conn1");
mysql_select_db($db_infotsav) or die("Error connecting to database infotsav");


?>
