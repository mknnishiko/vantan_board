<?php

class BoardEntity {

    public $id;
    public $title;
    public $createdAt;
    public $updatedAt;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->userId = $data['userId'];
        $this->title = $data['title'];
        $this->createdAt = $data['createdAt'];
        $this->updatedAt = $data['updatedAt'];
    }
}
