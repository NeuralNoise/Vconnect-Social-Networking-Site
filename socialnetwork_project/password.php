
<?php
session_start();
if(isset($_SESSION['namei']) && isset($_SESSION['passwo']))
{

	/*echo '<form action="" method="post">
<label>Enter your current password</label>
<input type="password" name="p1"><br>
<label>Enter your new password</label>
<input type="password" name="p2"><br>
<label>Enter your new password again</label>
<input type="password" name="p3"><br>
<input type="submit" name="">
</form>';*/

$password=$_POST['p1'];
if($password==$_SESSION['passwo'])
{
	$con=mysqli_connect ("localhost","root","","vconnect");

	$password1 = $_POST['p2'];
	$password2 = $_POST['p3'];
	$username=$_SESSION['namei'];
	$password1 = mysql_real_escape_string($password1);
	$password2 = mysql_real_escape_string($password2);
	//echo $password1;
	//echo "$username";
	//$sql="UPDATE vcontab SET password='$password1' WHERE username='$username' )";
	//$result=mysqli_query($con,$sql);
	if ($password1!=$password2)
	{
	    echo "your passwords do not match";
	}
	else if (mysqli_query($con, "UPDATE vcontab SET password='$password1' WHERE username='$username'"))
	{
	    echo "You have successfully changed your password.";
	}
}
else
	 echo "your current passwords do not match";
}
?>