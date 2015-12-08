<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<!-- // <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
	<title>Login - Customer</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/customer_login_reg_styles.css">
</head>
<body>
	<div id="container">
		<div id="login" class="forms">
			<fieldset>
				<legend>Log in</legend>
				<form action="login" method="POST">
					<p class="red"><?= $this->session->flashdata("error") ?></p>
					<input type="email" name="email" placeholder="email">
					<input type="password" name="password" placeholder="password">
					<input id="loginButton" class="button" type="submit" value="Log In">
				</form>
			</fieldset>
		</div>
		<div id="register" class="forms">
			<fieldset>
				<legend>Register</legend>
				<form action="register" method="POST">
<?php
		if($this->session->flashdata("regErrors")){
			$errors["regErrors"] = $this->session->flashdata("regErrors");
			foreach($errors['regErrors'] as $error){
?>
					<div class="red"><?= $error ?></div>
<?php
			}		
		}
?>
					<p class="green"><?= $this->session->flashdata("success") ?></p>
					<input type="text" name="first_name" placeholder="First Name">
					<input type="text" name="last_name" placeholder="Last Name">
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<input type="password" name="confirm_password" placeholder="Confirm Password">
					<input id="regButton" class="button" type="submit" value="Register">
				</form>
			</fieldset>
		</div>
	</div>
</body>