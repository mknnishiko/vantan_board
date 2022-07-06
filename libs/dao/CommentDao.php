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
    public function insert($boardId, $message)
    {
        $comment = htmlspecialchars($message, ENT_QUOTES, "UTF-8");

        $sql = 'INSERT INTO `comments` (boardId, userId, comment, createdAt)';
        $sql .= ' VALUES (:boardId, :userId, :comment, NOW())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':boardId', $boardId, \PDO::PARAM_STR);
        $stmt->bindValue(':userId', $_SESSION['id'], PDO::PARAM_INT);
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
    public function findByBoardId($id) {
        $sql = 'SELECT * FROM `comments` LEFT JOIN `users` ON comments.userId = users.id WHERE boardId = :boardId ORDER BY comments.createdAt';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':boardId', $id, PDO::PARAM_STR);
        $stmt->execute();
        $commentList = [];
        foreach ($stmt->fetchAll() as $data) {
            $commentList[] = new CommentEntity($data);
        }
        return $commentList;
    }
}
