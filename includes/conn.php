<?php

// Create a MySQL connection
$conn = mysqli_connect('localhost', 'root', '', 'urban_gents');

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>