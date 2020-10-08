<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Freedom Chat Room & Chat Web Application">
	<meta name="keywords" content="ChatRoom, Chat Application, Free Message, Text Free, Chat App, Chat Web, Chat">
	<meta name="author" content="AP Concepts">
	<title>MyCHAT! | SignUP</title>
	<!-- Link CSS Files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<!-- Link JS Files -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Internal CSS Files -->
	<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>
	<div class="signup-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Fill out this form and start chatting with your friends!!</p>
			</div>
			<div class="form-group">
				<label>Username:</label>
				<input type="text" class="form-control" name="user_name" placeholder="Example: Jhonny Walker" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" class="form-control" name="user_pass" placeholder="password" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Email Address:</label>
				<input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Country:</label>
				<select class="form-control" name="user_country" required>
					<option selected="" disabled="" hidden="">Select a Country</option>
					<option>Sri Lanka</option>
					<option>Pakistan</option>
					<option>India</option>
				</select>
			</div>
			<div class="form-group">
				<label>Gender:</label>
				<select class="form-control" name="user_gender" required>
					<option selected="" disabled="" hidden="">Select your Gender</option>
					<option>Male</option>
					<option>Female</option>
					<option>Other</option>
				</select>
			</div>
			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privay Policy</a></label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
			</div>
			<?php include("signup_user.php"); ?>
		</form>
		<div class="text-center small">Already have an account? <a href="signin.php">Signin here</a></div>
	</div>
</body>
</html>