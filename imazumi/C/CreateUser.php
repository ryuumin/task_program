<?php

require_once 'SendMySQL.php';

mb_internal_encoding('UTF-8');

session_start();

$userName = $_GET["UserName"];
$password = $_GET["Password"];


//�������[�U�������݂��邩�𒲂ׂ�
$sql="SELECT * FROM user where userName = '".$userName."'";
$result = sendMySQL($sql);

$flag = 1;

//�������[�U�����o�^���Ă��邩
//���݂��Ă��Ȃ����0,���݂��Ă����1��Ԃ�
if(mysql_num_rows($result)!=0){
	$flag = 1;
}else{
	//�ȉ��̃v���O�����͐V�K�o�^���s�����߂̃v���O�����ł���B
	$sql="INSERT INTO user (userName,password,age) VALUES ('".$userName."','".$password."',20);";
	$result=sendMySQL($sql);
	$flag = 0;
}


$array[]=array('flag' => (string)$flag);

echo json_encode( $flag );
exit;
?>
