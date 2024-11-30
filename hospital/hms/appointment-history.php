<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_GET['cancel'])) {
		mysqli_query($con, "UPDATE appointment SET userStatus='0' WHERE id = '" . $_GET['id'] . "'");
		$_SESSION['msg'] = "Your appointment canceled !!";
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>User | Appointment History</title>
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/styles.css">
	</head>

	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">
				<?php include('include/header.php'); ?>

				<div class="main-content">
					<div class="container" id="container">
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User | Appointment History</h1>
								</div>
								<ol class="breadcrumb">
									<li><span>User</span></li>
									<li class="active"><span>Appointment History</span></li>
								</ol>
							</div>
						</section>

						<div class="container-fluid bg-white">
							<div class="row">
								<div class="col-md-12">
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
										<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>

									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Doctor Name</th>
												<th>Specialization</th>
												<th>Consultancy Fee</th>
												<th>Appointment Date / Time</th>
												<th>Appointment Creation Date</th>
												<th>Current Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = mysqli_query($con, "SELECT doctors.doctorName AS docname, appointment.* FROM appointment JOIN doctors ON doctors.id = appointment.doctorId WHERE appointment.userId='" . $_SESSION['id'] . "'");
											$cnt = 1;
											while ($row = mysqli_fetch_array($sql)) {
											?>
												<tr>
													<td class="center"><?php echo $cnt; ?>.</td>
													<td class="hidden-xs"><?php echo $row['docname']; ?></td>
													<td><?php echo $row['doctorSpecialization']; ?></td>
													<td><?php echo $row['consultancyFees']; ?></td>
													<td><?php echo $row['appointmentDate']; ?> / <?php echo $row['appointmentTime']; ?></td>
													<td><?php echo $row['postingDate']; ?></td>
													<td>
														<?php
														if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
															echo "Active";
														} elseif (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
															echo "Cancelled by You";
														} elseif (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
															echo "Cancelled by Doctor";
														}
														?>
													</td>
													<td>
														<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
															<a href="appointment-history.php?id=<?php echo $row['id']; ?>&cancel=update"
																onclick="return confirm('Are you sure you want to cancel this appointment?')"
																class="btn btn-danger btn-xs">Cancel</a>
														<?php } else {
															echo "Cancelled";
														} ?>
													</td>
												</tr>
											<?php
												$cnt = $cnt + 1;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<?php include('include/footer.php'); ?>
		</div>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>