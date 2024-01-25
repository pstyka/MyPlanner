<!DOCTYPE html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script type="text/javascript" src="public/js/profile.js"></script>
</head>
<body>
    <div class="container">
        <div class="upper-container">
             <div class="logo">
                <img src="public/img/MyPlanner.svg">
                Profile
            </div>
        </div>
       
        <div class="profile-container">
            <div class="level">
                <div class="level-circle"></div>
                <div class="level-bar">
                    <div class="bar" id="bar"></div>
                </div>
            </div>
            <div class="profile-boxes">
                <div class="profile-info">
                    <div class="user-nickname"></div>
                    <div class="profile-picture">
                        <img src="public/img/jarek.png">
                    </div>
                </div>
                <div class="boxes completed-quests"></div>
            </div>
            <form class="back-profile" action="menu" method="GET">
                <button type="submit">Back</button>
            </form>
        </div>      
    </div>
</body>