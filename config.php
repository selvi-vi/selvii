<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "sistemperjalanan";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database gagal terkoneksi: " . $conn->connect_error);
}

?>