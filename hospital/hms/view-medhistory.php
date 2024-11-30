<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

	$vid = $_GET['viewid'];
	$bp = $_POST['bp'];
	$bs = $_POST['bs'];
	$weight = $_POST['weight'];
	$temp = $_POST['temp'];
	$pres = $_POST['pres'];


	$query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
	if ($query) {
		echo '<script>alert("Medicle history has been added.")</script>';
		echo "<script>window.location.href ='manage-patient.php'</script>";
	} else {
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Users | Medical History</title>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<!-- <link rel="stylesheet" href="assets/css/plugins.css"> -->
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Users | Medical History</h1>
							</div>
							<ol class="breadcrumb">
								<li><span>Users</span></li>
								<li class="active"><span>Medical History</span></li>
							</ol>
						</div>
					</section>

					<!-- Patient Details -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">Users <span class="text-bold">Medical History</span></h5>
								<?php
								$vid = $_GET['viewid'];
								$ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$vid'");
								while ($row = mysqli_fetch_array($ret)) {
								?>
									<table border="1" class="table table-bordered">
										<tr align="center">
											<td colspan="4" style="font-size:20px;color:blue">Patient Details</td>
										</tr>
										<tr>
											<th>Patient Name</th>
											<td><?php echo $row['PatientName']; ?></td>
											<th>Patient Email</th>
											<td><?php echo $row['PatientEmail']; ?></td>
										</tr>
										<tr>
											<th>Patient Mobile Number</th>
											<td><?php echo $row['PatientContno']; ?></td>
											<th>Patient Address</th>
											<td><?php echo $row['PatientAdd']; ?></td>
										</tr>
										<tr>
											<th>Patient Gender</th>
											<td><?php echo $row['PatientGender']; ?></td>
											<th>Patient Age</th>
											<td><?php echo $row['PatientAge']; ?></td>
										</tr>
										<tr>
											<th>Patient Medical History (if any)</th>
											<td><?php echo $row['PatientMedhis']; ?></td>
											<th>Patient Reg Date</th>
											<td><?php echo $row['CreationDate']; ?></td>
										</tr>
									</table>
								<?php } ?>

								<!-- Medical History -->
								<?php
								$ret = mysqli_query($con, "SELECT * FROM tblmedicalhistory WHERE PatientID='$vid'");
								?>
								<table id="datatable" class="table table-bordered dt-responsive nowrap">
									<thead>
										<tr align="center">
											<th colspan="7">Medical History</th>
										</tr>
										<tr>
											<th>#</th>
											<th>Blood Pressure</th>
											<th>Weight</th>
											<th>Blood Sugar</th>
											<th>Body Temperature</th>
											<th>Medical Prescription</th>
											<th>Visit Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$cnt = 1;
										while ($row = mysqli_fetch_array($ret)) {
										?>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td><?php echo $row['BloodPressure']; ?></td>
												<td><?php echo $row['Weight']; ?></td>
												<td><?php echo $row['BloodSugar']; ?></td>
												<td><?php echo $row['Temperature']; ?></td>
												<td><?php echo $row['MedicalPres']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
											</tr>
										<?php $cnt++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<?php include('include/footer.php'); ?>

	<!-- SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
</body>

</html>