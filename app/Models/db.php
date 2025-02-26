<?php
declare(strict_types=1);

namespace App\Models;

use mysqli;

$servername = "database";
$username = "test";
$password = "test";
$dbname = "rest-api";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
