

<?php
session_start();
if(isset($_SESSION['namei']) && isset($_SESSION['passwo']))
{
  //  {
    //    header("Location: social.php");
    //}
//create_cat.php
//include 'connect.php';
$con=mysqli_connect ("localhost","root","","vconnect");
if (mysqli_connect_errno()) {
echo "failed to connect mysql: ". mysqli_connect_error();
}
include 'header.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
 	 	<label style="font-weight:bold ;font-size:20px;color:#b23f05"><br> Category name: </label><input type="text" name="cat_name" /><br><br>
 		<label style="font-weight:bold ;font-size:20px;color:#b23f05">Category description: </label><br><textarea name="cat_description" /></textarea><br><br>
 		<input type="submit" value="Add category" style="background:#b23f05;font-weight:bold;font-size:15px"/>
 	 </form>';
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
 	   VALUES( '".mysql_real_escape_string($_POST['cat_name'])."',
 		      '".mysql_real_escape_string($_POST['cat_description'])."' )";
    $result = mysqli_query($con, $sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' ;
    }
    else
    {
        echo 'New category successfully added.';
    }
}



}
//include 'footer.php';
?>
