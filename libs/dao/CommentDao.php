<?php
 
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/../entity/CommentEntity.php';

class CommentDao extends Database
{
    /**
     * コメントを作成する
     * @param $title
     * @return bool|string
     */
    public function insert($boardId, $comment)
    {
        $sql = 'INSERT INTO `comments` (boardId, userId, comment, createdAt)';
        $sql .= ' VALUES (:comment, NOW())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':comment', $comment, \PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            return $this->pdo->lastInsertId();
        } else {
            return false;
        }
    }
    /**
     * コメントを取得する
     * @return array
     */
    public function findAll() {
        $sql = 'SELECT * FROM `comments` LEFT JOIN `users` ON comments.userId = users.id WHERE boardId = :boardId ORDER BY comments.createdAt';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $commentList = [];
        foreach ($stmt->fetchAll() as $data) {
            $commentList[] = new CommentEntity($data);
        }
        return $commentList;
    }
}
