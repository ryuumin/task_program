<?php

require_once 'SendMySQL.php';

mb_internal_encoding('UTF-8');

session_start();

$userName = $_GET["UserName"];
$age = $_GET["Age"];


//���[�U�̊�{���̍X�V
$sql="UPDATE user SET age = '".$age."' where userName = '".$userName."'";
$result = sendMySQL($sql);

exit;
?>
