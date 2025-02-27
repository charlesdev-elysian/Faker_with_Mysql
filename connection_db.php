connection_db.php

<?php
$host = '127.0.0.1';
$dbname = 'demofaker';
$username = 'root';
$password = 'root';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>