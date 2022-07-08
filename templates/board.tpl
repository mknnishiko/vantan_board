<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{$board->title}</title>
    </head>
    <body>
        {include file="./common/header.tpl"}
        <h1>{$board->title}</h1>
        <div>
            <ul>
                {foreach from=$commentList item=comment}
                    <li>{$comment->comment} {$comment->name}</li>
                {/foreach}
            </ul>
        </div>
        {if !empty($user)}
        <div>
            <form action="/vantan_board/board.php?id={$board->id}" method="post">
                <label>コメント: <input type="text" name="message"/></label><br/>
                <input type="submit" value="コメントする">
            </form>
        </div>
        {/if}
    </body>
</html>
