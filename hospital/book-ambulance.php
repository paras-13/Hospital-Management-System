<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Ambulance</title>
    <link rel="stylesheet" href="assets/css/ambulance.css">
</head>

<body>

    <div class="container">
        <h1>Book an Ambulance</h1>

        <div class="emergency-contact">
            <p>If it's an emergency, call our ambulance service immediately at:</p>
            <h2 class="emergency-number">012345-012345</h2>
            <p class="emergency-description">Our ambulance services are available 24/7 to provide timely assistance in case of any medical emergency. Please call us for urgent medical transportation.</p>
        </div>

        <form method="POST" class="ambulance-form">
            <h3>Fill in the details to book an ambulance:</h3>

            <!-- Patient's Name -->
            <label for="patient-name">Patient's Name:</label>
            <input type="text" id="patient-name" name="patient_name" required>

            <!-- Patient's Contact -->
            <label for="patient-contact">Patient's Contact Number:</label>
            <input type="tel" id="patient-contact" name="patient_contact" required>

            <!-- Pickup Address -->
            <label for="pickup-address">Pickup Address:</label>
            <textarea id="pickup-address" name="pickup_address" rows="4" required></textarea>

            <!-- Destination Address -->
            <label for="destination-address">Destination Address:</label>
            <textarea id="destination-address" name="destination_address" rows="4" required></textarea>

            <!-- Pickup Time -->
            <label for="pickup-time">Pickup Time:</label>
            <input type="datetime-local" id="pickup-time" name="pickup_time" required>

            <!-- Type of Emergency -->
            <label for="emergency-type">Type of Emergency:</label>
            <select id="emergency-type" name="emergency_type">
                <option value="accident">Accident</option>
                <option value="heart_attack">Heart Attack</option>
                <option value="stroke">Stroke</option>
                <option value="other">Other</option>
            </select>

            <!-- Ambulance Type -->
            <label for="ambulance-type">Type of Ambulance:</label>
            <select id="ambulance-type" name="ambulance_type">
                <option value="standard">Standard Ambulance</option>
                <option value="icu">ICU Ambulance</option>
                <option value="neonatal">Neonatal Ambulance</option>
                <option value="others">Others</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Book Ambulance</button>
        </form>
    </div>
    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'hms');
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $patientName = $_POST['patient_name'];
            $patientContact = $_POST['patient_contact'];
            $pickupAddress = $_POST['pickup_address'];
            $destinationAddress = $_POST['destination_address'];
            $pickupTime = $_POST['pickup_time'];
            $emergencyType = $_POST['emergency_type'];
            $ambulanceType = $_POST['ambulance_type'];
            $sql = "INSERT INTO ambulancebook (patient_name, patient_contact, pickup_address, destination_address, pickup_time, ambulance_type, emergency_type)
            VALUES ('$patientName', '$patientContact', '$pickupAddress', '$destinationAddress', '$pickupTime', '$ambulanceType', '$emergencyType')";

            $query = mysqli_query($con, $sql);
            if ($query) {
                echo "<script>alert('Ambulance Successfully Booked. A call will come to you shortly.');</script>";
            }
        }
    }
    ?>

</body>

</html>