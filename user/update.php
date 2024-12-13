<?php

include "./../connection.php";

$user_id = $_POST["id"];
$user_name = $_POST["username"];
$user_password = $_POST["password"];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => "failed",
        "msg" => "User with id $user_id not found!"
    ]);
    return;
}

$sql = "UPDATE users SET username='$user_name', password='$user_password' WHERE id='$user_id'";
$result = $conn->query($sql);

if ($conn->affected_rows > 0) {
    echo json_encode([
        "status" => "success",
        "msg" => "Update user with id $user_id success!"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "msg" => "Update user with id $user_id failed!"
    ]);
}

$conn->close(); // menutup koneksi database
