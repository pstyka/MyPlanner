<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quests</title>
    <link rel="stylesheet" type="text/css" href="public/css/style1.css">
    <script type="text/javascript" src="public/js/quest.js" ></script>
</head>
<body>
<div class="quest-container">
    <div class="logo-quests">
        <img src="public/img/MyPlanner.svg">
        Quests
    </div>
    <section class="tasks">
        <div class="task-box">
            <div class="upper-task-box">
                <div class="task">

                </div>
                <div class="task-timer"></div>
            </div>
        </div>
    </section>
    <div class="under-tasks">
        <form class="back-profile" action="menu" method="GET">
            <button type="submit">Back</button>
        </form>
        <form class=back-profile action="drawQuest" method="GET">
            <button type="submit">Draw task</button>
        </form>
    </div>
</div>
</body>