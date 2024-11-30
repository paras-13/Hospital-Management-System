<?php
session_start();
include("include/config.php");

$sql = "SELECT id, patient_name, patient_contact, pickup_address, destination_address, pickup_time, emergency_type, ambulance_type, status 
        FROM ambulancebook WHERE status = 'Pending'";
$res = mysqli_query($con, $sql);

if (!$res) {
    die("Database query failed: " . mysqli_error($con));
}

if (isset($_GET['id'])) {
    // Capture the id of the request and update the status
    $requestId = $_GET['id'];
    $updateSql = "UPDATE ambulancebook SET status = 'Success' WHERE id = $requestId";
    $updateRes = mysqli_query($con, $updateSql);

    if ($updateRes) {
        // Redirect to the same page without the 'id' parameter to prevent reload loop
        echo "<script>
                alert('Ambulance request approved successfully!');
                window.location.href = window.location.href.split('?')[0]; // Remove the 'id' from URL
              </script>";
    } else {
        echo "<script>alert('Failed to update status. Please try again later.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Manage Ambulance</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" href="assets/css/admin-ambulance.css"> <!-- Custom CSS File -->
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
                                <h1 class="mainTitle">Admin | Manage Ambulance</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Manage Ambulance</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="admin-ambulance-container">
                                    <h4>Ambulance Booking Requests</h4>

                                    <table class="admin-ambulance-table">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Contact</th>
                                                <th>Pickup Address</th>
                                                <th>Destination Address</th>
                                                <th>Pickup Time</th>
                                                <th>Emergency Type</th>
                                                <th>Ambulance Type</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($res) > 0) {
                                                while ($row = mysqli_fetch_array($res)) {
                                                    echo "<tr>
                                                            <td>{$row['patient_name']}</td>
                                                            <td>{$row['patient_contact']}</td>
                                                            <td>{$row['pickup_address']}</td>
                                                            <td>{$row['destination_address']}</td>
                                                            <td>{$row['pickup_time']}</td>
                                                            <td>{$row['emergency_type']}</td>
                                                            <td>{$row['ambulance_type']}</td>
                                                            <td>{$row['status']}</td>
                                                            <td>
                                                                <a href='?id={$row['id']}' class='admin-btn-confirm'>Provide Ambulance</a>
                                                            </td>
                                                          </tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='9'>No Pending Requests</td></tr>";
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
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>

</html>