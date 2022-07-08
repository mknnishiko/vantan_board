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
            $this->boardDao = new BoardDao();
            $this->board = $this->boardDao->insert($_POST['title'], $_SESSION['id']);
            $this->smarty->assign('board', $board);

            // 成功したら掲示板へリダイレクト
            if ($this->board) {
                header('Location: ./board.php?id=' . $this->board);
            }else {
                $this->smarty->assign('message', '掲示板の作成に失敗しました');
            }
        }
    }
}
