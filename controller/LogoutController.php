<?php

require_once __DIR__ . '/BaseController.php';

class LogoutController extends BaseController {

    protected function beforeMain()
    {
        // セッション情報を空にして index.php にリダイレクトする
        $_SESSION = [];
        header('Location: /vantan_board/index.php');
        exit;
    }
}
