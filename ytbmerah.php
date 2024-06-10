<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Merah</title>
    <link rel="icon" href="images/iconYT.png" type="image/png">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: #5a5a5a;
        }

        img {
            cursor: pointer;
        }

        .flex-div {
            display: flex;
            align-items: center;
        }

        nav {
            padding: 10px 2%;
            justify-content: space-between;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background: rgb(33, 33, 33);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-right img {
            width: 25px;
            margin-right: 25px;
        }

        .nav-right .user-icon {
            width: 35px;
            border-radius: 50%;
            margin-right: 0;
            position: relative;
        }

        .nav-left .menu-icon {
            width: 22px;
            margin-right: 25px;
        }

        .nav-left .logo {
            width: 130px;
        }

        .nav-middle .mic-icon {
            width: 16px;
        }

        .nav-middle .search-box {
            border: 1px solid #ccc;
            margin-right: 15px;
            padding: 8px 12px;
            border-radius: 25px;
        }

        .nav-middle .search-box input {
            width: 400px;
            border: 0;
            outline: 0;
            background: transparent;
            color: #fff;
        }

        .nav-middle .search-box img {
            width: 15px;
        }

        .sidebar {
            background: rgb(33, 33, 33);
            width: 15%;
            height: 100vh;
            position: fixed;
            top: 0;
            padding-left: 2%;
            padding-top: 80px;
        }

        .shortcut-link a img {
            width: 30px;
            margin-right: 20px;
        }

        .shortcut-link a {
            display: flex;
            color: #fff;
            align-items: center;
            margin-bottom: 20px;
            width: fit-content;
            flex-wrap: wrap;
        }

        .shortcut-link a:first-child {
            color: #ed3833;
        }

        .sidebar hr {
            border: 0;
            height: 1px;
            background: #585858;
            width: 85%;
        }

        .subscribed-list h3 {
            font-size: 13px;
            margin: 20px 0;
            color: #ffffff;
        }

        .subscribed-list a {
            color: #fff;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            width: fit-content;
            flex-wrap: wrap;
        }

        .subscribed-list a img {
            width: 25px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .small-sidebar {
            width: 5%;
        }

        .small-sidebar a p {
            display: none;
        }

        .small-sidebar h3 {
            display: none;
        }

        .small-sidebar hr {
            width: 50%;
            margin-bottom: 25px;
        }

        .container {
            background: rgb(33, 33, 33);
            padding-left: 17%;
            padding-right: 2%;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .large-container {
            padding-left: 7%;
        }

        .banner {
            width: 100%;
        }

        .banner img {
            width: 100%;
            border-radius: 8px;
        }

        .list-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-column-gap: 16px;
            grid-row-gap: 30px;
            margin-top: 15px;
        }

        .vid-list .thumbnail {
            width: 100%;
            border-radius: 5px;
        }

        .vid-list .flex-div {
            align-items: flex-start;
            margin-top: 7px;
            justify-content: space-between; /* Align items to the left and right */
            width: 100%;
        }

        .vid-list .flex-div img {
            width: 35px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .vid-info {
            color: #939292;
            font-size: 13px;
        }

        .vid-info a {
            color: #fff;
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }



        @media (max-width: 900px) {
            .menu-icon {
                display: none;
            }

            .sidebar {
                display: none;
            }

            .container, .large-container {
                padding-left: 5%;
                padding-right: 5%;
            }

            .nav-right img {
                display: none;
            }

            .nav-right .user-icon {
                display: block;
                width: 30px;
            }

            .nav-middle .search-box input {
                width: 100px;
            }

            .nav-middle .mic-icon {
                display: none;
            }

            .logo {
                width: 90px;
            }
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #333;
            min-width: 150px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #575757;
        }

        .show {
            display: block;
        }

        .three-dots-menu {
            position: relative;
            cursor: pointer;
            margin-left: auto;
        }

        .three-dots {
            width: 20px;
        }

        .three-dots::after {
            content: "\2807";
            font-size: 20px;
            color: #fff;
        }

        .dropdown-contentIcon {
            display: none;
            position: absolute;
            right: 0;
            background-color: #333;
            min-width: 150px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-contentIcon a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-contentIcon a:hover {
            background-color: #575757;
        }

        .show-user-menu {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="images/menu.png" class="menu-icon">
            <img src="images/yt_logo(s).png" class="logo">
        </div>
        <div class="nav-middle flex-div">
            <div class="search-box flex-div">
                <input type="text" placeholder="Search">
                <img src="images/search.png" alt="">
            </div>
            <img src="images/voice-search(1).png" class="mic-icon">
        </div>
        <div class="nav-right flex-div">
            <a href="upload.html"><img src="images/upload.png" alt="Upload"></a>
            <img src="images/more.png">
            <img src="images/notification.png">
            <div class="dropicon-menu" onclick="toggleUserMenu()">
                <img src="images/default.png" class="user-icon">
                <div class="dropdown-contentIcon">
                    <a href="#">Your Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <div class="shortcut-link">
            <a href=""><img src="images/home.png"><p>Home</p></a>
            <a href=""><img src="images/explore.png"><p>Explore</p></a>
            <a href="https://www.youtube.com/feed/subscriptions"><img src="images/subscriprion.png"><p>Subscription</p></a>
            <a href="https://www.youtube.com/feed/playlists"><img src="images/library.png"><p>Playlist</p></a>
            <a href=""><img src="images/history.png"><p>History</p></a>
            <hr>
        </div>
        <div class="subscribed-list">
            <h3>SUBSCRIPTIONS</h3>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Music</p></a>
            <a href=""><img src="images/default.png"><p>Sports</p></a>
            <a href=""><img src="images/default.png"><p>Entertainment</p></a>
            <a href=""><img src="images/default.png"><p>Gaming</p></a>
            <a href=""><img src="images/default.png"><p>Business</p></a>
            <a href=""><img src="images/default.png"><p>TV Shows</p></a>
            <a href=""><img src="images/default.png"><p>Meme</p></a>
        </div>
    </div>

    <div class="container">
        <div class="banner">
            <img src="images/bannerYt.png">
        </div>
        <div class="list-container">
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

            $sql = "SELECT * FROM videos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='vid-list'>
                    <a href='video_player.php?id={$row['id']}'><img src='{$row['thumbnail']}' class='thumbnail'></a>
                            <div class='flex-div'>
                                <img src='images/default.png'>
                                <div class='vid-info'>
                                    <a href='{$row['video_link']}'>{$row['title']}</a>
                                    <p>{$row['channel']}</p>
                                    <p>{$row['views']} Views &bull; {$row['upload_time']}</p>
                                </div>
                                <div class='three-dots-menu' onclick='toggleMenu(this)'>
                                    <div class='three-dots'></div>
                                    <div class='dropdown-content'>
                                        <a href='edit_video.php?id={$row['id']}'>Edit</a>
                                        <a href='delete_video.php?id={$row['id']}'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
            } else {
                echo "No videos found";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <script>
        var menuIcon = document.querySelector(".menu-icon");
        var sidebar = document.querySelector(".sidebar");
        var container = document.querySelector(".container");

        menuIcon.onclick = function () {
            sidebar.classList.toggle("small-sidebar");
            container.classList.toggle("large-container");
        }

        function toggleMenu(element) {
            var dropdown = element.querySelector('.dropdown-content');
            dropdown.classList.toggle('show');
        }

        function toggleUserMenu() {
            var dropdownIcon = document.querySelector('.dropdown-contentIcon');
            dropdownIcon.classList.toggle('show-user-menu');
        }

        window.onclick = function (event) {
            if (!event.target.matches('.user-icon') && !event.target.matches('.dropicon-menu')) {
                var dropdownsIcon = document.getElementsByClassName("dropdown-contentIcon");
                for (var i = 0; i < dropdownsIcon.length; i++) {
                    var openDropdownIcon = dropdownsIcon[i];
                    if (openDropdownIcon.classList.contains('show-user-menu')) {
                        openDropdownIcon.classList.remove('show-user-menu');
                    }
                }
            }

            if (!event.target.matches('.three-dots') && !event.target.matches('.three-dots-menu')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
</body>
</html>
