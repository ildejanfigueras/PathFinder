<?php
    include 'connect.php';
    
    if (!$connection) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    
    // Updated to use the 'users' table
    $query = 'SELECT * FROM users';
    $resultset = mysqli_query($connection, $query);
?>