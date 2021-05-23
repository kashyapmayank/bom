<?php include 'functions.php';
session_start();

$inst_id=(!isset($_GET['inst_id']) ? "0" : $_GET['inst_id']) ;

$data=GetPCB($inst_id);
echo json_encode($data);
?>	