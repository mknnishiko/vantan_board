<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>新規作成</title>
    </head>
    <body>
        {include file="./common/header.tpl"}
        <h1>新規作成</h1>
        <div>
            <div style="color: red">
                <p>{$message}</p>
            </div>
            <form action="/vantan_board/register.php" method="post">
                <label>メールアドレス: <input type="email" name="email"/></label><br/>
                <label>パスワード: <input type="password" name="password"/></label><br/>
                <label>名前: <input type="text" name="name"/></label><br/>
                <input type="submit" value="新規登録">
            </form>
        </div>
    </body>
</html>
