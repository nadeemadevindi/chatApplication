<!DOCTYPE html>
<?php 
session_start();
include("include/connection.php");

if (!isset($_SESSION['user_email'])) {
	header("location: signin.php");
} else{

}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Freedom Chat Room & Chat Web Application">
	<meta name="keywords" content="ChatRoom, Chat Application, Free Message, Text Free, Chat App, Chat Web, Chat">
	<meta name="author" content="AP Concepts">
	<title>MyCHAT! | HOME</title>
	<!-- Link CSS Files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Link JS Files -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Internal CSS Files -->
	<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center>
							<a href="include/finf_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add New Friends</button></a>
						</center>			
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<?php include("include/get_users_data.php"); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-slidebar">
				<div class="row">
					<!-- Getting the user information who is logged in -->
					<?php 
						$user = $_SESSION['user_email'];
						$get_user = "select * from users where user_email='$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
					?>

					<!-- Getting the user data on which user click -->
					<?php 
						if (isset($_GET['user_name'])) {
							global $con;

							$get_username = $_GET['user_name'];
							$get_user = "select * from users where user_name='$get_username'";
							$run_user = mysqli_query($con, $get_user);
							$row_user = mysqli_fetch_array($run_user);
							$username = $row_user['user_name'];
							$user_profile_image = $row_user['user_profile'];
						}

						$total_message = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
						$run_messages = mysqli_query($con, $total_message);
						$total = mysqli_num_rows($run_messages);
					?>
					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="<?php echo "$user_profile_image"; ?>">
						</div>
						<div class="right-header-detail">
							<form method="post">
								<p><?php echo "$username"; ?></p>
								<span><?php echo "$total"; ?> Messages</span> &nbsp &nbsp
								<button name="logout" class="btn btn-danger">Logout</button>
							</form>
							<?php 
								if (isset($_POST['logout'])) {
									$update_msg = mysqli_query($con, "UPDATE users SET log_in='offline' WHERE user_name='$user_name'");
									header("Location:logout.php");
									exit();
								}
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
						<?php 
							$update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username='$username' AND receiver_username='$user_name'");
							$sel_msg = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
							$run_msg = mysqli_query($con, $sel_msg);

							while ($row = mysqli_fetch_array($run_msg)) {
								
								$sender_username = $row['sender_username'];
								$receiver_username = $row['receiver_username'];
								$msg_content = $row['msg_content'];
								$msg_date = $row['msg_date'];
						?>
						<ul>
							<?php
								if ($user_name == $sender_username AND $username == $receiver_username) {
									echo "
										<li>
											<div class='rightside-right-chat'>
												<span> $username <small> $msg_date</small></span>
												<p> $msg_content</p>
											</div>
										</li>
									";
								} else if ($user_name == $receiver_username AND $username == $sender_username) {
									echo "
										<li>
											<div class='rightside-right-chat'>
												<span> $username <small> $msg_date</small></span>
												<p> $msg_content</p>
											</div>
										</li>
									";
								}
							?>
						</ul>
							<?php
								}
							?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 right-chat-textbox">
						<form action="" method="post">
							<input autocomplete="off" type="text" name="msg_content" placeholder="Write your Message........">
							<button class="btn" name="submit"> <i class="fa fa-telegram" aria-hidden="true"></i> </button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		if (isset($_POST['submit'])) {
			$msg = htmlentities($_POST['msg_content']);
			//$msg = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));

			if ($msg = "") {
				echo "
					<div class='alert alert-danger'>
						<strong><center> Message was unable to send </center></strong>
					</div>
				";
			} else if (strlen($msg) > 100) {
				echo "
					<div class='alert alert-danger'>
						<strong><center> Message is too long. Use only 100 characters </center></strong>
					</div>
				";
			} else {
				$insert = "insert into users_chat(sender_username, receiver_username, msg_content, msg_status, msg_date) values('$user_name', '$username', '$msg', 'unread', NOW())";
				$run_insert = mysqli_query($con, $insert);
			}
		}
	?>

	<script>
		$('#scrolling_to_bottom').animate({
			scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var height = $(window).height();
			$('.left-chat').css('height', (height - 92) + 'px');
			$('.right-header-contentChat').css('height', (height - 163) + 'px');
		});
	</script>

</body>
</html>