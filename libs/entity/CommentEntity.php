<?php

class commentEntity
{
    public $id;
    public $boardId;
    public $userId;
    public $comment;
    public $createdAt;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->boardId = $data['boardId'];
        $this->userId = $data['userId'];
        $this->comment = $data['comment'];
        $this->createdAt = $data['createdAt'];
    }
}
