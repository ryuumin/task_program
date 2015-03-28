<?php

require_once 'SendMySQL.php';

$sql = $_GET["sql"];

$result = sendMySQL($sql);

echo json_encode( $result );
exit;
?>
