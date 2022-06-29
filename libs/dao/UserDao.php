<?php
 
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/../entity/BoardEntity.php';

class UserDao extends Database
{
    public function findByEmail($email)
    {
        $sql = 'SELECT * FROM `users` WHERE email = :email AND password = :password';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        return empty($user) ? null : new UserEntity($user);
    }
}