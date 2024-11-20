<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ename = trim($_POST['ename']);
    $desig = trim($_POST['desig']);
    $dept = trim($_POST['dept']);
    $doj = trim($_POST['doj']);
    $salary = trim($_POST['salary']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO EMPDETAILS (ENAME, DESIG, DEPT, DOJ, SALARY) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $ename, $desig, $dept, $doj, $salary);

    if ($stmt->execute()) {
        echo "<div class='container'><p>Employee added successfully!</p></div>";
    } else {
        echo "<div class='container'><p>Error: " . $stmt->error . "</p></div>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Add Employee</h2>
    <form method="post">
        <label for="ename">Employee Name:</label>
        <input type="text" name="ename" required>

        <label for="desig">Designation:</label>
        <input type="text" name="desig">

        <label for="dept">Department:</label>
        <input type="text" name="dept">

        <label for="doj">Date of Joining:</label>
        <input type="date" name="doj">

        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary">

        <input type="submit" value="Add Employee">
    </form>
</div>

<div class="footer">
    &copy; 2024 Employee Management System
</div>

</body>
</html>
