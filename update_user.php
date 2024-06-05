<?php
header("Content-Type: application/json");
include 'db_config.php';

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Validate the data
if (!isset($data->id) || !isset($data->name) || !isset($data->email) || !isset($data->ttl) || !isset($data->alamat) || !isset($data->zodiac) || !isset($data->jk)) {
 die(json_encode(["error" => "Invalid input"]));
}

$id = $koneksi->real_escape_string($data->id);
$name = $koneksi->real_escape_string($data->name);
$email = $koneksi->real_escape_string($data->email);
$ttl = $koneksi->real_escape_string($data->ttl);
$alamat = $koneksi->real_escape_string($data->alamat);
$zodiac = $koneksi->real_escape_string($data->zodiac);
$jk = $koneksi->real_escape_string($data->jk);

$sql = "UPDATE users SET name='$name', email='$email', ttl='$ttl', alamat='$alamat', zodiac='$zodiac', jk='$jk' WHERE id=$id";

if ($koneksi->query($sql) === TRUE) {
 echo json_encode(["success" => true]);
} else {
 echo json_encode(["error" => $koneksi->error]);
}
$koneksi->close();
?>