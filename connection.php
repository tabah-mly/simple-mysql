<?php

include "config.php";

if ($SHOW_ERROR) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

if ($JSON_CODE) {
    header("Content-Type: application/json");
}

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
