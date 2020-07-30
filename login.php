<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>ログイン</title>
</head>

<body class="loginBody">
    <div class="login">
        <h1>makan</h1>
        <form action="login_auth.php" method="POST">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="ユーザー名" id="username" required>
            <label for="password"><i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="パスワード" id="password" required>
            <input type="submit" id="submit" value="ログイン">
        </form>
        <div class="registerbtn">
            <a href="register.php"><input type="button" id="registerbtn" value="新規登録"></a>
        </div>
    </div>

</body>

</html>