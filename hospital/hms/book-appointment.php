<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$specilization = $_POST['Doctorspecialization'];
	$doctorid = $_POST['doctor'];
	$userid = $_SESSION['id'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['apptime'];
	$userstatus = 1;
	$docstatus = 1;
	$query = mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if ($query) {
		echo "<script>alert('Your appointment successfully booked');</script>";
		header("Location: app.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Book Appointment</title>
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}

		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function(data) {
					$("#fees").html(data);
				}
			});
		}
	</script>
	<style>
		.bn54 {
			position: relative;
			outline: none;
			text-decoration: none;
			border-radius: 50px;
			display: flex;
			justify-content: center;
			align-items: center;
			cursor: pointer;
			text-transform: uppercase;
			height: 45px;
			width: 130px;
			opacity: 1;
			background-color: #ffffff;
			border: 1px solid rgba(0, 0, 0, 0.6);
		}

		.bn54 .bn54span {
			font-family: Verdana, Geneva, Tahoma, sans-serif;
			color: #000000;
			font-size: 12px;
			font-weight: 500;
			letter-spacing: 0.7px;
		}

		.bn54:hover {
			animation: bn54rotate 0.7s ease-in-out both;
		}

		.bn54:hover .bn54span {
			animation: bn54storm 0.7s ease-in-out both;
			animation-delay: 0.06s;
		}

		@keyframes bn54rotate {
			0% {
				transform: rotate(0deg) translate3d(0, 0, 0);
			}

			25% {
				transform: rotate(3deg) translate3d(0, 0, 0);
			}

			50% {
				transform: rotate(-3deg) translate3d(0, 0, 0);
			}

			75% {
				transform: rotate(1deg) translate3d(0, 0, 0);
			}

			100% {
				transform: rotate(0deg) translate3d(0, 0, 0);
			}
		}

		@keyframes bn54storm {
			0% {
				transform: translate3d(0, 0, 0) translateZ(0);
			}

			25% {
				transform: translate3d(4px, 0, 0) translateZ(0);
			}

			50% {
				transform: translate3d(-3px, 0, 0) translateZ(0);
			}

			75% {
				transform: translate3d(2px, 0, 0) translateZ(0);
			}

			100% {
				transform: translate3d(0, 0, 0) translateZ(0);
			}
		}
	</style>
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
								<h1 class="mainTitle">User | Book Appointment</h1>
							</div>
							<ol class="breadcrumb">
								<li><span>User</span></li>
								<li class="active"><span>Book Appointment</span></li>
							</ol>
					</section>
					<!-- end: PAGE TITLE -->

					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Book Appointment</h5>
											</div>
											<div class="panel-body">
												<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
													<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
												<form role="form" name="book" method="post">
													<div class="form-group">
														<label for="DoctorSpecialization">Doctor Specialization</label>
														<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
															<option value="">Select Specialization</option>
															<?php
															$ret = mysqli_query($con, "select * from doctorspecilization");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['specilization']); ?>"><?php echo htmlentities($row['specilization']); ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="doctor">Doctors</label>
														<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
															<option value="">Select Doctor</option>
														</select>
													</div>
													<div class="form-group">
														<label for="consultancyfees">Consultancy Fees</label>
														<select name="fees" class="form-control" id="fees" readonly></select>
													</div>
													<div class="form-group">
														<label for="AppointmentDate">Date</label>
														<input class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd">
													</div>
													<div class="form-group">
														<label for="Appointmenttime">Time</label>
														<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
													</div>
													<button type="submit" name="submit" class="bn54">
														<span class="bn54span">Submit</span>
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('include/footer.php'); ?>
	</div>

	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});

		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
		});

		$('#timepicker1').timepicker();
	</script>
</body>

</html>