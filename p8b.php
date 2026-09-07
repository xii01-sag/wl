<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password (empty)
$dbname = "studentdb"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student data from database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Selection sort by marks (ascending order)
$n = count($students);
for ($i = 0; $i < $n - 1; $i++) {
    $minIndex = $i;
    for ($j = $i + 1; $j < $n; $j++) {
        if ($students[$j]['marks'] < $students[$minIndex]['marks']) {
            $minIndex = $j;
        }
    }
    // Swap
    $temp = $students[$i];
    $students[$i] = $students[$minIndex];
    $students[$minIndex] = $temp;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Records Sorted by Marks</title>
<style>
body {
    font-family: Arial, sans-serif; 
    background-color: #f8f9fa; 
    text-align: center;
}
table {
    margin: 20px auto; 
    border-collapse: collapse; 
    width: 50%;
}
th, td {
    border: 1px solid #ddd; 
    padding: 8px;
}
th {
    background-color: #4CAF50; 
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<h2>Student Records Sorted by Marks (Selection Sort)</h2>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Marks</th>
</tr>
<?php foreach ($students as $student): ?>
<tr>
<td><?php echo $student['id']; ?></td>
<td><?php echo $student['name']; ?></td>
<td><?php echo $student['marks']; ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
