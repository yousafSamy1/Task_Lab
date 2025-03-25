<?php
$conn = mysqli_connect("localhost", "root", "", "employee_db");

if (!$conn) {
    echo "Connection Failed";
    exit();
}
?>
