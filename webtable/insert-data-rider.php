<?php

// Set database credentials
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'grab';

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Retrieve the data sent from the client-side
$rider_email = mysqli_real_escape_string($conn, $_POST['email']);
$rider_name = mysqli_real_escape_string($conn, $_POST['name']);
$rider_surname = mysqli_real_escape_string($conn, $_POST['surname']);
$rider_birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
$rider_tel = mysqli_real_escape_string($conn, $_POST['tel']);
$rider_password = mysqli_real_escape_string($conn, $_POST['ppassword']);
$rider_salary = mysqli_real_escape_string($conn, $_POST['salary']);

// Prepare the SQL statement to insert the data into the database
$sql = "INSERT INTO rider (rider_email, rider_name, rider_surname, rider_birthdate, rider_tel, rider_password, rider_salary) VALUES ('$rider_email', '$rider_name', '$rider_surname', '$rider_birthdate', '$rider_tel', '$rider_password', '$rider_salary')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
