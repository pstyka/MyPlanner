<!DOCTYPE html>
<head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="public/css/style1.css">
</head>
<body>
    <div class="container">
        <div class="form-container sign-in">
            <form class="login" action="login" method="POST">

                <h1>Sign In</h1>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <div class="messages">
                    <?php if(isset($messages)){

                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="log-but">
                    <button type="submit">Login</button>
                </div>
            </form>
            <form class="under-login" action="sign" method="GET">
                <button type="submit">Sign Up</button>
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