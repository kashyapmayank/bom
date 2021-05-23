<?php include 'functions.php';
session_start();

$category=(!isset($_GET['cat']) ? "All" : $_GET['cat']) ;

$data=GetMakeData($category);
echo json_encode($data);
?>	