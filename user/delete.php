<?php

include "./../connection.php";

$user_id = $_POST["id"];

// cek apakah user ada pada database
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode([
        "status" => "failed",
        "msg" => "User with id $user_id not found!"
    ]);
    return;
}

// delete user dengan id
$sql = "DELETE FROM users WHERE id='$user_id'";
$result = $conn->query($sql);

if ($conn->affected_rows > 0) {
    echo json_encode([
        "status" => "success",
        "msg" => "Delete user with id $user_id success!"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "msg" => "Delete user with id $user_id failed!"
    ]);
}

$conn->close(); // menutup koneksi database
