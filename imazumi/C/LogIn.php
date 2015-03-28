<?php

require_once 'SendMySQL.php';

mb_internal_encoding('UTF-8');

session_start();

$userName = $_GET["UserName"];
$password = $_GET["Password"];


//“¯‚¶ƒ†[ƒU–¼‚ª‘¶Ý‚·‚é‚©‚ð’²‚×‚é
$sql="SELECT * FROM user where userName = '".$userName."'";
$result = sendMySQL($sql);

$flag = 1;

//“¯‚¶ƒ†[ƒU–¼‚ª“o˜^‚µ‚Ä‚¢‚é‚©
//‘¶Ý‚µ‚Ä‚¢‚È‚¯‚ê‚Î0,‘¶Ý‚µ‚Ä‚¢‚ê‚Î1‚ð•Ô‚·
if(mysql_num_rows($result)!=0){
	$flag = 1;
}else{
	$flag = 0;
}


$array[]=array('flag' => (string)$flag);

echo json_encode( $flag );
exit;
?>
