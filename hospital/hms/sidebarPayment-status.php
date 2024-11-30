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

                                <table class="table table-hover" id="sample-table-1">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Specialization</th>
                                            <th>Consultancy Fee</th>
                                            <th>Appointment Date</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $uid = $_SESSION['id'];
                                        $sql1 = mysqli_query($con, "SELECT * FROM appointment WHERE  userId = $uid");
                                        $cnt = 1;
                                        if ($sql1) {

                                            while ($res1 = mysqli_fetch_array($sql1)) {
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
                                                    $status = $res1['paymentstatus'];
                                                    $userStatus = $res1['userStatus'];
                                                    $doctorStatus = $res1['doctorStatus'];
                                                    $finalStatus = $userStatus && $doctorStatus;
                                                    echo "<tr>";
                                                    echo "<td>$cnt</td>";
                                                    echo "<td>$pName</td>";
                                                    echo "<td>$dName</td>";
                                                    echo "<td>$spec</td>";
                                                    echo "<td>$fees</td>";
                                                    echo "<td>$date</td>";
                                                    if ($finalStatus) {
                                                        if ($status === 'pending')
                                                            echo "<td style='color:red'>$status</td>";
                                                        else
                                                            echo "<td style='color:green; font-weight:bold'>$status</td>";
                                                    } else {
                                                        if ($status === 'pending')
                                                            echo "<td style='color:red'>Appointment Cancelled</td>";
                                                        else
                                                            echo "<td style='color:green; font-weight:bold'>Amount Paid</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                $cnt++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <tr>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <button id="printButton" onclick="captureScreenshot()" ng-show="success" style="background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;">
                                            Print Payment Receipts
                                        </button>
                                    </td>
                                </tr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
        });

        function captureScreenshot() {
            // Select the area to capture
            const element = document.getElementById('container'); // Change 'container' to the ID of the area you want to capture

            html2canvas(element).then((canvas) => {
                // Convert the canvas to an image
                const imgData = canvas.toDataURL('image/png');

                // Create a download link for the image
                const link = document.createElement('a');
                link.href = imgData;
                link.download = 'screenshot.png'; // File name for the downloaded screenshot

                // Automatically click the download link
                link.click();
            }).catch((error) => {
                console.error('Screenshot capture failed:', error);
            });
        }
    </script>
</body>

</html>