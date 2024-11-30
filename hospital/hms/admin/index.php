<?php
session_start();
error_reporting(0);
include("include/config.php");

if (isset($_POST['submit'])) {
	$uname = $_POST['username'];
	$upassword = $_POST['password'];

	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		header("location:dashboard.php");
	} else {
		$_SESSION['errmsg'] = "Invalid username or password";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/login.css"> <!-- Custom CSS file -->
</head>

<body class="admin-login-body">
	<div class="admin-login-container">
		<div class="admin-login-logo">
			<h2>Admin Login</h2>
		</div>

		<div class="admin-login-box">
			<form method="post">
				<fieldset>
					<legend>Sign in to your account</legend>
					<p>
						Please enter your username and password to log in.<br />
						<span class="error-message"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
					</p>

					<div class="form-group">
						<input type="text" class="admin-login-input" name="username" placeholder="Username" required />
					</div>

					<div class="form-group">
						<input type="password" class="admin-login-input" name="password" placeholder="Password" required />
					</div>

					<div class="form-actions">
						<button type="submit" class="admin-login-btn" name="submit">Login</button>
					</div>

					<div class="admin-login-footer">
						<a href="../../index.php">Back to Home</a>
					</div>
				</fieldset>
			</form>

			<div class="admin-login-copyright">
				<span>Hospital Management System</span>
			</div>
		</div>
	</div>

	<script src="assets/js/main.js"></script>
</body>

</html>