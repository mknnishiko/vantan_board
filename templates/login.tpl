<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
    </head>
    <body>
        {include file="./common/header.tpl"}
        <h1>ログイン</h1>
        <div>
            <div style="color: red">
                {$message}
            </div>
            <div>
                <form action="./login.php" method="post">
                    <label>メールアドレス: <input type="email" name="email"/></label><br/>
                    <label>パスワード: <input type="password" name="password"/></label><br/>
                    <input type="submit" value="ログイン">
                </form>
            </div>
        </div>
    </body>
</html>
