<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple YouTube Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .video-thumbnail {
            width: 120px; /* Set thumbnail width */
            height: auto; /* Auto height */
        }
        .video-list-item {
            display: flex;
            align-items: center;
        }
        .video-list-item img {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">YouTube</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Trending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Subscriptions</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <!-- Tambahkan tombol logout di sebelah kanan navbar -->
        <a href="logout.php" class="btn btn-outline-danger ml-2">Logout</a>
    </div>
</nav>


<!-- Page Content -->
<div class="container mt-3">
    <div class="row">
        <!-- Video Player -->
        <div class="col-md-8">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
            </div>
            <h2 class="mt-3">Video Title</h2>
            <p>Description of the video goes here...</p>
        </div>
        <!-- Sidebar -->
        <div class="col-md-4">
            <h3>Sidebar</h3>
            <ul class="list-group" id="relatedVideos">
                <!-- List of related videos will be populated here -->
                <li class="list-group-item video-list-item">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/0.jpg" alt="Video 1" class="video-thumbnail">
                        Video Title 1
                    </a>
                </li>
                <li class="list-group-item video-list-item">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/0.jpg" alt="Video 2" class="video-thumbnail">
                        Video Title 2
                    </a>
                </li>
                <!-- Add more similar list items for other videos -->
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3">
    &copy; 2024 YouTube
</footer>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
