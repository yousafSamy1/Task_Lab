<?php
require_once "Databases/Database.php";

if (isset($_POST['add'])) {
    $emp_name = trim($_POST['emp_name']);
    $emp_salary = trim($_POST['emp_salary']);
    $emp_age = trim($_POST['emp_age']);
    $emp_dept = trim($_POST['emp_dept']);

    if (empty($emp_name) || empty($emp_salary) || empty($emp_age) || empty($emp_dept)) {
        header("Location: index.php");
        exit;
    }

    if (!is_numeric($emp_salary) || $emp_salary <= 0 || !is_numeric($emp_age) || $emp_age <= 0 || $emp_age > 120) {
        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO employees (name, salary, age, department_id) 
            VALUES ('$emp_name', $emp_salary, $emp_age, $emp_dept)";

    if (mysqli_query($conn, $sql)) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    header("Location: index.php");
    exit;
}

$conn->close();
?>
