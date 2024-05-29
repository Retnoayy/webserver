<?php
include 'db_config.php';
$sql = "SELECT id, name, email, ttl, alamat, zodiac, jk FROM users";
$result = $koneksi->query($sql);
$users = array();
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 $users[] = $row;
 }
}
header('Content-Type: application/json');
echo json_encode($users);
$koneksi->close();