
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="home.css">
	<title>Social Network</title>
</head>
<body>
	<?php
		$con=mysqli_connect ("localhost","root","","vconnect");
		if (mysqli_connect_errno()) 
		{
			echo "failed to connect mysql: ". mysqli_connect_error();
		}
	?>
	<div  style="width: 1239px;height:29px  ;margin-left: -7.5px; padding: 1em; margin-top: -8.9px;background-color: #daa520;position: fixed">
	<ul>
		<li><a href=/socialnetwork_project/indexhome.php>HOME</a></li>
		<li id="topic"><a href=/socialnetwork_project/create_topic.php>CREATE A TOPIC</a></li>
		<li id="topic1"><a href=/socialnetwork_project/createcat.php>CREATE A CATEGORY</li>
		<li id="cat2"><a href="./password.html">CHANGE PASSWORD</a></li>
		<li id="cat1"><a href="./logout.php">LOG OUT</a></li>
	</ul>
	
	</div>
	<div style="width: 245px;height:1000px ;float: left;max-width: 260px;margin-left: -24px;padding: 1em;margin-top: 50px">
		<?php
			echo '<font color= #b23f05 family=tahoma size=7px><em><b>Welcome <br>' .$_SESSION['first'].'</b></em></font> ';
		?>
		<form method="post" action="" enctype="multipart/form-data" >
		<input type="file" name="file">
		<input type="submit" name="submit_image">
		
	</form>
	<?php


		
	//	session_start();
		if(isset($_SESSION['namei']) && isset($_SESSION['passwo']))
		{

	//	$_SESSION['username']="Payal";
			$con=mysqli_connect ("localhost","root","","vconnect");
			$sql="INSERT INTO images (username) VALUES('".$_SESSION['namei']."')";
			$result=mysqli_query($con,$sql);
	
		if(isset($_POST['submit_image']))
		{


	    	$errors     = array();
	    	$maxsize    = 2097152;
	    	$acceptable = array(
	      	 // 'application/pdf',
	      	  'image/jpeg',
	        	'image/jpg',
	        	'image/gif',
	        	'image/png'
	    	);

		    if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
		        $errors[] = 'File too large. File must be less than 2 megabytes.';
		    }

		    if(!in_array($_FILES['file']['type'], $acceptable))  {
		        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
		    }

		    	if(count($errors) === 0) {


					move_uploaded_file($_FILES['file']['tmp_name'], "pictures/".$_FILES['file']['name']);
					$con=mysqli_connect ("localhost","root","","vconnect");
					$q=mysqli_query($con,"UPDATE images SET image='" .$_FILES['file']['name']. "' WHERE username='" .$_SESSION['namei']. "'");
				}
				else 
				{
		        	foreach($errors as $error) {
		          	  echo '<script>alert("'.$error.'");</script>';
		        	}
		    	}
		}
	//	$con=mysqli_connect ("localhost","root","","vconnect");
		$q=mysqli_query($con,"SELECT * FROM images WHERE username='" .$_SESSION['namei']. "'");
		//echo "Hello";
		while ($row=mysqli_fetch_assoc($q)) {
		//	echo $row['username'];
			if($row['image']=="")
				{
					echo "not uploaded yet";
				}
			else
				{
					echo "<br><img width='200' height='300' src='pictures/".$row['image']."' alt='Profile Pic'>";
				}
				echo "<br>";
		}

}
	?>
	</div>
		<div  style="width: 980px;height:1000px ;margin-left: 248px;
    max-width: 2000px;
    padding: 1em;padding-top: 50px">
		<br>
	


<!--<table border="1">
			  <tr>
				<th>Category</th>
				<th>Last topic</th>
			  </tr><tr><td class='leftpart'><h3><a href='category.php?id=1'>garden</a></h3>all about gardens</td><td class='rightpart'><a href="topic.php?id=2">hello</a> at 15-01-2017</td></tr></td></tr>
	</div>-->

	