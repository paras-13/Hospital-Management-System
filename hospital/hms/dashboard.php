<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

$id = $_SESSION["id"];
$sql = "SELECT email FROM USERS WHERE id = $id";
$res = mysqli_query($con, $sql);

$data = mysqli_fetch_array($res);
if ($res) {
	$email = $data['email'];
	$email = mysqli_real_escape_string($con, $email);
	$sql = "SELECT message, adminremark, postingdate, lastupdationdate FROM tblcontactus WHERE email = '$email'";
	$res = mysqli_query($con, $sql);
} else {
	echo "No user found.";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Dashboard</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,600,700|Raleway:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php');
		?>
		<div class="app-content">
			<?php include('include/header.php'); ?>
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">User | Dashboard</h1>
							</div>
							<ol class="breadcrumb">
								<li><span>User</span></li>
								<li class="active"><span>Dashboard</span></li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->

					<!-- start: USER INFO AND APPOINTMENTS -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x">
											<i class="fa fa-square fa-stack-2x text-primary"></i>
											<i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
										</span>
										<h2 class="StepTitle">My Profile</h2>
										<p class="links cl-effect-1">
											<a href="edit-profile.php">Update Profile</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x">
											<i class="fa fa-square fa-stack-2x text-primary"></i>
											<i class="fa fa-paperclip fa-stack-1x fa-inverse"></i>
										</span>
										<h2 class="StepTitle">My Appointments</h2>
										<p class="cl-effect-1">
											<a href="appointment-history.php">View Appointment History</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-white no-radius text-center">
									<div class="panel-body">
										<span class="fa-stack fa-2x">
											<i class="fa fa-square fa-stack-2x text-primary"></i>
											<i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
										</span>
										<h2 class="StepTitle">Book My Appointment</h2>
										<p class="links cl-effect-1">
											<a href="book-appointment.php">Book Appointment</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="admin-remark-container" style="margin-top:50px">
						<h1>Admin Remarks</h1>

						<?php
						if ($res && mysqli_num_rows($res) > 0) {
							echo "<table class='admin-remark-table'>";
							echo "<thead>
                    <tr>
                        <th>Your Message</th>
                        <th>Posting Date</th>
                        <th>Admin Remark</th>
                        <th>Last Updated</th>
                    </tr>
                  </thead>";
							echo "<tbody>";
							while ($row = mysqli_fetch_array($res)) {
								echo "<tr class='admin-remark-row'>";
								echo "<td>" . htmlspecialchars($row['message']) . "</td>";
								echo "<td>" . htmlspecialchars($row['postingdate']) . "</td>";
								echo "<td>" . htmlspecialchars($row['adminremark']) . "</td>";
								echo "<td>" . htmlspecialchars($row['lastupdationdate']) . "</td>";
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						} else {
							echo "<p class='no-remarks'>No recent remarks available.</p>";
						}
						?>

					</div>
					<div class="data-display">
						<!-- You can add dynamic data here, like appointment details or user stats -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>Latest Data</h3>
							</div>
							<div class="panel-body">
								<p>Here you can display the latest appointment details, statistics, or any relevant user information.</p>
							</div>
						</div>
					</div>
					<!-- end: DATA DISPLAY AREA -->
				</div>
			</div>
		</div>


		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->
	</div>

	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
</body>

</html>