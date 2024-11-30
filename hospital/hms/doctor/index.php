<?php
session_start();
include("include/config.php");
error_reporting(0);

if (isset($_POST['submit'])) {
	$uname = $_POST['username'];
	$dpassword = md5($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='$uname' AND password='$dpassword'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['dlogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$uid = $num['id'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		// Code Logs
		$log = mysqli_query($con, "INSERT INTO doctorslog(uid,username,userip,status) VALUES('$uid','$uname','$uip','$status')");

		header("location:dashboard.php");
	} else {
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "INSERT INTO doctorslog(username,userip,status) VALUES('$uname','$uip','$status')");
		$_SESSION['errmsg'] = "Invalid username or password";
		// header("location:index.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor Login</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/login.css"> <!-- Updated CSS file -->
</head>

<body class="doctor-login-body">
	<div class="doctor-login-container">
		<div class="doctor-login-logo">
			<a href="../../index.php">
				<h2>Smart Health | Doctor Login</h2>
			</a>
		</div>

		<div class="doctor-login-form-box">
			<form class="form-login" method="post">
				<fieldset>
					<legend>Sign in to your account</legend>
					<p>
						Please enter your username and password to log in.<br />
						<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
					</p>
					<div class="form-group">
						<input type="text" class="doctor-login-input" name="username" placeholder="Username" required>
					</div>
					<div class="form-group form-actions">
						<input type="password" class="doctor-login-input password" name="password" placeholder="Password" required>
						<div class="doctor-login-forgot-password">
							<a href="forgot-password.php">Forgot Password?</a>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="doctor-login-btn" name="submit">
							Login <i class="fa fa-arrow-circle-right"></i>
						</button>
					</div>
				</fieldset>
			</form>

			<div class="doctor-login-copyright">
				<span class="text-bold text-uppercase">Smart Health</span>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>