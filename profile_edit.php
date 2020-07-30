<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id'];
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:user_id';

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
    // 正常にSQLが実行された場合は指定の11レコードを取得
    // fetch()関数でSQLで取得したレコードを取得できる
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>プロフィールページ</title>
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
    </div>
    <div class="content">
        <form action="profile_file.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="file" name="upfile" accept="image/*" capture="camera">
            </div>
            <div>
                <?= $_SESSION['username'] ?>
            </div>
            <div>
                ユーザー名:<input type="text" name="username" value="<?= $_SESSION['username'] ?>">
            </div>
            <div>
                名前: <input type="text" name="nameid" value="<?= $record['name'] ?>">
            </div>
            <div>
                パスワード: <input type="text" name="password" value="<?= $record['password'] ?>">
            </div>
            <div>
                自己紹介: <textarea name="bio" id="" cols="30" rows="4" value="<?= $record['bio'] ?>"></textarea>
            </div>
            <div>
                年齢: <input type="number" id="" min="18" max="100" name="age" value="<?= $record['age'] ?>">
            </div>
            <!-- <div>
                好みの食事: <input type="radio" id="foodtype1" name="foodtype" value="0">
                <label for="foodtype1">和食</label>
                <input type="radio" id="foodtype2" name="foodtype" value="1">
                <label for="foodtype2">洋食</label>
                <input type="radio" id="foodtype3" name="foodtype" value="2">
                <label for="foodtype3">中華</label>
                <input type="radio" id="foodtype4" name="foodtype" value="3">
                <label for="foodtype4">エスニック</label>
                <input type="radio" id="foodtype5" name="foodtype" value="4">
                <label for="foodtype5">スイーツ</label>
                <input type="radio" id="foodtype6" name="foodtype" value="5">
                <label for="foodtype6">スナック</label>
                <input type="radio" id="foodtype7" name="foodtype" value="6">
                <label for="foodtype7">その他</label>
            </div> -->
            <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
            <input type="hidden" name="is_admin" value="<?= $record['is_admin'] ?>">
            <input type="hidden" name="is_deleted" value="<?= $record['is_deleted'] ?>">
            <div>
                <button class="savebtn">保存</button>
            </div>
        </form>
    </div>
</body>

</html>