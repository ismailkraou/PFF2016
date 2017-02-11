<?php
include("securite/conexion.php");
session_start();

	 if(!isset($_SESSION['login']) or $_SESSION['login']=='' or !isset($_GET['id'])){


		header("Location: ../index.php");
	}else{
 	$id=$_GET['id'];
	$req="delete from detail_boncmd where id='$id' and etat='0'";
	mysql_query($req) or die(mysql_error());
	header("location:NouveauBonCmd.php");
	
		
		
	}
 ?>