<?php
// Database connection settings (replace with your own)
$host = 'localhost';
$db = 'music_streaming';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle add song form submission
if (isset($_POST['add-song'])) {
    $title = $_POST['song-title'];
    $artist = $_POST['artist'];

    // Handle file uploads
    $songFile = $_FILES['song-file']['name'];
    $coverArt = $_FILES['cover-art']['name'];

    // Directory to store uploaded files
    $targetDir = "uploads/";
    $songTargetFile = $targetDir . basename($songFile);
    $coverTargetFile = $targetDir . basename($coverArt);

    move_uploaded_file($_FILES['song-file']['tmp_name'], $songTargetFile);
    move_uploaded_file($_FILES['cover-art']['tmp_name'], $coverTargetFile);

    $stmt = $conn->prepare("INSERT INTO songs (title, artist, song_file, cover_art) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $artist, $songTargetFile, $coverTargetFile);
    $stmt->execute();
    $stmt->close();
}

// Handle add artist form submission
if (isset($_POST['add-artist'])) {
    $artistName = $_POST['artist-name'];
    $artistBio = $_POST['artist-bio'];

    $stmt = $conn->prepare("INSERT INTO artists (name, bio) VALUES (?, ?)");
    $stmt->bind_param("ss", $artistName, $artistBio);
    $stmt->execute();
    $stmt->close();
}

// Fetch user data
$userQuery = "SELECT * FROM users";
$userResult = $conn->query($userQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- Include previous HTML layout here -->
    <main>
        <section id="view-users">
            <h2>View Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Login Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $userResult->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['login_time']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
