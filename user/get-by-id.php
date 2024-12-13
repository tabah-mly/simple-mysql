<?php

include "./../connection.php";

$user_id = $_POST["id"];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => "failed",
        "msg" => "User with id $user_id not found!"
    ]);
    return;
}

$user = $result->fetch_assoc();

echo json_encode([
    "status" => "success",
    "datas" => $user
]);

$conn->close(); // menutup koneksi database
