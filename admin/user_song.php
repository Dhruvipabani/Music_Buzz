<?php

$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "music";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT title, url, file_path FROM songs";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Play Songs</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(135deg, black, orange);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #fff;
    }
    .container {
        max-width: 800px;
        width: 100%;
        padding: 30px;
        background: rgba(255, 255, 255, 0.9); 
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        text-align: center;
    }
    h1 {
        font-size: 2.2em;
        color: #ff4500; 
        margin-bottom: 20px;
    }
    .song-list {
        margin-top: 20px;
        text-align: left;
    }
    .song-item {
        padding: 15px;
        background: rgba(0, 0, 0, 0.7); 
        border-radius: 8px;
        margin-bottom: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        transition: background 0.3s ease;
    }
    .song-item:hover {
        background: rgba(255, 69, 0, 0.5); 
    }
    h3 {
        margin-bottom: 10px;
        font-size: 1.5em;
        color: #fff;
    }
    audio {
        width: 100%;
        border: 1px solid #ff4500; 
        border-radius: 8px;
        margin-top: 10px;
    }
    .no-songs {
        font-size: 1.2em;
        color: #ddd; 
        padding: 20px;
        background: rgba(0, 0, 0, 0.5); 
        border-radius: 8px;
    }
    .top-left-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #ff4500; 
        border: none;
        border-radius: 6px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .top-left-btn:hover {
        background-color: #e03e00; 
    }
</style>

</head>
<body>
    
    
    <a href="../index.php" class="top-left-btn">Back to Home</a>
    
    <div class="container">
        <h1>New Release</h1>
        
        <div id="song-list" class="song-list">
           
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="song-item">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <audio controls>
                            <?php if ($row['file_path']): ?>
                                <source src="<?php echo htmlspecialchars($row['file_path']); ?>" type="audio/mpeg">
                            <?php else: ?>
                                <source src="<?php echo htmlspecialchars($row['url']); ?>" type="audio/mpeg">
                            <?php endif; ?>
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-songs">No songs available.</p>
            <?php endif; ?>
        </div>
    </div>
   
</body>
</html>
