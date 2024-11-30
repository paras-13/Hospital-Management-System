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
    <title>Users | Payment Receipt</title>
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
                                <h1 class="mainTitle">Users | Payment Receipt</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Users</span></li>
                                <li class="active"><span>View Payment Receipt</span></li>
                            </ol>
                        </div>
                    </section>

                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">View <span class="text-bold">Payment Receipt</span></h5>

                                <?php
                                $uid = $_SESSION['id'];
                                $sql1 = mysqli_query($con, "SELECT * FROM appointment WHERE paymentstatus = 'pending' AND userId = $uid LIMIT 1");
                                if ($res1 = mysqli_fetch_array($sql1)) {
                                    $did = $res1['doctorId'];
                                    $sql2 = mysqli_query($con, "SELECT doctorName, docFees FROM doctors WHERE id = $did");
                                    $sql3 = mysqli_query($con, "SELECT fullName FROM users WHERE id = $uid");

                                    if ($sql2 && $sql3) {
                                        $res2 = mysqli_fetch_array($sql2);
                                        $res3 = mysqli_fetch_array($sql3);

                                        $pName = $res3['fullName'];
                                        $dName = $res2['doctorName'];
                                        $spec = $res1['doctorSpecialization'];
                                        $fees = $res2['docFees'];
                                        $date = $res1['appointmentDate'];
                                    }
                                ?>
                                    <!-- UPI Payment Gateway -->
                                    <div class="upi-container">
                                        <div class="upi-header">
                                            UPI Payment Gateway
                                        </div>
                                        <div class="upi-body">
                                            <div class="upi-detail-row">
                                                <span>Patient Name:</span>
                                                <span id="patientName"><?php echo $pName; ?></span>
                                            </div>
                                            <div class="upi-detail-row">
                                                <span>Doctor Name:</span>
                                                <span id="doctorName"><?php echo $dName; ?></span>
                                            </div>
                                            <div class="upi-detail-row">
                                                <span>Specialization:</span>
                                                <span id="specialization"><?php echo $spec; ?></span>
                                            </div>
                                            <div class="upi-detail-row">
                                                <span>Fees:</span>
                                                <span id="fees">₹<?php echo $fees; ?></span>
                                            </div>
                                            <div class="upi-detail-row">
                                                <span>Appointment Date:</span>
                                                <span id="appointmentDate"><?php echo $date; ?></span>
                                            </div>

                                            <label for="upiId">Enter UPI ID:</label>
                                            <input type="text" id="upiId" class="upi-input" placeholder="e.g., user@upi" />

                                            <div class="upi-payment-row">
                                                <div class="upi-qr-code">
                                                    <i class="fa fa-qrcode fa-3x"></i>
                                                    <div>Scan QR</div>
                                                </div>
                                                <button class="upi-button" id="payButton">Pay Now</button>
                                            </div>
                                            <div id="loadingOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); color: white; text-align: center; z-index: 1000;">
                                                <div style="margin-top: 20%; font-size: 24px;">
                                                    Processing Payment...
                                                    <br />
                                                    <i class="fa fa-spinner fa-spin" style="font-size: 36px; margin-top: 20px;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="upi-footer">
                                            <i class="fa fa-lock"></i> Secure and encrypted payment
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo "<p>No pending payments found.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>

    <script>
        document.getElementById("payButton").addEventListener("click", function() {
            <?php
            mysqli_query($con, "UPDATE appointment SET paymentstatus='success'");
            ?>
            document.getElementById("loadingOverlay").style.display = "block";
            setTimeout(function() {
                window.location.href = "payment-receipt.php"; // Replace with your target file
            }, 3000);
        });
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>