<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['id']) == 0) {
	header('location:logout.php');
} else {
	if (isset($_GET['cancel'])) {
		mysqli_query($con, "UPDATE appointment SET doctorStatus='0' WHERE id='" . $_GET['id'] . "'");
		$_SESSION['msg'] = "Appointment canceled!";
	}

	if (isset($_GET['updatePayment']) && $_GET['updatePayment'] == 'success') {
		$appointmentId = $_GET['id'];
		$updateQuery = "UPDATE appointment SET paymentstatus='Success' WHERE id='$appointmentId'";
		if (mysqli_query($con, $updateQuery)) {
			$_SESSION['msg'] = "Payment status updated successfully!";
		} else {
			$_SESSION['msg'] = "Failed to update payment status.";
		}
		header("Location: appointment-history.php");
		exit();
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | Appointment History</title>
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
					<div class="container">
						<h1>Doctor | Appointment History</h1>
						<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);
												$_SESSION['msg'] = ""; ?></p>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Patient Name</th>
									<th>Specialization</th>
									<th>Fee</th>
									<th>Date / Time</th>
									<th>Created On</th>
									<th>Status</th>
									<th>Payment</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = mysqli_query($con, "SELECT users.fullName as fname, appointment.* FROM appointment JOIN users ON users.id=appointment.userId WHERE appointment.doctorId='" . $_SESSION['id'] . "'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($sql)) {
								?>
									<tr>
										<td><?php echo $cnt++; ?></td>
										<td><?php echo $row['fname']; ?></td>
										<td><?php echo $row['doctorSpecialization']; ?></td>
										<td><?php echo $row['consultancyFees']; ?></td>
										<td><?php echo $row['appointmentDate'] . " / " . $row['appointmentTime']; ?></td>
										<td><?php echo $row['postingDate']; ?></td>
										<td>
											<?php
											if ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) {
												echo "Active";
											} elseif ($row['userStatus'] == 0 && $row['doctorStatus'] == 1) {
												echo "Cancelled by Patient";
											} elseif ($row['userStatus'] == 1 && $row['doctorStatus'] == 0) {
												echo "Cancelled by Doctor";
											}
											?>
										</td>
										<td>
											<?php echo $row['paymentstatus']; ?>
											<?php if ($row['paymentstatus'] == 'Pending') { ?>
												<a href="appointment-history.php?id=<?php echo $row['id']; ?>&updatePayment=success" class="btn btn-success btn-sm" onclick="return confirm('Mark as paid?')">Mark as Paid</a>
											<?php } ?>
										</td>
										<td>
											<?php if ($row['userStatus'] == 1 && $row['doctorStatus'] == 1) { ?>
												<a href="appointment-history.php?id=<?php echo $row['id']; ?>&cancel=update" class="btn btn-danger btn-sm" onclick="return confirm('Cancel this appointment?')">Cancel</a>
											<?php } else {
												echo "Cancelled";
											} ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>