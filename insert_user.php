<?php
header("Content-Type: application/json");
include 'db_config.php';

// Mendapatkan data yang dikirim dari klien
$data = json_decode(file_get_contents("php://input"));

// Validasi data yang diterima
if (!isset($data->name) || !isset($data->email) || !isset($data->ttl) || !isset($data->alamat)|| !isset($data->zodiac)|| !isset($data->jk)) {
 die(json_encode(["error" => "Invalid input"]));
}

$name = $koneksi->real_escape_string($data->name);
$email = $koneksi->real_escape_string($data->email);
$ttl = $koneksi->real_escape_string($data->ttl);
$alamat = $koneksi->real_escape_string($data->alamat);
$zodiac = $koneksi->real_escape_string($data->zodiac);
$jk = $koneksi->real_escape_string($data->jk);



$sql = "INSERT INTO users (name, email, ttl, alamat, zodiac, jk) VALUES ('$name','$email','$ttl','$alamat','$zodiac','$jk')";
if ($koneksi->query($sql) === TRUE) {
 echo json_encode(["success" => true]);
} else {
 echo json_encode(["error" => $koneksi->error]);
}
$koneksi->close();
