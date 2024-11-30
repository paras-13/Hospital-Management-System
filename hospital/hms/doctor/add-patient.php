<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$docid = $_SESSION['id'];
		$patname = $_POST['patname'];
		$patcontact = $_POST['patcontact'];
		$patemail = $_POST['patemail'];
		$gender = $_POST['gender'];
		$pataddress = $_POST['pataddress'];
		$patage = $_POST['patage'];
		$medhis = $_POST['medhis'];
		$sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
		if ($sql) {
			echo "<script>alert('Patient info added Successfully');</script>";
			header('location:add-patient.php');
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | Add Patient</title>
		<!-- Minimal CSS and JS only for the Add Patient form -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/styles.css" rel="stylesheet">
		<link href="assets/css/add-patient.css" rel="stylesheet"> <!-- Scoped CSS for Add Patient -->

		<!-- Remove unnecessary CSS and JS dependencies -->
		<!-- (Removed: fontawesome, themify-icons, animate, perfect-scrollbar, switchery, bootstrap-touchspin, select2, datepicker, timepicker) -->

		<script>
			function userAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'email=' + $("#patemail").val(),
					type: "POST",
					success: function(data) {
						$("#user-availability-status1").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>
	</head>

	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">
				<?php include('include/header.php'); ?>

				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Patient | Add Patient</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient</span>
									</li>
									<li class="active">
										<span>Add Patient</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Patient</h5>
												</div>
												<div class="panel-body">
													<form role="form" name="" method="post">

														<div class="form-group">
															<label for="doctorname">
																Patient Name
															</label>
															<input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required="true">
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Contact no
															</label>
															<input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Email
															</label>
															<input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
															<span id="user-availability-status1" style="font-size:12px;"></span>
														</div>
														<div class="form-group">
															<label class="block">
																Gender
															</label>
															<div class="clip-radio radio-primary">
																<input type="radio" id="rg-female" name="gender" value="female">
																<label for="rg-female">
																	Female
																</label>
																<input type="radio" id="rg-male" name="gender" value="male">
																<label for="rg-male">
																	Male
																</label>
															</div>
														</div>
														<div class="form-group">
															<label for="address">
																Patient Address
															</label>
															<textarea name="pataddress" class="form-control" placeholder="Enter Patient Address" required="true"></textarea>
														</div>
														<div class="form-group">
															<label for="fess">
																Patient Age
															</label>
															<input type="text" name="patage" class="form-control" placeholder="Enter Patient Age" required="true">
														</div>
														<div class="form-group">
															<label for="fess">
																Medical History
															</label>
															<textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
														</div>

														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Add
														</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="panel panel-white">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

		<!-- end: SETTINGS -->

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
<?php } ?>