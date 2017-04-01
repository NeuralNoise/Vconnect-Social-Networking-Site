<?php
	$sql = "SELECT
			vcontab.fname,
			vcontab.lname,
			vcontab.username,
			/*COUNT(topics.topic_id) AS topics*/
			FROM
			vcontab,
			WHERE
				vcontab.username='".$_GET['namei']."'";
	
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	while($row = mysqli_fetch_array($result))
	{
			echo '<font color=#000000 family=tahoma size=5px><em><b>Welcome <br>' .$_SESSION['namei'].'</b></em></font> ';
	}
	?>
