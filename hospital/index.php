<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Your information succesfully submitted');</script>";
    echo "<script>window.location.href ='index.php'</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Hospital management System </title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Sedan:ital@0;1&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&family=Sedan:ital@0;1&family=Trade+Winds&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- ################# Header Starts Here#######################--->
    <header class="header-container">
        <div class="header-navbar">
            <div class="header-logo">
                <span>Smart Health</span>
            </div>
            <div class="header-nav-links">
                <ul>
                    <a href="#">Home</a>
                    <a href="#services">Services</a>
                    <a href="#logins">Login</a>
                    <a href="#contact_us">Contact</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#about_us">About Us</a>
                </ul>
            </div>
            <div class="header-buttons">
                <button class="header-appointment-btn">
                    <a href="hms/user-login.php">Book Appointment</a>
                </button>
                <button class="header-ambulance-btn">
                    <a href="book-ambulance.php">Book Ambulance</a>
                </button>
            </div>
        </div>
    </header>

    <!-- ################# Slider Starts Here#######################--->
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="assets/images/slider/h1.jpg" alt="image1" class="slider-fade">
            </div>

            <div class="item slider-fade">
                <img src="assets/images/slider/h2.jpg" alt="image3">
            </div>
            <div class="item slider-fade">
                <img src="assets/images/slider/h3.png" alt="image3">
            </div>

            <div class="item slider-fade">
                <img src="assets/images/slider/h5.jpg" alt="image5">
            </div>
            <div class="item ">
                <img src="assets/images/slider/h6.jpg" alt="image2" class="slider-fade">
            </div>
            <div class="item slider-fade">
                <img src="assets/images/slider/h7.jpg" alt="image5">
            </div>
        </div>
        <!--button prev and next-->
        <div class="buttons">
            <button id="prev"></button>
            <button id="next">></button>
        </div>
        <!--Dots (if 5 items => 5 dots)-->
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <!--  ************************* Logins ************************** -->

    <section id="logins" class="our-blog container-fluid">
        <div class="container-box">
            <div class="inner-title">
                <h2 style="font-size: 38px; text-align: center; margin-bottom: 20px;" class="head"><b>Login Here</b></h2>
            </div>
            <div class="d-flex justify-content-between">
                <div class="border border-light rounded">
                    <div>
                        <img src="assets/images/patient-login.avif" height="200px" alt="">
                    </div>
                    <div class="pt-2">
                        <h4 class="text-center py-2">Patinet Login</h4>
                        <a href="hms/user-login.php" target="_blank">
                            <button class="btn btn-outline-primary w-100">Click Here</button>
                        </a>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="assets/images/doctor-login.webp" alt="" height="200px;">
                    </div>
                    <div class="pt-2">
                        <h4 class="text-center py-2">Doctor Login</h4>
                        <a href="hms/doctor" target="_blank">
                            <button class="btn btn-outline-primary w-100">Click Here</button>
                        </a>
                    </div>
                </div>
                <div>
                    <div>
                        <img src="assets/images/admin-login.png" height="200px" alt=""><img src="" alt="">
                    </div>
                    <div>
                        <h4 class="text-center py-2">Admin Login</h4>
                        <a href="hms/admin" target="_blank">
                            <button class="btn btn-outline-primary w-100">Click Here</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- **************************Patient Care Services************************** -->
    <section style="margin-top:150px; margin-bottom:100px;" id="services">
        <div class="container">
            <h4 class="head text-center">Our Patient Care Services</h4>
            <div class="d-flex justify-content-between my-4">
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab3fcc16e079504622.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>24x7 Ambulance Pick-up</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab9854d09730002152.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>Treatment Package</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aabac8a4c5928399197.png" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>In-house Parking Facility</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab5eb78fa757475135.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>Café, Lounge & Food Court</p>
                </div>

            </div>
            <div class="d-flex justify-content-between my-4">
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aaba561a8a880060267.png" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>24X7 Canteen Services</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab8c2f1c5808661539.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>Taxi Shuttle Services</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab74c1089220941509.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>Internet/Wi-Fi facility</p>
                </div>
                <div class="p-2">
                    <div class="p-4 patient-care-services">
                        <img src="https://www.capitolhospital.com/images/misc_images/660aab4e9c49c520739665.webp" style="margin-left:40px;" alt="" width="60" height="60">
                    </div>
                    <p>24x7 pharmacy</p>
                </div>
            </div>
        </div>
    </section>

    <!-- #########################  Banner ##########################-->
    <section>
        <div class="container mt-5">
            <div class=banner>
                <img src="assets/images/banner.webp" alt="">
                <div class="col-sm-2 d-none d-lg-block appoint" style="margin-left:800px;">
                    <a class="btn btn-primary rounded-pill" href="hms/user-login.php">Book an Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <!--  ************************* About Us Starts Here ************************** -->

    <section style="margin-top:150px;" id="about_us">
        <div class="about-us">
            <h3 class="head text-center">About Our Hospital</h3>
            <div class="d-flex justify-center p-4">
                <div class="w-50 p-4">
                    <img src="assets/images/about_us.png" alt="">
                </div>
                <div class="w-50 p-4">
                    <p>
                        <span>1. </span>The Hospital Management System (HMS) is designed for Any Hospital to replace their existing manual, paper based system.
                        The new system is to control the following information; patient information, room availability, staff and operating room schedules, and patient invoices.<br>
                        <br><span>2. </span>These services are to be provided in an efficient, cost effective manner, with the goal of reducing the time and resources currently required for such tasks.
                        A significant part of the operation of any hospital involves the acquisition, management and timely retrieval of great volumes of information.<br>
                        <br><span>3. </span>This information typically involves; patient personal information and medical history, staff information, room and ward scheduling, staff scheduling, operating theater scheduling and various facilities waiting lists.<br>
                        <br><span>4. </span>All of this information must be managed in an efficient and cost wise fashion so that an institution's resources may be effectively utilized HMS will automate the management of the hospital making it more efficient and error free.
                        It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies.&nbsp;
                    </p>
                    <div class="mt-4 pt-4">
                        <h4>Our Vision</h4>
                        <p>Daily, we set new goals to achieve for ourselves and will continue to do so to match up to the image we have in people’s hearts. Our most prized reward is the smile we see when our patient walks out in a healthy state of body and mind.</p>
                    </div>
                    <div class="mt-4 pt-4">
                        <h4>Our Aim</h4>
                        <p>To be pioneer institute in the area for providing specialized healthcare</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between w-75" style="margin-left:160px;">
                <div class="w-25 p-4 rounded" style="background-color:#0a62b9; color:white">
                    <h4>Our Vision</h4>
                    <p>To be leading and preferred Healthcare provider in the region</p>
                </div>
                <div class="w-25 p-4 rounded" style="background-color:#0a62b9; color:white">
                    <h4>Our Mission</h4>
                    <p>To provide state of the art, compassionate and personalized health care services maintaining the quality and safety at par with the international standards.</p>
                </div>
                <div class="w-25 p-4 rounded" style="background-color:#0a62b9; color:white">
                    <h4>Quality Policy</h4>
                    <p>We are committed to render quality services in healthcare by continuously upgrading our process, skills and resources for the safety and satisfaction of the patient.</p>
                </div>

            </div>
        </div>
    </section>



    <!-- ################# Our Departments Starts Here#######################--->

    <section class="key-features department">
        <div class="container">
            <div class="inner-title">
                <h2 class="head">Our Key Features</h2>
                <p>Explore some of our key features below</p>
            </div>

            <div class="row">
                <!-- Existing key features -->
                <div class="col-lg-4 col-md-6 feature-div">
                    <div class="single-key">
                        <i class="fas fa-heart"></i>
                        <h5>Cardiology</h5>
                        <p>Specialized care for heart-related issues.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-bone"></i>
                        <h5>Orthopaedic</h5>
                        <p>Comprehensive orthopedic services for bone health.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-brain"></i>
                        <h5>Neurology</h5>
                        <p>Expert care for neurological disorders.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-pills"></i>
                        <h5>Pharma Pipeline</h5>
                        <p>Innovative pharmaceutical developments.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-user-md"></i>
                        <h5>Pharma Team</h5>
                        <p>Collaborative team dedicated to pharmaceutical advancements.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-medkit"></i>
                        <h5>High-Quality Treatments</h5>
                        <p>Providing top-notch medical treatments for your well-being.</p>
                    </div>
                </div>

                <!-- Additional key features -->
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-dna"></i>
                        <h5>Genetics</h5>
                        <p>Exploring genetic solutions for personalized healthcare.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-tooth"></i>
                        <h5>Dentistry</h5>
                        <p>Comprehensive dental care for a healthy smile.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-microscope"></i>
                        <h5>Research & Development</h5>
                        <p>Advancing healthcare through cutting-edge research.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  ************************* Gallery Starts Here ************************** -->

    <section>
        <div class="gallery-container" id="gallery">
            <h4 class="head text-center m-4">Image Gallery</h4>
            <div class="big-image" id="big-image" style="background-image: url(assets/images/g1.jpg);"></div>

            <div class="thumbnails">
                <input type="radio" checked="checked" name="select" id="img-tab-1">
                <label for="img-tab-1" style="background-image: url(assets/images/g1.jpg);"></label>

                <input type="radio" name="select" id="img-tab-2">
                <label for="img-tab-2" style="background-image: url(assets/images/g2.webp);"></label>

                <input type="radio" name="select" id="img-tab-3">
                <label for="img-tab-3" style="background-image: url(assets/images/g3.jpg);"></label>

                <input type="radio" name="select" id="img-tab-4">
                <label for="img-tab-4" style="background-image: url(assets/images/g4.jpg);"></label>

                <input type="radio" name="select" id="img-tab-5">
                <label for="img-tab-5" style="background-image: url(assets/images/g5.jpg);"></label>

                <input type="radio" name="select" id="img-tab-6">
                <label for="img-tab-6" style="background-image: url(assets/images/g6.jpg);"></label>

                <input type="radio" name="select" id="img-tab-7">
                <label for="img-tab-7" style="background-image: url(assets/images/g7.jpg);"></label>

                <input type="radio" name="select" id="img-tab-8">
                <label for="img-tab-8" style="background-image: url(assets/images/g8.webp);"></label>
            </div>
        </div>
    </section>




    <!-- ######## Gallery End ####### -->


    <!--  ************************* Contact Us Starts Here ************************** -->
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">


    <?php include("hms/include/contact.php") ?>
    <!-- <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">
            <div class="col-sm-12 cop-ck">
                <form method="post" id="contactForm">
                    <h2>Contact Form</h2>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label for="fullname">Enter Name:</label></div>
                        <div class="col-sm-8"><input type="text" id="fullname" placeholder="Enter Name" name="fullname" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label for="emailid">Email Address:</label></div>
                        <div class="col-sm-8"><input type="email" id="emailid" name="emailid" placeholder="Enter Email Address" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label for="mobileno">Mobile Number:</label></div>
                        <div class="col-sm-8"><input type="tel" id="mobileno" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required></div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label for="description">Enter Message:</label></div>
                        <div class="col-sm-8">
                            <textarea rows="5" id="description" placeholder="Enter Your Message" class="form-control input-sm" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="row cf-ro">
                        <div class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> -->

    <!-- ################# Footer Starts Here#######################--->


    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 ">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016 </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fa fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>+91 1234567890</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>contact@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-1">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="Assets/images/ico2.png" class="img-fluid w-25 rounded-circle" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                </p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <ul class="social_icon">
                                    <li><a href="#"><i class=" fa-brands fa-facebook "></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Our Gallery</a></li>
                                <li><a href="#">Selection Process</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Sponsorship</a></li>
                                <li><a href="#">Our Policies</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="/contact">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don't miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2024, All Right Reserved <a href="#"></a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copy" style="text-align: right; font-family: 'Times New Roman', Times, serif;">
        <div class="container">
            <b> Hospital Management System | It's Me </b>
        </div>
    </div>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/slider.js"></script>
<script src="assets/js/gallery.js"></script>

</html>