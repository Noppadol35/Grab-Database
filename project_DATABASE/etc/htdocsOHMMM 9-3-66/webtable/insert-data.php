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
$cus_email = mysqli_real_escape_string($conn, $_POST['email']);
$cus_name = mysqli_real_escape_string($conn, $_POST['name']);
$cus_surname = mysqli_real_escape_string($conn, $_POST['surname']);
$cus_birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
$cus_tel = mysqli_real_escape_string($conn, $_POST['tel']);
$cus_password = mysqli_real_escape_string($conn, $_POST['ppassword']);
$cus_address = mysqli_real_escape_string($conn, $_POST['address']);

// Prepare the SQL statement to insert the data into the database
$sql = "INSERT INTO cus (cus_email, cus_name, cus_surname, cus_birthdate, cus_tel, cus_address, cus_password) VALUES ('$cus_email', '$cus_name', '$cus_surname', '$cus_birthdate', '$cus_tel', '$cus_address', '$cus_password')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>