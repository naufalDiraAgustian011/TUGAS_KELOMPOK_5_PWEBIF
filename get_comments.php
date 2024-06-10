<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "youtube_clone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$video_id = $_GET['video_id'];
$sql = "SELECT * FROM comments WHERE video_id = $video_id ORDER BY timestamp DESC";
$result = $conn->query($sql);

$comments = [];
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode(['comments' => $comments]);

$conn->close();
?>
