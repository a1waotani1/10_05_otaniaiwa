<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['id'];

$pdo = connect_to_db();

$sql = "SELECT * FROM users_table";

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record['username']}</td>";
        // $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td >";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($value);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>ホームページ</title>
</head>

<body>
    <div class="header_img">
        <nav class="navtop">
            <div class="header">
                <h1>makan</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i></a>
                <a href="#"><i class="fas fa-plus-circle"></i></i></a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </nav>
        <p class="tagline">answer a few questions and find your match now!</p>
        <a href="question.php"><button class="match_btn">FIND MATCH</button></a>
    </div>
    <div class="mainpage">
        <div class="main_content">
            <h2>WELCOME BACK <?= $_SESSION['username'] ?>!</h2>
        </div>

    </div>
</body>

</html>