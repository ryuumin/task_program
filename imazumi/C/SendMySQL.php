<?php

function sendMySQL($sql){

	mb_internal_encoding('UTF-8');

	session_start();
	header('Content-Type: application/javascript; charset=utf-8');

	$url = "mysql022.phy.lolipop.lan";
	$user = "LAA0580134";
	$pass = "imazumi0205";
	$db = "LAA0580134-cosmotree";

	$link = mysql_connect($url,$user,$pass) or die("cannot connect database");
 
	$sdb = mysql_select_db($db,$link) or die("not correct database name");

$result = mysql_query($sql, $link) or die("mySQL error<br />SQL:".$sql);

return $result;
}
?>
