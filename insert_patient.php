<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS for healthcare management hospital form */

/* Form container */
h2{
    text-align: center;
}
form {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

/* Form labels */
label {
  font-weight: bold;
}

/* Form inputs */
input[type="text"],
input[type="number"],
select,
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Form select */
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="%23000000" d="M5.8 7.4l4.5 4.5 4.5-4.5h-9zm0 5.7l4.5 4.5 4.5-4.5h-9z"/></svg>');
  background-repeat: no-repeat;
  background-position-x: 95%;
  background-position-y: 50%;
  background-size: 15px;
}

/* Form submit button */
input[type="submit"] {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

    </style>
    <title>Add Patient</title>
</head>
<body>
    <h2>Add Patient</h2>
    <form method="post" action="insert.php">
        <label for="patient_name">Patient Name:</label><br>
        <input type="text" id="patient_name" name="patient_name" required><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br>
        <label for="contact_number">Contact Number:</label><br>
        <input type="text" id="contact_number" name="contact_number" required><br>
        <label for="medical_condition">Medical Condition:</label><br>
        <select name="medical_condition" id="medical_condition">
            <option value="Critical">Critical</option>
            <option value="NotCritical">NotCritical</option>
        </select><br>
        <label for="admission_date">Admission Date:</label><br>
        <input type="date" id="admission_date" name="admission_date" required><br><br>
        <label for="city">City:</label><br>
<input type="text" id="city" name="city" required><br>
<label for="state">State:</label><br>
<input type="text" id="state" name="state" required><br>
<label for="country">Country:</label><br>
<input type="text" id="country" name="country" required><br>
<label for="postal_code">Postal Code:</label><br>
<input type="text" id="postal_code" name="postal_code" required><br>
        <input type="submit" value="Add Patient">
    </form>
</body>
</html>
