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

        /* Content Styles */
        .content {
            text-align: center;
            padding: 100px 0;
        }

        .content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container button {
            margin: 0 10px;
            padding: 15px 30px;
            background-color:blue; /* Button background color */
            color: white; /* Button text color */
            border: none;
            border-radius: 7px;
            font-size: 16px;
            font-weight: bold;
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

    <!-- Content -->
    <div class="content">
        <div class="container">
            <h1>Welcome to Healthcare Management System</h1>
            <div class="button-container">
                <!-- Insert Patient Button -->
                <button><a href="insert_patient.php" style="color: inherit; text-decoration: none;">Insert Patient</a></button>
                
                <!-- Display Report Button -->
                <button><a href="display.php" style="color: inherit; text-decoration: none;">Display Report</a></button>
            </div>
        </div>
    </div>
</body>
</html>
