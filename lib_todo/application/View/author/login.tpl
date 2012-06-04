<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8" />
        <title>ログイン | {$config.site_title}</title>
    </head>
    <body>
        <form action="{$config.self}" method="post">
            Userid : <input type="text" name="user_name" value="{$user_name|entity}" /><br />
            Passwd : <input type="password" name="passwd" value="{$passwd|entity}" /><br />
            <input type="submit" value="ログイン" />
        </form>
    </body>
</html>