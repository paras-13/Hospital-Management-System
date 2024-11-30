<?php
session_start();
error_reporting(0);
include('include/config.php');
$upi;
if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['cancel'])) {
        mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
        $_SESSION['msg'] = "Your appointment canceled !!";
    }
}
?>

<!DOCTYPE html>
<html lang="en" ng-app="calcApp">

<head>
    <title>User | Appointment History</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body ng-controller="calcCntrl">
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <main class="print-content">
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">User | Appointment Receipt</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><span>User </span></li>
                                    <li class="active"><span>Appointment Receipt</span></li>
                                </ol>
                            </div>
                        </section>
                        <div class="container-fluid container-fullw bg-white">
                            <div class="payment-gateway">

                                <!-- Header Section -->
                                <header class="payment-header">
                                    <h1>Payment Gateway</h1>
                                </header>

                                <!-- User Information -->
                                <section class="payment-user-info">
                                    <h2>Your Information</h2>
                                    <div class="payment-info">
                                        <?php
                                        $id = $_SESSION['id'];
                                        $sql = "SELECT fullName, email, address, city FROM users WHERE id = $id";
                                        $res = mysqli_query($con, $sql);
                                        if ($res) {
                                            $data = mysqli_fetch_array($res);
                                            $name = $data['fullName'];
                                            $email = $data['email'];
                                            $address = $data['address'];
                                            $city = $data['city'];
                                            echo "<p><strong>Name:</strong> $name</p>";
                                            echo "<p><strong>Email:</strong> $email</p>";
                                            echo "<p><strong>Address:</strong> $address</p>";
                                            echo "<p><strong>City:</strong> $city</p>";
                                            echo "<p><strong>Phone:</strong> +91 9876543210</p>";
                                        }
                                        ?>
                                    </div>
                                </section>

                                <!-- Payment Options -->
                                <section class="payment-options">
                                    <h2>Select Payment Method</h2>

                                    <div class="payment-option">
                                        <div class="payment-upi">
                                            <h3>Pay with UPI</h3>
                                            <p>Pay instantly via UPI for faster processing.</p>
                                            <button class="payment-button"><a href="make-payment.php" style="color:white">Proceed with UPI</a></button>
                                        </div>
                                    </div>

                                    <div class="payment-option">
                                        <div class="payment-cod">
                                            <h3>Cash on Delivery (COD)</h3>
                                            <p>Choose to pay when the product arrives at your doorstep.</p>
                                            <button class="payment-button"><a href="payment-receipt.php" style="color:white">Proceed with COD</a></button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>