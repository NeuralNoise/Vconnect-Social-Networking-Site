
<?php
session_start();
if(isset($_SESSION['namei']) && isset($_SESSION['passwo']))
{

	$con=mysqli_connect ("localhost","root","","vconnect");
	if (mysqli_connect_errno()) {
		echo "failed to connect mysql: ". mysqli_connect_error();
	}
	include 'header.php';

	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
	//someone is calling the file directly, which we don't want
		echo 'This file cannot be called directly.';
	}
	else
	{
		//check for sign in status
		if(!isset($_SESSION['namei']) || !isset($_SESSION['passwo']))
		{
			echo 'You must be signed in to post a reply.';
		}
		else
		{

			//a real user posted a real reply
			$sql = "INSERT INTO 
						posts(post_content,
							  post_date,post_topic,post_by) 
					VALUES ('" . $_POST['reply_content'] . "',
						NOW(),'" . $_GET['id'] . "','" . $_SESSION['first'] . "' )";
							
			$result = mysqli_query($con, $sql);
							
			if(!$result)
			{
				echo 'Your reply has not been saved, please try again later.';
			}
			else
			{
				/*echo '<h2 style="font-size:19px">Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.</h2>';*/
				$sql = "SELECT
				topic_id,
				topic_subject
			FROM
				topics
			WHERE
				topics.topic_id = '" . mysql_real_escape_string($_GET['id']) ."'";
				
	$result = mysqli_query($con, $sql);

	if(!$result)
	{
		echo 'The topic could not be displayed, please try again later.';
	}
	else
	{
		if(mysqli_num_rows($result) == 0)
		{
			echo 'This topic doesnt exist.';
		}
		else
		{
			while($row = mysqli_fetch_assoc($result))
			{
				//display post data
				echo '<table class="topic" border="1">
						<tr>
							<th colspan="2">' . $row['topic_subject'] . '</th>
						</tr>';
			
				//fetch the posts from the database
				$posts_sql = "SELECT
							posts.post_topic,
							posts.post_content,
							posts.post_date,
							posts.post_by,
							vcontab.id,
							vcontab.username
						FROM
							posts
						LEFT JOIN
							vcontab
						ON
							posts.post_by = vcontab.username
						WHERE
							posts.post_topic = '" . mysql_real_escape_string($_GET['id']) . "'";
							
				$posts_result = mysqli_query($con, $posts_sql);
				
				if(!$posts_result)
				{
					echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
				}
				else
				{
				
					while($posts_row = mysqli_fetch_assoc($posts_result))
					{
						echo '<tr class="topic-post">
								<td class="user-post" style="font-size:18px;font-weight:bold">' . $posts_row['post_by'] . '<br/>' . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . '</td>
								<td class="post-content" style="font-size:18px">' . htmlentities(stripslashes($posts_row['post_content'])) . '</td>
							  </tr>';
					}
				}
				
				if(!isset($_SESSION['namei']) || !isset($_SESSION['passwo']))
				{
					echo '<tr><td colspan=2>You must be <a href="signin.php">signed in</a> to reply. You can also <a href="signup.php">sign up</a> for an account.';
				}
				else
				{
					//show reply box
					echo '<tr><td colspan="2"><h2>Reply:</h2><br />
						<form method="post" action="reply.php?id=' . $row['topic_id'] . '">
							<textarea name="reply_content"></textarea><br /><br />
							<input type="submit" value="Submit reply" />
						</form></td></tr>';
				}
				
				//finish the table
				echo '</table>';
			}
		}
	}

}
			}
		}
	}

//include 'footer.php';
?>