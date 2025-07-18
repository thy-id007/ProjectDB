<?php
// FILE: db_config.php
// Contains all the details for connecting to the SQL Server database.

// --- IMPORTANT: REPLACE WITH YOUR DATABASE DETAILS ---
$serverName = "localhost"; // e.g., "localhost", "SERVER\SQLEXPRESS"
$connectionOptions = array(
    "Database" => "db_login",         // The database you created
    "Uid" => "YOUR_USERNAME",        // Your SQL Server username
    "PWD" => "YOUR_PASSWORD"         // Your SQL Server password
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if the connection was successful.
// If it fails, we stop the script and show an error.
if ($conn === false) {
    // Note: In a production environment, you would log this error
    // instead of showing it to the user for security reasons.
    die(print_r(sqlsrv_errors(), true));
}
?>
