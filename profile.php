<?php
session_start();
include("functions.php");
check_session_id();

// ユーザ名取得
$user_id = $_SESSION['id'];

// DB接続
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:user_id';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td><img src='{$record["image"]}' height=150px></td>";
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<td>{$record["name"]}</td>";
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<td>{$record["age"]}歳</td>";
        $output .= "</tr>";
        $output .= "<tr>";
        $output .= "<td>{$record["bio"]}</td>";
        $output .= "</tr>";
        // $output .= "<td>{$record["deadline"]}</td>";
        // $output .= "<td>{$record["todo"]}</td>";
        // $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
        // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
        // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
        // // 画像出力を追加しよう
        // $output .= "<td><img src='{$record["image"]}' height=150px></td>";
        // $output .= "</tr>";
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
    <div class="profile">
        <table>
            <tr>
                <td class="username"><?= $_SESSION['username'] ?></td>
            </tr>
            <?= $output ?>
            <tr>
                <td><a href="profile_edit.php?id=<?= $_SESSION['id'] ?>"><button class="profile_btn">EDIT PROFILE</button></a></td>
            </tr>
        </table>
    </div>

</body>

</html>