<?php

class UserEntity {

    public $id;
    private $mail;
    private $password;
    public $name;
    public $createdAt;
    public $updatedAt;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->mail = $data['email'];
        $this->password = $data['password'];
        $this->name = $data['name'];
        $this->created = $data['createdAt'];
        $this->modified = $data['updatedAt'];
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}
