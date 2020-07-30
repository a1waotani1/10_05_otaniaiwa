<?php
include("functions.php");

$username = $_POST["username"];
$password = $_POST["password"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    // usernameが1件以上該当した場合はエラーを表示して元のページに戻る
    // $count = $stmt->fetchColumn();
    echo "<p>すでに登録されているユーザです．</p>";
    echo '<a href="login.php">LOGIN</a>';
    exit();
}

$sql = 'INSERT INTO users_table(id, username, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :password, 0, 0, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:user_profile.php");
    exit();
}
