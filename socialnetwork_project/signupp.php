<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("vconnect", $connection); // Selecting Database from Server
if(isset($_POST['signup']))
{ // Fetching variables of the form which travels in URL
	$finame = mysql_real_escape_string($_POST['fn']);
	$laname=mysql_real_escape_string($_POST['ln']);
	$email = mysql_real_escape_string($_POST['emai']);
	$passs=($_POST['pass']);
	$confirmpass=($_POST['conf']);
	$gende = $_POST['gende'];
	$datt=$_POST['dat'];
	if($finame !=''|| $email !='')
	{
				//Insert Query of SQL
		$query = mysql_query("insert into vcontab(fname,lname,username,password,dob,gender) values ('$finame', '$laname','$email','$passs','$datt','$gende')");
		echo "<br/><br/><font color= #b23f05 family=tahoma size=6px><em><b>Your account has been created succesfully...!!</b></em></font><br/>";
		echo "<font color= #b23f05 family=tahoma size=6px><em><b>Go to <a href='./social.php'> Login Page </a> to login</b></em></font>";
	}
	else
	{
			echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
	}		
}


mysql_close($connection); // Closing Connection with Server

?>
</body>
</html>
