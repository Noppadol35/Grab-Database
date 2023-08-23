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

$sql = "SELECT type_ID FROM food_type";



// Retrieve the data sent from the client-side
$id = mysqli_real_escape_string($conn, $_POST['id']);
$type = mysqli_real_escape_string($conn, $_POST['type']);

// Prepare the SQL statement to insert the data into the database
$stmt = $conn->prepare("UPDATE food_type SET type_name=? WHERE type_ID=?");
$stmt->bind_param("ss",$type, $id);
$stmt->execute();
// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    echo 'Data inserted successfully';
} else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>