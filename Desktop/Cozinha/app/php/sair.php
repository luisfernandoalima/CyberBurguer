<?php 
include_once (__DIR__ . '/conn/conn.php');
session_destroy();
header('location: ../../index.php');
exit;

?>