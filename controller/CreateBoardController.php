<?php

require_once __DIR__ . '/BaseController.php';
require_once  __DIR__ . '/../libs/dao/BoardDao.php';

class CreateBoardController extends BaseController {

    // 読み込むテンプレートファイルを設定
    protected $template = 'templates/create_board.tpl';

    // ログイン必須
    protected $isLogin = True;

    protected function main()
    {
        // 入力されたタイトルをinsertする
        if (!empty($_POST['title'])) {
            $boardDao = new BoardDao();
            $this->smarty->assign('board', $boardDao->insert($_POST['title'], $_SESSION['id']));
        }

    }
}
