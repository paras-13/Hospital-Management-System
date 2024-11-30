<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Reg Users | View Medical History</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,600,700|Raleway:300,400,600,700" rel="stylesheet" type="text/css" />
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
				<div class="wrap-content container" id="container">
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Users | Medical History</h1>
							</div>
							<ol class="breadcrumb">
								<li><span>Users</span></li>
								<li class="active"><span>View Medical History</span></li>
							</ol>
						</div>
					</section>

					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">View <span class="text-bold">Medical History</span></h5>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Patient Name</th>
											<th>Patient Contact Number</th>
											<th>Patient Gender</th>
											<th>Creation Date</th>
											<th>Updation Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$uid = $_SESSION['id'];
										$sql = mysqli_query($con, "SELECT tblpatient.* FROM tblpatient JOIN users ON users.email = tblpatient.PatientEmail WHERE users.id = '$uid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td><?php echo $row['PatientName']; ?></td>
												<td><?php echo $row['PatientContno']; ?></td>
												<td><?php echo $row['PatientGender']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
												<td><?php echo $row['UpdationDate']; ?></td>
												<td><a href="view-medhistory.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye"></i></a></td>
											</tr>
										<?php
											$cnt++;
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

	<?php include('include/footer.php'); ?>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
		});
	</script>
</body>

</html>