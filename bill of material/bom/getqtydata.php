<?php include 'functions.php';
session_start();

$acc =	(!isset($_GET['acc ']) ? 0 : $_GET['acc']) ;
$aer =	(!isset($_GET['aer ']) ? 0 : $_GET['aer']) ;
$eirg=	(!isset($_GET['eirg']) ? 0 : $_GET['eirg']) ;
$arm =	(!isset($_GET['arm ']) ? 0 : $_GET['arm']) ;
$im  =	(!isset($_GET['im  ']) ? 0 : $_GET['im']) ;
$lem =	(!isset($_GET['lem ']) ? 0 : $_GET['lem']) ;
$n16 =	(!isset($_GET['n16 ']) ? 0 : $_GET['n16']) ;
$irg =	(!isset($_GET['irg ']) ? 0 : $_GET['irg']) ;
$aem =	(!isset($_GET['aem ']) ? 0 : $_GET['aem']) ;
$category=	(!isset($_GET['category']) ? 0 : $_GET['category']) ;
$make=	(!isset($_GET['make']) ? 0 : $_GET['make']) ;


$data=GetBOMQtydata($acc,$aer,$eirg,$arm,$im,$lem,$n16,$irg,$aem,$category,$make);
echo json_encode($data);
?>	