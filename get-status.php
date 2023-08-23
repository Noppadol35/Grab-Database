<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grab";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get food types
$sql = "SELECT * FROM order_status";

// Execute the query
$result = mysqli_query($conn, $sql);

// Create an array to store the food types
$statusT = array();


// Loop through the query results and add each food type to the array
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($statusT, array(
            'order_status_ID' => $row['order_status_ID'],
            'status_name' => $row['status_name']
            
        ));
    }
}

// Convert the array to JSON format and output it
echo json_encode($statusT);

// Close the database connection
mysqli_close($conn);

?>