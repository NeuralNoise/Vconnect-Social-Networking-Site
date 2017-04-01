<?php
session_start();
if(isset($_SESSION['namei'])&& isset($_SESSION['passwo'])){
	header('Location: content.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="social.css">
	<title>Social Network</title>
</head>
<body>
	<div id="header">
		<h1>VConnect</h1>
		<form method="post" action="soclogin.php">
			<label id="email">Email or Phone</label>
			<label id="name2">Password</label><br>
				<input style="border-radius: 5px" id="email1" type="email" name="name">
				<input style="border-radius: 5px" id="password" type="Password" name="passw">
			 <input style="border-radius: 8px" id="butto" type="submit" name="password" value="Log in" > 
		 </form>
		<!-- <input id="log" type="submit" name="password" value="Log in">-->
		 <!--<a id="forgot" href="https://www.facebook.com/recover/initiate?lwv=111">Forgotten account?</a>-->
		 
	</div>
	
	<div class="right">
	<p id="para"><br></p>
	<img src="logo1.png" style="margin-left: 150px; padding-top: -5px; height: 220px" />
	<h1 id="signn">Sign Up</h1>
	<p style="margin-right:285px; float: right; color: black; font-family:arial; margin-top:-3%; font-size:20px"><br></p>
	<form method="post" action="signupp.php">
	
			<input style="float: right; margin-right:28.5% ;margin-top: -225px; height:38px;width:170px;font-size: 19px;font-style: arial;text-indent: 10px; border-radius: 10px" type="text" name="fn" placeholder="First name" required>&nbsp;
			
			<input style="float: right; margin-right:13% ;margin-top:-225px;height:38px;width:170px;font-size: 19px;font-style: arial;text-indent: 10px;border-radius: 10px"  type="text" name="ln" placeholder="Surname" required>
			
			<input style="float: right; margin-top:-13%;margin-right:6% ;height:38px;width:450px;font-size: 19px;font-style: arial;text-indent: 10px;border-radius: 10px"  type="email" name="emai" placeholder="Email address" required>
			
			<input style="float: right; margin-top:-7.5%;margin-right:6% ;height:38px;width:450px;font-size: 19px;font-style: arial;text-indent: 10px;border-radius: 10px" id="pass" type="Password" name="pass" placeholder="Enter New Password" required>

			<input style="float: right; margin-top:-2.5%;margin-right:6% ;height:38px;width:450px;font-size: 19px;font-style: arial;text-indent: 10px; border-radius: 10px" id="conf" type="Password" name="conf" placeholder="Re-enter New password">

			


			<div style="float: right; margin-top:2.5%;margin-right:-36% ;height:38px;width:450px;font-size: 19px;font-style: arial">
			Birthday
			<br>
			
			<input type="date" name="dat" data-date-inline-picker="true" required>
			
			</div>

			<div style="float: right; margin-top:7.5%;margin-right:-12% ;font-size: 19px;font-style: arial" required>
				<input type="radio" name="gende" value="Female">Female &nbsp;
				<input type="radio" name="gende" value="Male">Male
			</div>

			

			<input style="float: right; margin-top:10.5%;margin-right:-16% ;height:50px;width:200px; font-size:20px;font-style: arial;color: white;background-color:#E67E22;font-weight: bold; border-radius: 15px" type="submit" name="signup" value="Sign Up" onclick="myFunction1()"">
	</form>
	<script>
			var passs = document.getElementById("pass");
			var confirmpass = document.getElementById("conf");
				function myFunction1() {
				if(passs.value != confirmpass.value)
			    {
			    		confirmpass.setCustomValidity("Passwords Don't Match");
			    }
			   	else
			   			confirmpass.setCustomValidity("");

			 
			
		}

	</script>
</div>

</body>

</html>

