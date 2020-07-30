<?php
session_start();
include('functions.php');
check_session_id();

// 受け取ったデータを変数に入れる
$nameid = $_POST['nameid'];
$bio = $_POST['bio'];
$age = $_POST['age'];
$username = $_SESSION['username'];
$password = $_POST['password'];
$id = $_POST["id"];
$is_admin = $_POST['is_admin'];
$is_deleted = $_POST['is_deleted'];


if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $uploadedFileName = $_FILES['upfile']['name'];
    $tempPathName = $_FILES['upfile']['tmp_name'];
    $fileDirectoryPath = 'upload/*';

    $extension = pathinfo($uploadedFileName, PATHINFO_EXTENSION);
    $uniqueName = date('YmdHis') . md5(session_id()) . "." . $extension;
    $fileNameToSave = $fileDirectoryPath . $uniqueName;
    // var_dump($fileNameToSave);
    // exit();

    if (is_uploaded_file($tempPathName)) {
        if (move_uploaded_file($tempPathName, $fileNameToSave)) {
            chmod($fileNameToSave, 0644);
        }
    } else {
        exit('SAVE FAILED');
    }
} else {
    exit('NO IMAGE FOUND, UPLOAD FAILED');
}

$pdo = connect_to_db();

$sql = 'UPDATE users_table SET username=:username, name=:name, password=:password, image=:image, age=:age, bio=:bio,created_at=sysdate(), updated_at=sysdate() WHERE id=:id';

// $sql = 'INSERT INTO users_table(id, username, name, password, image, age, bio, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :username, :name, :password,:image, :age, :bio, 0, 0,  sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':name', $nameid, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':image', $fileNameToSave, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':bio', $bio, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':is_admin', $is_admin, PDO::PARAM_INT);
// $stmt->bindValue(':is_deleted', $is_deleted, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:profile.php");
    exit();
}
