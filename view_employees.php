<?php
require_once "Databases/Database.php";

$sql = "SELECT employees.id, employees.name, employees.salary, employees.age, departments.dept_name 
        FROM employees 
        JOIN departments ON employees.department_id = departments.id
        where employees.id>0
        ORDER BY employees.id DESC"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Employees List</h2>
    <?php if ($result->num_rows > 0) { ?>
        <table class="employee-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Age</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['salary']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                        <td><?php echo htmlspecialchars($row['dept_name']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No employees found.</p>
    <?php } ?>

    <a href="index.php" class="back-btn">Back to Add Employee</a>
</div>


</body>
</html>