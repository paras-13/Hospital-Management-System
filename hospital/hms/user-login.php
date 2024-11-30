<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $puname = $_POST['username'];
    $ppwd = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $pid = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        // For storing log if user login successful
        $log = mysqli_query($con, "insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
        header("location:dashboard.php");
    } else {
        // For storing log if user login unsuccessful
        $_SESSION['login'] = $_POST['username'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        mysqli_query($con, "insert into userlog(username,userip,status) values('$puname','$uip','$status')");
        $_SESSION['errmsg'] = "Invalid username or password";
        // header("location:user-login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>

    <!-- External CSS Links -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/login.css"> <!-- Custom CSS for login page -->
</head>

<body class="user-login-body">
    <div class="user-login-container">
        <div class="user-login-box">
            <div class="user-login-logo">
                <h2>Smart Health | Patient Login</h2>
            </div>

            <div class="user-login-form-box">
                <form class="user-login-form" method="post">
                    <fieldset>
                        <legend>Sign in to your account</legend>
                        <p>
                            Please enter your name and password to log in.<br />
                            <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                        </p>
                        <div class="user-login-form-group">
                            <input type="text" class="user-login-input" name="username" placeholder="Username">
                        </div>
                        <div class="user-login-form-group">
                            <input type="password" class="user-login-input" name="password" placeholder="Password">
                        </div>
                        <div class="user-login-form-actions">
                            <button type="submit" class="user-login-btn" name="submit">
                                Login <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        <div class="user-login-new-account">
                            Don't have an account yet? <a href="registration.php">Create an account</a>
                        </div>
                        <div class="user-login-forgot-password">
                            <a href="forgot-password.php">Forgot Password ?</a>
                        </div>
                    </fieldset>
                </form>

                <div class="user-login-copyright">
                    <span class="text-bold text-uppercase">Smart Health</span>.
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>