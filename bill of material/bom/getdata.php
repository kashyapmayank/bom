<?php include 'functions.php';
session_start();

$data=GetBOMdata();
echo json_encode($data);
?>	

