<header>
    <div>
        <a href="/vantan_board/index.php">TOP</a>
        <a href="/vantan_board/register.php">新規作成</a>
        {if !empty{$user}}
            <a href="/vantan_board/login.php">ログイン</a>
            <a href="/vantan_board/create_board.php">掲示板作成</a>
        {else}
            <a href="/vantan_board/logout.php">ログアウト</a>
        {/if}
    </div>
</header>
