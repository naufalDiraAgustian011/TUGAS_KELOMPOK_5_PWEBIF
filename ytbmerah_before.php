<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Merah</title>
    <link rel="icon" href="images/iconYT.png" type="image/png">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
            box-sizing: border-box;
            background: rgb(33, 33, 33);
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
            position: relative;
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
            width: 30px;
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
            background: #585858;
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

        .container{
            background: rgb(33, 33, 33);
            color: #fff;
            margin: 10px 20px;
            padding-left: 17%;
            padding-right: 2%;
            padding-top: 50px;
            padding-bottom: 20px;
            text-align: center;
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
            display: block;
            margin-bottom: 5px;
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
            <a href="login.php">Login</a>
    </div>
    </nav>
    <div class="sidebar">
        <div class="shortcut-link">
            <a href=""><img src="images/home.png"><p>Home</p></a>
            <a href=""><img src="images/explore.png"><p>Explore</p></a>
            <a href=""><img src="images/subscriprion.png"><p>Subscription</p></a>
            <a href=""><img src="images/library.png"><p>Library</p></a>
            <a href=""><img src="images/history.png"><p>History</p></a>
            <hr>
        </div>
        <div class="subscribed-list">
            <h3>SUBSCRIPTIONS</h3>
            <a href=""><p>Login untuk memberi tanda suka pada video, memberi komentar, dan subscribe.</p></a>
            <a href="login.php">Login</a>
            <!-- <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Music</p></a>
            <a href=""><img src="images/default.png"><p>Sports</p></a>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a>
            <a href=""><img src="images/default.png"><p>Web Dev</p></a> -->
        </div>
    </div>
<div class="container">
    <h2>Coba telusuri untuk memulai</h2>
    <p>Mulailah menonton video untuk membantu kami membuat feed berisi video yang Anda sukai.</p>
</div>

<script>
        var menuIcon = document.querySelector(".menu-icon");
        var sidebar = document.querySelector(".sidebar");
        var container = document.querySelector(".container");

        menuIcon.onclick = function(){
            sidebar.classList.toggle("small-sidebar");
            container.classList.toggle("large-container");
        }

        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.user-icon')) {
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


