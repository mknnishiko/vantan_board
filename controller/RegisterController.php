<?php

require_once __DIR__ . '/BaseController.php';
require_once  __DIR__ . '/../libs/dao/UserDao.php';

class RegisterController extends BaseController {

    // 読み込むテンプレートファイルを設定
    protected $template = 'templates/register.tpl';

    // ログイン必須でなくす
    protected $isLogin = False;

    protected function main()
    {
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])) {
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
        
            $userDao = new UserDao();
            $user = $userDao->insert($email, $password, $name);

            if($user) {
                $this->smarty->assign('message', 'ユーザーを作成しました');
                $_SESSION['id'] = $user;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('Location: /vantan_board/index.php');
                exit;
            } else {
                $this->smarty->assign('message', 'ユーザーの作成に失敗しました');
            }
        }
    }
}
