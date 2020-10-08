<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Freedom Chat Room & Chat Web Application">
	<meta name="keywords" content="ChatRoom, Chat Application, Free Message, Text Free, Chat App, Chat Web, Chat">
	<meta name="author" content="AP Concepts">
	<title>MyCHAT! | Login To Your Account</title>
	<!-- Link CSS Files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<!-- Link JS Files -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Internal CSS Files -->
	<link rel="stylesheet" type="text/css" href="./css/signin.css">
</head>
<body>
	<div class="signin-form">
		<form action="" method="post">
			<div class="form-header">
				<h2>Sign In</h2>
				<p>Login to <strong>MyCHAT! </strong></p>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" class="form-control" name="pass" placeholder="password" autocomplete="off" required>
			</div>
			<div class="small">Forgot password? <a href="forgot_pass.php">Click here</a></div><br/>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign in</button>
			</div>
			<?php include("signin_user.php"); ?>
		</form>
		<div class="text-center small">Don't have an account? <a href="signup.php">Create one</a></div>
	</div>
</body>
</html>