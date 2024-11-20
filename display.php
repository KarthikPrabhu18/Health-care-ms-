<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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

    </style>
</head>
<body>
<nav class="navbar">
        <div class="container">
            <div class="logo">Healthcare Management System</div>
            <ul class="nav-links">
                <li><a href="dmsproject.php">Home</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <h1 style="text-decoration:none; text-align:center;">Bar Plot of Patients by Injury Intensity</h1>
    <div style="display:flex;align-items:center;justify-content:center;">
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    </div>
    <?php
$servername = "localhost";
$dbname = "hospital";
$username = "root";
$password = "nnm22is086";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for critical patients
$criticalQuery = "SELECT COUNT(*) AS count FROM patients_critical";
$criticalResult = $conn->query($criticalQuery);

// Check if query executed successfully
if ($criticalResult === false) {
    die("Error fetching data from patients_critical: " . $conn->error);
}

$criticalCount = (int) $criticalResult->fetch_assoc()['count'];

// Fetch data for less injury patients
$lessInjuryQuery = "SELECT COUNT(*) AS count FROM patients_less_injury";
$lessInjuryResult = $conn->query($lessInjuryQuery);

// Check if query executed successfully
if ($lessInjuryResult === false) {
    die("Error fetching data from patients_less_injury: " . $conn->error);
}

$lessInjuryCount = (int) $lessInjuryResult->fetch_assoc()['count'];

// Close connection
$conn->close();

// Prepare data for chart
$data = array(
    'labels' => ['Critical', 'Less Injury'],
    'values' => [$criticalCount, $lessInjuryCount],
    'colors' => ['red', 'green']
);
?>


    <script>
        var data = <?php echo json_encode($data); ?>;

        var xValues = data.labels;
        var yValues = data.values;
        var barColors = data.colors;

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Number of Patients',
                    data: yValues,
                    backgroundColor: barColors
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Patient Data'
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
