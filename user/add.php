<?php

include "./../connection.php";

$user_name = $_POST["username"];
$user_password = $_POST["password"];

$sql = "INSERT INTO users (username, password) VALUES ('$user_name', '$user_password')";
$result = $conn->query($sql);

echo json_encode([
    "state" => "success",
    "message" => "New user added! with id $conn->insert_id"
]);

$conn->close(); // menutup koneksi database
