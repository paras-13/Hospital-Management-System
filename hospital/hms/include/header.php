<?php error_reporting(0); ?>
<header class="navbar navbar-default navbar-static-top">
	<div class="navbar-collapse collapse" style="padding-right:30px;">
		<!-- Left section: Smart Health -->
		<div style="display:flex; justify-content:space-between;">
			<div class="left-section">
				<h2 style="padding-left:10px; font-weight:bold; font-family:serif;">Smart Health</h2>
			</div>
			<div class="dropdown current-user">
				<a href class="dropdown-toggle" data-toggle="dropdown">
					<img src="assets/images/logo.avif" height="100px">
					<span class="username">
						<?php
						$query = mysqli_query($con, "select fullName from users where id='" . $_SESSION['id'] . "'");
						$name;
						while ($row = mysqli_fetch_array($query)) {
							$name = $row['fullName'];
						}
						echo "<h4>$name</h4>";
						?>
						<i class="ti-angle-down"></i>
					</span>
				</a>
				<ul class="dropdown-menu dropdown-dark">
					<li><a href="edit-profile.php">My Profile</a></li>
					<li><a href="change-password.php">Change Password</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</div>
		</div>

	</div>
</header>