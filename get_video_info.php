<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "youtube_clone";
$video_id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM videos WHERE id = $video_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoData = [
        'video_link' => $row['video_link'],
        'title' => $row['title'],
        'views' => $row['views'],
        'upload_time' => $row['upload_time'],
        'channel' => $row['channel'],
        'description' => $row['description'],
        'subscribers' => $row['subscribers']
    ];
    echo json_encode($videoData);
} else {
    echo json_encode(['error' => 'No video found']);
}

$conn->close();
?>
