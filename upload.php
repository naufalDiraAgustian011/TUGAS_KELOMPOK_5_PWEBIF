<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "youtube_clone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$title = $_POST['title'];
$channel = $_POST['channel'];
$views = $_POST['views'];
$upload_time = $_POST['upload_time'];
$thumbnail = $_POST['thumbnail'];
$video_link = $_POST['video_link'];
$subscribers = $_POST['subscribers'];
$description = $_POST['desc'];

// Insert data into database
$sql = "INSERT INTO videos (title, channel, views, upload_time, thumbnail, video_link, subscribers, description) VALUES ('$title', '$channel', $views, '$upload_time', '$thumbnail', '$video_link', '$subscribers', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // Redirect to the main page after successful upload
    header("Location: ytbmerah.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
