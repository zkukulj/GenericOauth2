<?php

session_start();

if (!array_key_exists('uid', $_SESSION)) {
    ?>
    <!DOCTYPE html>
        <html>
        <title>Login to authorization server</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <body>
            <div class="w3-container">
                <h1>Please log in (use oauth/1234)</h1>
                <form method="post" action="do_login.php">
                    <p>Username: <input class="w3-input" name="username" type="text"/></p>
                    <p>Password: <input class="w3-input" name="password" type="password"/></p>
                    <input type="hidden" name="callback" value="<?php echo $_GET['callback'];?>"/>
                    <p><input class="w3-button w3-indigo" type="submit"/></p>
                </form>
            </div>
         </body>
    </html>
    <?php
} else {
    if (array_key_exists('callback', $_SESSION)) {
        header('Location: '.$_SESSION['callback']);
    }
}