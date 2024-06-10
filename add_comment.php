<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youtube_clone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$video_id = $data['video_id'];
$text = $data['text'];
$author = 'Anonymous'; // You can replace this with the logged-in user's name
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO comments (video_id, text, author, timestamp) VALUES ($video_id, '$text', '$author', '$timestamp')";
$response = [];

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conn->error;
}

echo json_encode($response);

$conn->close();
?>
