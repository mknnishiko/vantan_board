<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>掲示板新規作成</title>
    </head>
    <body>
        {include file="./common/header.tpl"}
        <h1>新規掲示板作成</h1>
        <div>
            <div style="color: red">
                <?php echo $message; ?>
            </div>
            <div>
                <form action="/vantan_board/create_board.php" method="post">
                    <label>タイトル: <input type="text" name="title"/></label><br/>
                    <input type="submit" value="新規作成">
                </form>
            </div>
        </div>
    </body>
</html>
