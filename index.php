<?php
session_start();

$message = '';
try {
    $DBSERVER = 'localhost';
    $DBUSER = 'board';
    $DBPASSWD = 'boardpw';
    $DBNAME = 'board';

    $dsn = 'mysql:'
        . 'host=' . $DBSERVER . ';'
        . 'dbname=' . $DBNAME . ';'
        . 'charset=utf8';
    $pdo = new PDO($dsn, $DBUSER, $DBPASSWD, array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (Exception $e) {
    $message = "接続に失敗しました: {$e->getMessage()}";
}

$sql = 'SELECT * FROM boards, users WHERE boards.userId=users.id ORDER BY boards.id DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$boards = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>トップ</title>
</head>
<body>
<header>
    <div>
        <a href="/vantan_board/index.php">TOP</a>
        <a href="/vantan_board/register.php">新規作成</a>
        <a href="/vantan_board/login.php">ログイン</a>
        <a href="/vantan_board/logout.php">ログアウト</a>
        <a href="/vantan_board/create_board.php">掲示板作成</a>
    </div>
    <h1>トップ</h1>
</header>
<div>
    <?php echo "{$_SESSION['name']}さんようこそ"; ?>
</div>
<div>
    <h2>掲示板一覧</h2>
    <ul>
    <?php
    foreach ($boards as $board) {
        echo "<li><a href=\"/vantan_board/board.php?id={$board['id']}\" >{$board['title']} {$board['name']}</a></li>";
    }
    ?>
    </ul>
</div>
</body>
</html>

