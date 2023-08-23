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
$sql = "SELECT * FROM food";

// Execute the query
$result = mysqli_query($conn, $sql);

// Create an array to store the food types
$food = array();


// Loop through the query results and add each food type to the array
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($food, array(
            'food_ID' => $row['food_ID'],
            'food_name' => $row['food_name']
            
        ));
    }
}

// Convert the array to JSON format and output it
echo json_encode($food);

// Close the database connection
mysqli_close($conn);

?>