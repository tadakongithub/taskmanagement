<?php
    try {
        $db = new PDO ('mysql:dbname=progress;host=localhost;charset=utf8', 'mamp', 'tadashi');
    } catch (PDOException $e) {
        echo 'DB接続エラー: '.$e->getMessage();
    }
?>
<?php

    session_start();

    if (!empty($_POST)){
        //どちらも入力されていれば
        if ($_POST['username'] != '' && $_POST['password'] != '') {
            $login = $db->prepare('SELECT * FROM login_1 WHERE username=? AND pass=?');
            $login->execute(array($_POST['username'], sha1($_POST['password'])));
            $member = $login->fetch();

            if ($member) {
                $_SESSION['username'] = $member['username'];

                if ($_POST['save'] == 'on') {
                    setcookie('username', $_POST['username'], time()+60*60*24*14);
                    setcookie('password', $_POST['password'], time()+60*60*24*14);
                }

                header('Location: progress.php');
            } else {
                $error['login'] = 'failed';
            }
        } else {
            $error['login'] = 'blank';
        }
    }

    if ($_COOKIE['username'] != '') {
        $_POST['username'] = $_COOKIE['username'];
        $_POST['password'] = $_COOKIE['password'];
        $_POST['save'] = 'on';
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="login_body">
    <div class="login_form">
    <h3>Grammar Dojo Task Management Tool</h3>
    <form action="" method="post">
    <dl>
        <label for="username">ユーザー名</label><br>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'], ENT_QUOTES);?>" class="login_input"> <br><br>
        <?php if ($error['login'] == 'failed') :?>
        <p class="error">Wrong username or password typed in</p>
        <?php endif ;?>
        <?php if ($error['login'] == 'blank') :?>
        <p class="error">Type in both your username and password</p>
        <?php endif ;?>
        <label for="password">パスワード</label><br>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES);?>" class="login_input"><br><br>
        <input id="save" type="checkbox" name="save" value="on" checked><label for="save">ログイン情報を保存しておく</label><br><br>
        <input type="submit" value="LOGIN" class="login_submit">
    </form>

    <p class="id-pass">This is no longer in use. Play around with it with username "konno" and password "tadashi".</p>
    </div>
    </body>
</html>



