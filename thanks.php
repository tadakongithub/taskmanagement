<?php

session_start();

if (isset($_SESSION['username'])){
    $login = true;
} else {
    header('Location: login.php');
}

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="thanks_body">
        <div class="thanks">
            <h1 class="hard_work">Thank You for Your Hard Work!</h1>

            <div class="two_buttons">
                <div class="to_table"><a href="index.php">TABLE</a></div>
                <div class="to_progress"><a href="progress.php">BACK</a></div>
            </div>
        </div>
    </body>
</html>