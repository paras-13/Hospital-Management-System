<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if (isset($_POST['submit'])) {
	$name = $_POST['fullname'];
	$email = $_POST['email'];
	$query = mysqli_query($con, "select id from users where fullName='$name' and email='$email'");
	$row = mysqli_num_rows($query);
	if ($row > 0) {
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		header('location:reset-password.php');
	} else {
		echo "<script>alert('Invalid details. Please try with valid details');</script>";
		echo "<script>window.location.href ='forgot-password.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Patient Password Recovery</title>

	<!-- External and custom CSS -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/forgot-password.css"> <!-- Custom styles for forgot-password page -->
</head>

<body class="login">

	<div class="container">
		<div class="main-login col-md-6 offset-md-3">
			<div class="logo margin-top-30">
				<a href="../index.php">
					<h2>Smart Health | Patient Password Recovery</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>Patient Password Recovery</legend>
						<p>
							Please enter your registered full name and email address to recover your password.
						</p>

						<div class="form-group">
							<input type="text" class="form-control" name="fullname" placeholder="Registered Full Name" required>
						</div>

						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Registered Email" required>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="submit">Reset <i class="fa fa-arrow-circle-right"></i></button>
						</div>

						<div class="new-account">
							Already have an account? <a href="user-login.php">Log-in</a>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <span class="text-bold text-uppercase">Smart Health</span> All rights reserved.
				</div>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>