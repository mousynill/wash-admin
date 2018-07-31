<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "wash";

$conn = mysqli_connect($dbServername,$dbUsername,$dbpassword,$dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
