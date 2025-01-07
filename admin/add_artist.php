<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artistName = $_POST['artistName'] ?? '';
    $songName = $_POST['songName'] ?? '';
   
    
    
    $albumArtPath = '';
    if (isset($_FILES['albumArt']) && $_FILES['albumArt']['error'] === UPLOAD_ERR_OK) {
        $albumArtDir = 'uploads/';
        if (!is_dir($albumArtDir)) {
            mkdir($albumArtDir, 0755, true);
        }
        $albumArtPath = $albumArtDir . basename($_FILES['albumArt']['name']);
        move_uploaded_file($_FILES['albumArt']['tmp_name'], $albumArtPath);
    }

  
    $artistsFile = 'artists.json';
    $artists = [];
    if (file_exists($artistsFile)) {
        $artists = json_decode(file_get_contents($artistsFile), true);
    }
    
    $newArtist = [
        'artistName' => $artistName,
        'songName' => $songName,

        'albumArt' => $albumArtPath,
        'songs' => []
    ];
    $artists[] = $newArtist;
    file_put_contents($artistsFile, json_encode($artists));

   
    header('Location: allartists.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    .delete-btn {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
        border: none;
    }
    .delete-btn:hover {
       
    }
    .add-btn {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
        border: none;
    }
    .back-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artist</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0;">
<a href="admin_page.php" class="back-btn">Back</a>   
<div style="max-width: 800px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Add Artist</h1>
        <p style="text-align: center; color: #777; font-size: 16px;">Add new artists to the platform. Please fill out the form below.</p>

        <form action="add_artist.php" method="post" enctype="multipart/form-data" style="margin-top: 30px;">
            <div style="margin-bottom: 20px;">
                <label for="artistName" style="display: block; color: #555; margin-bottom: 5px;">Artist Name</label>
                <input type="text" id="artistName" name="artistName" placeholder="Enter artist name" 
                    style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>

   
            

            <div style="margin-bottom: 20px;">
                <label for="albumArt" style="display: block; color: #555; margin-bottom: 5px;">Upload Album Art</label>
                <input type="file" id="albumArt" name="albumArt" accept="image/*" 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>

           

            <div style="margin-top: 30px; text-align: center;">
                <button type="submit" class="add-btn"
                    style="background-color: #4CAF50; color: white; padding: 12px 24px; border: none; border-radius: 4px; font-size: 18px; cursor: pointer;">
                    Add Artist
                </button>
                <button type="submit" >
                     <a href="delete_artist.php" class="delete-btn">
    Delete Artist
</a>
                </button>
            </div>
        </form>
    </div>
</body>
</html>
