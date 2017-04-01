<?php
	session_start();
	if(!isset($_SESSION['namei']) || !isset($_SESSION['passwo']))
	{
		header("Location: social.php");
	}
	include 'header.php';
	//include 'logoff.html';
//	echo " <font color=red family=tahoma size=60px ><em><b> Login Succes!!! </b></em></font><br><br>";
			
	//echo "<font color=blue family=tahoma size=50px><em><b>Welcome .$_SESSION['namei']</b></em></font> ";
			//echo $_SESSION['namei'];
			
	//include 'logoff.html';
?>

