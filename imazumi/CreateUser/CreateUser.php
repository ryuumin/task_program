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

//�������[�U�������݂��邩�𒲂ׂ�
$sql="SELECT * FROM user where userName = '".$userName."'";
$result = mysql_query($sql, $link) or die("mySQL error<br />SQL:".$sql);

$flag = 1;

//�������[�U�����o�^���Ă��邩
//���݂��Ă��Ȃ����0,���݂��Ă����1��Ԃ�
if(mysql_num_rows($result)!=0){
	$flag = 1;
}else{
	//�ȉ��̃v���O�����͐V�K�o�^���s�����߂̃v���O�����ł���B
	$sql="INSERT INTO user (userName,password,age) VALUES ('".$userName."','".$password."',20);";
	$result=mysql_query($sql,$link) or exit("cannot write new data".$sql);
	$flag = 0;
}


$array[]=array('flag' => (string)$flag);

echo json_encode( $array );
exit;
?>
