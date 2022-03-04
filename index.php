<?php

require_once __DIR__ . '/functions.php';

$dbh = connect_db();

$sql = 'SELECT * FROM animals';

$stmt = $dbh->prepare($sql);

$stmt->execute();

$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - INSERT</title>
</head>

<body>
    <h4>本日のご紹介ペット!</h4>
    <ul>
        <?php foreach ($animals as $animal) : ?>
            <p><?= h($animal['type']) . 'の' . h($animal['classification']) . 'ちゃん' ?><br>
            <p><?= h($animal['description']) ?></p>
            <p><?= h($animal['birthday']) . '生まれ' ?></p>
            <p><?= '出身地 ' . h($animal['birthplace']) ?></p><hr>
        <?php endforeach; ?>
    </ul>
</body>

</html>