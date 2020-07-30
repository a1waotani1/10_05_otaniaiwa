<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link href="style.css" rel="stylesheet">
</head>

<body class="registerBody">
    <div class="register">
        <h1>新規登録</h1>
        <form action="register_auth.php" method="POST" autocomplete="off">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="ユーザー名" id="username" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="パスワード" id="password" required>
            <input type="submit" value="新規登録">
        </form>
        <div class="backtologin">
            <a href="login.php"><input type="button" id="backtologin" value="ログインページへ戻る"></a>
        </div>
    </div>
</body>

</html>