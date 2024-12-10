<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Music Application</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    // Include the PHP connection file
    include 'connection.php';

    // Example query to fetch data from a table
    $sql = "SELECT * FROM albums"; // Replace 'albums' with your table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>Available Albums:</h1>";
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['album_name'] . " by " . $row['artist'] . "</li>"; // Adjust column names as needed
        }
        echo "</ul>";
    } else {
        echo "<p>No albums found.</p>";
    }

    // Close the connection
    $conn->close();
    ?>
</body>

</html>