<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "admin_user";

$conn = new mysqli($servername, $username, $password,$DBname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}