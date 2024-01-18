<!DOCTYPE html>
<head>
    <title>SIGN IN PAGE</title>
    <link rel="stylesheet" type="text/css" href="public/css/style1.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
</head>
<body>
<div class="container">
    <div class="form-container sign-in">
        <form class="login" action="register" method="POST">
            <h1>Sign Up</h1>
            E-mail
            <input name="email" type="text" placeholder="email@email.com">
            Nickname
            <input name="name" type="text" placeholder="Nickname">
            Password
            <input name="password" type="password" placeholder="password">
            Confirm Password
            <input name="confirm-password" type="password" placeholder="confirm-password">
            <button type="submit">Sign Up</button>
        </form>

        <form class="back" action="index" method="GET">
            <button type="submit">Back</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <img src="public/img/MyPlanner.svg">
            </div>
        </div>
    </div>
</div>
</body>