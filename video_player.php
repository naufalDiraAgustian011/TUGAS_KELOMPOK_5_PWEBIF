<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
    box-sizing: border-box;
}
a{
    text-decoration: none;
    color: #5a5a5a;
}

img{
    cursor: pointer;
}

.flex-div{ 
    display: flex;
    align-items: center;
}
nav{
    padding: 10px 2%;
    justify-content: space-between;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    background: rgb(33, 33, 33);
    position: sticky;
    top: 0;
    z-index: 10;
}
.nav-right img{
    width: 25px;
    margin-right: 25px;

}
.nav-right .user-icon{
    width: 35px;
    border-radius: 50%;
    margin-right: 0;

}
.nav-left .menu-icon{
    width: 22px;
    margin-right: 25px;

}
.nav-left .logo{
    width: 130px;
}
.nav-middle .mic-icon{
    width: 16px;
}
.nav-middle .search-box{
    border: 1px solid #ccc;
    margin-right: 15px;
    padding: 8px 12px;
    border-radius: 25px;
}
.nav-middle .search-box input{
    width: 400px;
    border: 0;
    outline: 0;
    background: transparent;
    color: #fff;
}
.nav-middle .search-box img{
    width: 15px;
}


/* ----------------sidebar----------------------- */


.sidebar{
    background:  rgb(33, 33, 33);
    width: 15%;
    height: 100vh;
    position: fixed;
    top: 0;
    padding-left: 2%;
    padding-top: 80px;
}
.shortcut-link a img{
    width: 20px;
    margin-right: 20px;
}
.shortcut-link a{
    display: flex;
    color: #fff;
    align-items: center;
    margin-bottom: 20px;
    width: fit-content;
    flex-wrap: wrap;
}
.shortcut-link a:first-child{
    color: #ed3833;
}
.sidebar hr{
    border: 0;
    height: 1px;
    background: #ccc;
    width: 85%;
}
.subscribed-list h3{
    font-size: 13px;
    margin: 20px 0;
    color: #ffffff;
}
.subscribed-list a{
    color: #fff;
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    width: fit-content;
    flex-wrap: wrap;
}
.subscribed-list a img{
    width: 25px;
    border-radius: 50%;
    margin-right: 20px;
}
.small-sidebar{
    width: 5%;
}
.small-sidebar a p{
    display: none;
}
.small-sidebar h3{
    display: none;
}
.small-sidebar hr{
    width: 50%;
    margin-bottom: 25px;
}


/* ----------------------------main-------------------------------- */


.container{
    background: rgb(33, 33, 33);
    padding-left: 17%;
    padding-right: 2%;
    padding-top: 20px;
    padding-bottom: 20px;
}
.large-container{
    padding-left: 7%;

}
.banner{
    width: 100%;
}
.banner img{
    width: 100%;
    border-radius: 8px;
}
.list-container{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-column-gap: 16px;
    grid-row-gap: 30px;
    margin-top: 15px;
}
.vid-list .thumbnail{
    width: 100%;
    border-radius: 5px;
}
.vid-list .flex-div{
    align-items: flex-start;
    margin-top: 7px;
}
.vid-list .flex-div img{
    width: 35px;
    margin-right: 10px;
    border-radius: 50%;
}
.vid-info{
    color: #939292;
    font-size: 13px;
}
.vid-info a {
    color: #fff;
    font-weight: 600;
    display:block;
    margin-bottom: 5px;
}

@media (max-width: 900px){
    .menu-icon{
        display: none;
    }
    .sidebar{
        display: none;
    }
    .container, .large-container{
        padding-left: 5%;
        padding-right: 5%;
    }
    .nav-right img{
        display: none;
    }
    .nav-right .user-icon{
        display: block;
        width: 30px;
    }
    .nav-middle .search-box input {
        width: 100px;
    }
    .nav-middle .mic-icon{
        display: none;
    }
    .logo{
        width: 90px;
    }
}

/* -------------------------play video page---------------------------------  */

.play-container{
    padding-left: 2%;
}
.row{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}
.play-video{
    flex-basis: 69%;
}
.right-sidebar{
    flex-basis: 30%;
}
.play-video video{
    width: 100%;
}
.side-video-list{
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}
.side-video-list img{
    width: 100%;
    border-radius: 4px;
}
.side-video-list .small-thumbnail{
    flex-basis: 49%;
}
.side-video-list .vid-info{
    flex-basis: 49%;
}
.play-video .tags{
    margin: 10px 0 ;
    
}
.play-video .tags a{
    color: rgb(122, 107, 236);
}
.play-video h3{
    font-weight: 600;
    font-size: 22px;
    color: #fff;
}
.play-video .play-video-info{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 14px;
    color: #5a5a5a;
}
.play-video .play-video-info a img{
    width: 20px;
    margin-right: 8px;
}
.play-video .play-video-info a{
    display: inline-flex;
    align-items: center;
    margin-left: 15px;
}
.play-video hr{
    border: 0;
    height: 1px;
    background: #5a5a5a;
}
.publisher{
    margin-top: 30px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}
.publisher div{
    flex: 1;
}
.publisher img{
    width: 40px;
    border-radius: 50%;
    margin-right: 15px;
}
.publisher div p{
    color: #fff;
    font-weight: 600;
    font-size: 18px;
}
.publisher div span{
    font-size: 13px;
    color: #5a5a5a;
}
.publisher button{
    background: red;
    color: #fff;
    padding: 8px 13px; 
    border: 0;
    outline: 0;
    border-radius: 4px;
    cursor: pointer;
}
.vid-description{
    color: #fff;
    padding-left: 55px;
    margin: 15px 0;
}
.vid-description p{
    font-size: 14px;
    margin-bottom: 5px;
    color: #fff;
}
.vid-description hr{
    margin: 15px 0;
}
.vid-description h4{
    font-size: 14px;
    color: #ccc;
    margin-top: 15px;
}
.add-comment{
    display: flex;
    align-items: center;
    margin: 30px 0;
}
.add-comment img{
    width: 35px;
    border-radius: 50%;
    margin-right: 15px;
}
.add-comment input{
    color: #fff;
    border: 0;
    outline: 0;
    border-bottom: 1px solid #5a5a5a;
    width: 100%;
    padding-top: 10px;
    background: transparent;
}
.old-comment{
    display: flex;
    align-items: center;
    margin: 20px 0 ;
}
.old-comment img{
    width: 35px;
    border-radius: 50%;
    margin-right: 15px;
}
.old-comment h3{
    font-size: 14px;
    margin-bottom: 5px;
}
.old-comment h3 span{
    font-size: 12px;
    color: #ccc;
    font-weight: 500;
    margin-left: 8px;

}
.old-comment .comment-action{
    display: flex;
    align-items: center;
    margin: 8px 0;
    font-size: 14px;
}
.old-comment .comment-action img{
    border-radius: 0;
    width: 20px;
    margin-right: 5px;
}
.old-comment .comment-action span{
    margin-right: 20px;
    color: #ccc;
}
.old-comment .comment-action a{
    color: rgb(122, 107, 236) ;
}
@media (max-width:900px){
    .play-video{
        flex-basis: 100%;
    }
    .right-sidebar{
        flex-basis: 100%;
    }
    .play-container{
        padding-left: 5%;
    }
    .vid-description{
        padding-left: 0;
    }
    .play-video .play-video-info a{
        margin-left: 0;
        margin-right: 15px;
        margin-top: 15px;
    }
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
            <img src="images/upload.png">
            <img src="images/more.png">
            <img src="images/notification.png">
            <img src="images/default.png" class="user-icon">
        </div>
    </nav>

    <div class="container play-container">
        <div class="row">
            <div class="play-video">
                <iframe id="videoPlayer" width="100%" height="600" frameborder="0" allowfullscreen></iframe>
                <div class="tags" id="videoTags"></div>
                <h3 id="videoTitle">Video Title</h3>
                <div class="play-video-info">
                    <p id="videoInfo">Video Info</p>
                    <div>
                        <a href=""><img src="images/like.png" alt="">Like</a>
                        <a href=""><img src="images/dislike.png" alt="">Dislike</a>
                        <a href=""><img src="images/share.png" alt="">Share</a>
                        <a href=""><img src="images/save.png" alt="">Save</a>
                    </div>
                </div>
                <hr>
                <div class="publisher">
                    <img src="images/default.png" id="channelImage">
                    <div>
                        <p id="channelName">Channel Name</p>
                        <span id="channelSubscribers">Subscribers</span>
                    </div>
                    <button type="button">Subscribe</button>
                </div>
                <div class="vid-description" id="videoDescription"></div>
            </div>

            <div class="right-sidebar">
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
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<div class='side-video-list'>
                            <a href='video_player.php?id={$row['id']}' class='small-thumbnail'><img src='{$row['thumbnail']}' ></a>
                                <div class='vid-info'>
                                    <a href='video_player.php?id={$row['id']}'>{$row['title']}</a>
                                    <p>{$row['channel']}</p>
                                    <p>{$row['views']} Views &bull; {$row['upload_time']}</p>
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
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const videoId = urlParams.get('id');

            fetch(`get_video_info.php?id=${videoId}`)
                .then(response => response.json())
                .then(data => {
                    const videoPlayer = document.getElementById('videoPlayer');
                    videoPlayer.src = data.video_link;
                    document.getElementById('videoTitle').innerText = data.title;
                    document.getElementById('videoInfo').innerText = `${data.views} Views • ${data.upload_time}`;
                    document.getElementById('channelName').innerText = data.channel;
                    document.getElementById('videoDescription').innerText = data.description;
                    document.getElementById('channelImage').src = 'images/default.png';
                })
                .catch(error => console.error('Error loading video data:', error));
        });
    </script>
</body>
</html>
