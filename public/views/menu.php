<?php
session_start();
?>


<!doctype html>
<head>
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="public/css/menu.css">
</head>
<body>
<?php if(!empty($_SESSION['user_id'])) : ?>
    <div class="container">
        <div class="logo">
            <img src="public/img/MyPlanner.svg">
            Menu
        </div>

        <div class="buttons">
            <div class="row">
            <form class="quests" action="quests" method="GET">
                    <button type="submit">Quests</button>
            </form>
                <form class="plan" action="plan" method="GET">
                    <button type="submit">Make your plan</button>
                </form>

            </div>
            <div class="row">
                <button>Settings</button>
                <form class="profile" action="profile" method="GET">
                    <button type="submit">Profile</button>
                </form>

            </div>
            <div class="logout">
                <form class="box2" action="logout" method="GET">
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        
        
    </div>
    <?php endif; ?>
</body>