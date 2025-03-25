<?php
require_once "Databases/Database.php";

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h2>Add Employee</h2>
        <form method="POST" action="handle.php">
            <label for="name">Employee Name</label>
            <input type="text" name="emp_name" placeholder="Employee Name" id="name" required>

            <label for="salary">Employee Salary</label>
            <input type="text" name="emp_salary" placeholder="Employee Salary" id="salary"  required>

            <label for="age">Employee Age</label>
            <input type="text" name="emp_age" placeholder="Employee Age" id="age" required>

            <label for="department">Department</label>
            <select name="emp_dept" id="department" required>
                <option value="">Select Department</option>
                <?php 
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['dept_name']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="add">Add</button>
        </form>

        <a href="view_employees.php" class="view-btn">View Employees</a>
    </div>

</body>
</html>