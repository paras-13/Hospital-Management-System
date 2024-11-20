<?php
include("./config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetching form data
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $contactno = $_POST['contact'];
    $message = $_POST['message'];

    // Inserting data into the database
    $query = "INSERT INTO tblcontactus (fullname, email, contactno, message) 
              VALUES ('$fullname', '$email', '$contactno', '$message')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Your message has been sent successfully.');</script>";
    } else {
        echo "<script>alert('Error: Could not submit your message.');</script>";
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>
    <div class="contact-container mb-5" id="contact_us">
        <div class="right-col">
            <h1>Contact us</h1>
            <p>Have questions about our hospital services or need assistance? Reach out to us for support, feedback, or inquiries. We're here to help you with your healthcare needs.</p>

            <form id="contact-form" method="post">
                <label for="name">Full name</label>
                <input type="text" id="name" name="name" placeholder="Your Full Name" required>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" required>
                <label for="contact">Contact No</label>
                <input type="number" id="contact" name="contact" placeholder="Please enter your mobile number" required>
                <label for="message">Message</label>
                <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
                <button type="submit" id="submit" name="submit">Send</button>
            </form>
        </div>
    </div>
</body>

</html>