<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albums</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="albums-container">
        <div class="albums-wrapper">
            <h1 class="albums-heading">My Albums</h1>
            <div class="albums-grid">
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

                // SQL query to fetch all songs by the artist
                $sql = "SELECT Albums.Name, Albums.Image_Url, Artist.Name As ArtistName, Artist.Image_url As ArtistImage_url
                        FROM Albums
                        LEFT JOIN Artist ON Albums.artist_id = Artist.id";

                // Execute the query
                $result = $conn->query($sql);

                // Check if any songs were found
                if ($result->num_rows > 0) {
                    // Output data for each song
                    while ($album = $result->fetch_assoc()) {
                        echo '
                        <div class="album-card">
                            <h2 class="album-title">' . $album['Name'] . '</h2>
                            <div class="album-image">
                                <div class="rectangle">' . $album['ArtistName'] . '</div>
                                <div class="overlap-group">
                                    <img class="icon-person" src="' . $album['ArtistImage_url'] . '" />
                                </div>
                                <img class="icon-photo" src="' . $album['Image_Url'] . '" />
                            </div>
                        </div>';
                    }
                } else {
                    echo "No albums found for the specified artist.";
                }
                // Close the connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>

</html>