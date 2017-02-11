<?php

include("securite/conexion.php");
session_start();
if(isset($_SESSION['client'] )){
	
	   unset( $_SESSION['client']);
}
if(isset($_SESSION['date'] )){
	
	   unset( $_SESSION['date']);
}

$req="DELETE FROM `detail_cmd` WHERE etat='0' ";
mysql_query($req)or die(mysql_error());

header("location:pan.php");
?>
