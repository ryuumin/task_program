<?php

require_once 'SendMySQL.php';

mb_internal_encoding('UTF-8');

session_start();

$userName = $_GET["UserName"];
$password = $_GET["Password"];


//同じユーザ名が存在するかを調べる
$sql="SELECT * FROM user where userName = '".$userName."'";
$result = sendMySQL($sql);

$flag = 1;

//同じユーザ名が登録しているか
//存在していなければ0,存在していれば1を返す
if(mysql_num_rows($result)!=0){
	$flag = 1;
}else{
	$flag = 0;
}


$array[]=array('flag' => (string)$flag);

echo json_encode( $flag );
exit;
?>
