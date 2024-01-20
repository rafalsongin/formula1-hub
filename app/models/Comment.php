<?php

class Comment
{
    private int $id;
    private string $username;
    private string $comment;
    private string $date;

    public function __construct($id, $username, $comment, $date)
    {
        $this->id = $id;
        $this->username = $username;
        $this->comment = $comment;
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getComment()
    {
        return $this->comment;
    }

    public function getDate()
    {
        return $this->date;
    }
}
