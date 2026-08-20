<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tech_platform";
$conn = mysqli_connect($host, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8mb4");
if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}
?>