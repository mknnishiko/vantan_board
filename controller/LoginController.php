<?php

require_once __DIR__ . '/BaseController.php';
require_once  __DIR__ . '/../libs/dao/UserDao.php';

class LoginController extends BaseController {

    // 読み込むテンプレートファイルを設定
    protected $template = 'templates/login.tpl';

    // ログイン必須でなくす
    protected $isLogin = False;

    protected function main()
    {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $this->email = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
            $this->password = htmlspecialchars($_POST['password'], ENT_QUOTES, "UTF-8");
        
            $this->userDao = new UserDao();
            $this->user = $this->userDao->findByEmailAndPassword($this->email, $this->password);

            if(!empty($this->user)) {
                $this->smarty->assign('message', 'ログインしました');
                $_SESSION['id'] = $this->user->id;
                $_SESSION['name'] = $this->user->name;
                $_SESSION['email'] = $this->user->email;
                $_SESSION['password'] = $this->user->password;
                header('Location: ./index.php');
                exit;
            } else {
                $this->smarty->assign('message', 'ログインに失敗しました');
            }
        }
    }
}
