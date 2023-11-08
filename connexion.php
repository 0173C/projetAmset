<?php
header('content-type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die('<a id="error">"Connection failed: "' . $conn->connect_error . '</a>');
}
?>