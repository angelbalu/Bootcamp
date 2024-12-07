<!-- Layers PHP SQL Connection Example -->
<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'BootcampDec'; 

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$artist_id = 1; 

// Sanitize input to prevent SQL injection
$artist_id = $conn->real_escape_string($artist_id);

// SQL query to fetch all songs by the artist
$sql = "SELECT Songs.Title AS SongTitle, Albums.Name AS AlbumName
        FROM Songs
        LEFT JOIN Albums ON Songs.album_id = Albums.id
        WHERE Songs.artist_id = '$artist_id'";

// Execute the query
$result = $conn->query($sql);

// Check if any songs were found
if ($result->num_rows > 0) {
    echo "<h2>Songs by Artist ID: $artist_id</h2>";
    echo "<ul>";
    // Output data for each song
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['SongTitle'] . " (Album: " . ($row['AlbumName'] ?? 'No Album') . ")</li>";
    }
    echo "</ul>";
} else {
    echo "No songs found for the specified artist.";
}

// Close the connection
$conn->close();
?>