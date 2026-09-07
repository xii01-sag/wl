<?php
// File to store the visitor count
$counter_file = "counter.txt";

// If file doesn't exist, create it with value 0
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, "0");
}

// Read the current count
$counter = (int) file_get_contents($counter_file);

// Increase count by 1
$counter++;

// Save the updated count back to file
file_put_contents($counter_file, $counter);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitor Counter</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f8fb;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        .counter-box {
            display: inline-block;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .count {
            font-size: 40px;
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>

<body>

    <h1>Welcome to My Website</h1>

    <div class="counter-box">
        <p>You are visitor number:</p>

        <div class="count">
            <?php echo $counter; ?>
        </div>
    </div>

</body>
</html>
