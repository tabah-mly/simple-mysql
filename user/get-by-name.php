<?php

include "./../connection.php";

$username = $_POST["username"];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => "failed",
        "msg" => "User with username $username not found!"
    ]);
    return;
}

$user = $result->fetch_assoc();

echo json_encode([
    "status" => "success",
    "datas" => $user
]);

$conn->close(); // menutup koneksi database
