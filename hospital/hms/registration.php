<?php
include_once('include/config.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['full_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
	if ($query) {
		echo "<script>alert('Successfully Registered. You can login now');</script>";
		// header('location:user-login.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>User Registration</title>
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/register.css"> <!-- Updated path for custom CSS -->
</head>

<body class="user-register-body">
	<!-- start: REGISTRATION -->
	<div class="user-register-container">
		<div class="user-register-logo">
			<a href="../index.php">
				<h2>Smart Health | Patient Registration</h2>
			</a>
		</div>

		<div class="user-register-form-box">
			<form name="registration" id="registration" method="post" onSubmit="return valid();">
				<fieldset>
					<legend>Sign Up</legend>
					<p>Enter your personal details below:</p>

					<div class="form-group">
						<input type="text" class="user-register-input" name="full_name" placeholder="Full Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="user-register-input" name="address" placeholder="Address" required>
					</div>
					<div class="form-group">
						<input type="text" class="user-register-input" name="city" placeholder="City" required>
					</div>
					<div class="user-register-gender">
						<label class="block">Gender</label>
						<input type="radio" id="rg-female" name="gender" value="female">
						<label for="rg-female">Female</label>
						<input type="radio" id="rg-male" name="gender" value="male">
						<label for="rg-male">Male</label>
					</div>
					<p>Enter your account details below:</p>
					<div class="form-group">
						<input type="email" class="user-register-input" name="email" id="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" class="user-register-input" id="password" name="password" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input type="password" class="user-register-input" id="password_again" name="password_again" placeholder="Confirm Password" required>
					</div>
					<div class="user-register-checkbox">
						<input type="checkbox" id="agree" value="agree" checked="true" readonly="true">
						<label for="agree">I agree</label>
					</div>

					<div class="form-actions">
						<p>Already have an account? <a href="user-login.php">Log-in</a></p>
						<button type="submit" class="user-register-btn" id="submit" name="submit">
							Submit <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</fieldset>
			</form>

			<div class="user-register-copyright">
				&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Smart Health</span>. All rights reserved
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script>
		// Function for validating the password match
		function valid() {
			if (document.registration.password.value != document.registration.password_again.value) {
				alert("Password and Confirm Password Field do not match!");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
</body>

</html>