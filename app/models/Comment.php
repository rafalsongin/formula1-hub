<?php

class Comment {
    public $id;
    public $userId;
    public $username;
    public $text;
    public $createdAt;
    public $updatedAt;

    public function __construct($id, $userId, $username, $text, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->userId = $userId;
        $this->username = $username;
        $this->text = $text;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
