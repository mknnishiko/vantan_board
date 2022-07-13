<?php
 
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/../entity/BoardEntity.php';

class UserDao extends Database
{
    /**
     * 指定したメールアドレスのユーザーを取得する
     * @param $email
     * @return bool|string
     */
    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM `users` WHERE email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        return empty($user) ? null : new UserEntity($user);
    }

    /**
     * 指定したメールアドレスとパスワードのユーザーを取得する
     * @param $email $password
     * @return bool|string
     */
    public function findByEmailAndPassword($email, $password)
    {
        $sql = 'SELECT * FROM `users` WHERE email = :email AND password = :password';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        return empty($user) ? null : new UserEntity($user);
    }
}
