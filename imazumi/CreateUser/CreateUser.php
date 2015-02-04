<?php

mb_internal_encoding('UTF-8');

session_start();
header('Content-Type: application/javascript; charset=utf-8');
 
$json = file_get_contents('php://input');
$data = json_decode($json, true);

$url = "mysql022.phy.lolipop.lan";
$user = "LAA0580134";
$pass = "imazumi0205";
$db = "LAA0580134-cosmotree";

$link = mysql_connect($url,$user,$pass) or die("cannot connect database");
 
$sdb = mysql_select_db($db,$link) or die("not correct database name");

$userName = (string)(isset($data['userName']) ? $data['userName'] : "");
$password = (string)(isset($data['password']) ? $data['password'] : "");

//同じユーザ名が存在するかを調べる
$sql="SELECT * FROM user where userName = '".$userName."'";
$result = mysql_query($sql, $link) or die("mySQL error<br />SQL:".$sql);

$flag = 1;

//同じユーザ名が登録しているか
//存在していなければ0,存在していれば1を返す
if(mysql_num_rows($result)!=0){
	$flag = 1;
}else{
	//以下のプログラムは新規登録を行うためのプログラムである。
	$sql="INSERT INTO user (userName,password,age) VALUES ('".$userName."','".$password."',20);";
	$result=mysql_query($sql,$link) or exit("cannot write new data".$sql);
	$flag = 0;
}


$array[]=array('flag' => (string)$flag);

echo json_encode( $array );
exit;
?>
