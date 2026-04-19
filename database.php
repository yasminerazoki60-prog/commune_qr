<?php
$servername = "sql103.infinityfree.com";
$username = "if0_41702989";
$password = "ubizji0NKQhjXf8";
$dbname = "if0_41702989_Communeqr";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
// تصحيح مشكل الحروف العربية
$conn->set_charset("utf8mb4");
?>