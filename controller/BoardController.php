<?php

require_once __DIR__ . '/BaseController.php';
require_once  __DIR__ . '/../libs/dao/CommentDao.php';

class IndexController extends BaseController {

    // 読み込むテンプレートファイルを設定
    protected $template = 'templates/board.tpl';

    // ログイン必須でなくす
    protected $isLogin = false;

    protected function main($boardId)
    {
        // 掲示板情報を取得しsmarty変数に値を受け渡す
        $boardDao = new BoardDao();
        $this->smarty->assign('board', $boardDao->findById($boardId));

        // コメント情報を取得しsmarty変数に値を受け渡す
        $commentDao = new CommentDao();
        $this->smarty->assign('commentList', $commentDao->findAll());

        // 入力されたコメントをinsertする
        if (!empty($_POST['message'])) {
            $commentDao = new CommentDao();
            $this->smarty->assign('comment', $commentDao->insert($boardId, $_POST['message']));
        }
    }
}
