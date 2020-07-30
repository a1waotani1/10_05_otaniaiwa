<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Document</title>
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
    <div class="mainquestion">
        <div>
            <h3>好みの食事</h3>
            <input type="radio" id="foodtype1" name="foodtype">
            <label for="foodtype1">和食</label>
            <input type="radio" id="foodtype2" name="foodtype">
            <label for="foodtype2">洋食</label>
            <input type="radio" id="foodtype3" name="foodtype">
            <label for="foodtype3">中華</label>
            <input type="radio" id="foodtype4" name="foodtype">
            <label for="foodtype4">エスニック</label>
            <input type="radio" id="foodtype5" name="foodtype">
            <label for="foodtype5">スイーツ</label>
            <input type="radio" id="foodtype6" name="foodtype">
            <label for="foodtype6">スナック</label>
            <input type="radio" id="foodtype7" name="foodtype">
            <label for="foodtype7">その他</label>
        </div>
        <div>
            <h3>価格帯</h3>
            <select name="price" id="price">
                <option value="cheapest">500円以内</option>
                <option value="mid1">1000円以内</option>
                <option value="mid2">3000円以内</option>
                <option value="mid3">5000円以内</option>
                <option value="mid4">10000円以内</option>
                <option value="mid5">15000円以内</option>
                <option value="mid6">20000円以内</option>
                <option value="mid7">25000円以内</option>
            </select>
        </div>
        <div>
            <h3>会う時間帯</h3>
            <input type="checkbox" name="time" id="time1">
            <label for="time1">朝ごはん（6時〜11時）</label>
            <input type="checkbox" name="time" id="time2">
            <label for="time2">ランチ（12時〜14時）</label>
            <input type="checkbox" name="time" id="time3">
            <label for="time3">お茶（15時〜17時）</label>
            <input type="checkbox" name="time" id="time4">
            <label for="time4">夜ご飯（18時〜24時以降）</label>
        </div>
    </div>
</body>

</html>