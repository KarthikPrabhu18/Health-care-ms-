<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Management System</title>
    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #007bff; /* Navbar background color */
            color: #fff; /* Text color for navbar links */
            padding: 10px 0;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: inline-block;
            margin-right: 20px;
        }

        .nav-links li:last-child {
            margin-right: 0;
        }

        .nav-links a {
            color: inherit;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            /* background-color: #fff; Button background color */
            border-radius: 5px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="logo">Healthcare Management System</div>
            <ul class="nav-links">
                <li><a href="dmsproject.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <?php
    $servername = "localhost";
    $database = "hospital";
    $username = "root";
    $password = "nnm22is086";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Validate form data
    if (empty($_POST['patient_name']) || empty($_POST['age']) || empty($_POST['gender']) || empty($_POST['address']) || empty($_POST['contact_number']) || empty($_POST['admission_date'])) {
        die("Error: All fields are required");
    }

    // Insert address into addresses table
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $postal_code = $_POST['postal_code'];

    $insert_address_query = "INSERT INTO addresses (address, city, state, country, postal_code) VALUES ('$address', '$city', '$state', '$country', '$postal_code')";
    if (mysqli_query($conn, $insert_address_query)) {
        $address_id = mysqli_insert_id($conn); // Get the auto-generated address_id
    } else {
        echo "Error inserting address: " . mysqli_error($conn);
        exit;
    }

    // Prepare and bind parameters for patients_critical table
    $stmt_critical = $conn->prepare("INSERT INTO patients_critical (patient_name, age, gender, address_id, contact_number, medical_condition, admission_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_critical->bind_param("sisssss", $patient_name, $age, $gender, $address_id, $contact_number, $medical_condition, $admission_date);

    // Prepare and bind parameters for patients_less_injury table
    $stmt_less_injury = $conn->prepare("INSERT INTO patients_less_injury (patient_name, age, gender, address_id, contact_number, medical_condition, admission_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_less_injury->bind_param("sisssss", $patient_name, $age, $gender, $address_id, $contact_number, $medical_condition, $admission_date);

    // Set parameters
    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $medical_condition = $_POST['medical_condition'];
    $admission_date = $_POST['admission_date'];

    // Determine which table to insert into based on medical condition
    if ($medical_condition === 'Critical') {
        if ($stmt_critical->execute()) {
            echo "<h2>New patient added to patients_critical successfully</h2>";
            // Fetch and display patients from patients_critical table
            $sql_critical = "SELECT * FROM patients_critical";
            $result_critical = $conn->query($sql_critical);
            if ($result_critical->num_rows > 0) {
                echo "<h3>Patients in Critical Condition:</h3>";
                echo "<table>";
                echo "<tr><th>Patient Name</th><th>Age</th><th>Gender</th></tr>";
                while($row = $result_critical->fetch_assoc()) {
                    echo "<tr><td>" . $row["patient_name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["gender"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No patients in critical condition.</p>";
            }
        } else {
            echo "Error: " . $stmt_critical . "<br>" . $conn->error;
        }
    } else {
        if ($stmt_less_injury->execute()) {
            echo "<h2>New patient added to patients_less_injury successfully</h2>";
            // Fetch and display patients from patients_less_injury table
            $sql_less_injury = "SELECT * FROM patients_less_injury";
            $result_less_injury = $conn->query($sql_less_injury);
            if ($result_less_injury->num_rows > 0) {
                echo "<h3>Patients with Less Injury:</h3>";
                echo "<table>";
                echo "<tr><th>Patient Name</th><th>Age</th><th>Gender</th></tr>";
                while($row = $result_less_injury->fetch_assoc()) {
                    echo "<tr><td>" . $row["patient_name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["gender"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No patients with less injury.</p>";
            }
        } else {
            echo "Error: " . $stmt_less_injury . "<br>" . $conn->error;
        }
    }

    // Close statements and connection
    $stmt_critical->close();
    $stmt_less_injury->close();
    $conn->close();
    ?>
</body>
</html>
