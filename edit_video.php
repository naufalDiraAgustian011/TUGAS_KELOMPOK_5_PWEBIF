<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youtube_clone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $channel = $_POST['channel'];
    $views = $_POST['views'];
    $upload_time = $_POST['upload_time'];
    $thumbnail = $_POST['thumbnail'];
    $video_link = $_POST['video_link'];
    $subscribers = $_POST['subscribers'];
    $description = $_POST['description'];

    $sql = "UPDATE videos SET title='$title', channel='$channel', views=$views, upload_time='$upload_time', thumbnail='$thumbnail', video_link='$video_link', subscribers='$subscribers', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ytbmerah.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM videos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
    <link rel="icon" href="images/iconYT.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
            box-sizing: border-box;
        }
        .upload-form {
            padding: 20px;
            background: rgb(33, 33, 33);
            color: #fff;
            margin: 20px auto;
            width: 50%;
            border-radius: 8px;
        }
        .upload-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .upload-form form {
            display: flex;
            flex-direction: column;
        }
        .upload-form form input,
        .upload-form form textarea {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgb(50, 50, 50);
            color: #fff;
        }
        .upload-form form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #ed3833;
            color: #fff;
            cursor: pointer;
        }
        .upload-form form button:hover {
            background: #ff4c4c;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Edit Video</h2>
        <form action="edit_video.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required><br>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Video Title" required><br>
            <input type="text" name="channel" value="<?php echo $row['channel']; ?>" placeholder="Channel Name" required><br>
            <input type="number" name="views" value="<?php echo $row['views']; ?>" placeholder="Views" required><br>
            <input type="text" name="upload_time" value="<?php echo $row['upload_time']; ?>" placeholder="Upload Time" required><br>
            <input type="text" name="thumbnail" value="<?php echo $row['thumbnail']; ?>" placeholder="Thumbnail URL" required><br>
            <input type="text" name="video_link" value="<?php echo $row['video_link']; ?>" placeholder="Video Link" required><br>
            <input type="text" name="subscribers" value="<?php echo $row['subscribers']; ?>" placeholder="Subscribers" required><br>
            <textarea name="description" placeholder="Video Description" rows="4" required><?php echo $row['description']; ?></textarea><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
