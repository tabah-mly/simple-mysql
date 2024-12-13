<?php

include "./../connection.php";

$sql = "SELECT * FROM users";   // select semua users
$result = $conn->query($sql);   // mengeksekusi query

$users = array();                           // membuat variable array baru yang nantinya akan digunakan untuk menampung data users
while ($row = $result->fetch_assoc()) {     // loop semua data yang didapat dari hasil query
    $users[] = $row;                        // menambahkan data user kedalam users
}

echo json_encode($users);       // menampilkan semua data user

$conn->close(); // menutup koneksi database