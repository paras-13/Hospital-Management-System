<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | Dashboard</title>

		<!-- Google Fonts -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

		<!-- Core CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/styles.css"> <!-- Updated to use a single file for custom styles -->

		<!-- Theme Style -->
	</head>

	<body>
		<div id="app">
			<!-- Sidebar and Header are commented out, use them conditionally -->
			<?php include('include/sidebar.php');
			?>


			<div class="app-content">
				<!-- Main Content -->
				<?php include('include/header.php'); ?>
				<div class="main-content">
					<div class="container" id="container">
						<!-- Page Title -->
						<section id="page-title">
							<div>
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Dashboard</h1>
								</div>
								<ol class="breadcrumb">
									<li><span>User</span></li>
									<li class="active"><span>Dashboard</span></li>
								</ol>
							</div>
						</section>

						<!-- Dashboard Panels -->
						<div class="container-fluid bg-white">
							<div class="row">
								<!-- My Profile Panel -->
								<div class="col-sm-4">
									<div class="panel panel-white text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x">
												<i class="fa fa-square fa-stack-2x text-primary"></i>
												<i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">My Profile</h2>
											<p class="links">
												<a href="edit-profile.php">Update Profile</a>
											</p>
										</div>
									</div>
								</div>

								<!-- My Appointments Panel -->
								<div class="col-sm-4">
									<div class="panel panel-white text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x">
												<i class="fa fa-square fa-stack-2x text-primary"></i>
												<i class="fa fa-paperclip fa-stack-1x fa-inverse"></i>
											</span>
											<h2 class="StepTitle">My Appointments</h2>
											<p>
												<a href="appointment-history.php">View Appointment History</a>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<?php include('include/footer.php'); ?>

			<!-- Main Scripts -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
			<script src="assets/js/main.js"></script> <!-- Reduced JS dependencies by using one file -->
		</div>
	</body>

	</html>
<?php } ?>