
<?php
		//echo "HIII";
		session_start();
		//echo "<h2>Your Input:</h2>";
		//get value passed from form in login.php
		$name=$_POST['name'];
		$pass=$_POST['passw'];
		//echo "HIII";

		//to prevent mysql injection
		$name=test_input($name);
		$pass=test_input($pass);
		$name= mysql_real_escape_string($name);
		$pass=mysql_real_escape_string($pass);
		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		}


		//connect to server and select database
		mysql_connect("localhost","root","");
		mysql_select_db("vconnect");


		//query database for user
		$result=mysql_query("select * from vcontab where username='$name' and password='$pass' ")
				or die("failed to query database ".mysql_error());

		$row=mysql_fetch_array($result);
		
		if ($row['username']==$name && $row['password']==$pass) {
		//	$ma=$row['name'];
			$_SESSION['namei']=$name;
			$_SESSION['passwo']=$pass;
			$_SESSION['first']=$row['fname'];
			header("Location: indexhome.php");
			//$_SESSION['login_status']=1;
			
		} else {
			
 				header('Location: social.php');
		}
		

	//	echo " Hi $name";
	//	echo "<br>";
	//	echo $email;
	//	echo "<br>";
	//	echo $website;
	//	echo "<br>";
	//	echo $comment;
	//	echo "<br>";
	//	echo $gender;
		
?>

</body>
</html>
