<?php

namespace App\Services;
require_once '../config/init.php';
require_once '../Repositories/CommentsRepository.php';

use App\Repositories\CommentsRepository;
use App\Repositories\Database;


class CommentsService
{
    private CommentsRepository $comments_db;

    public function __construct()
    {
        $this->comments_db = new CommentsRepository();
    }

    public function addComment($userId, $text)
    {
        return $this->comments_db->addComment($userId, $text);
    }
    
    public function getComments()
    {
        return $this->comments_db->getComments();
    }
    
    public function deleteComment($commentId)
    {
        return $this->comments_db->deleteComment($commentId);
    }
    
    public function getLatestComment()
    {
        return $this->comments_db->getLatestComment();
    }

    public function updateComment(mixed $commentId, string $trim)
    {
        return $this->comments_db->updateComment($commentId, $trim);
    }

    public function getCommentById($commentId)
    {
        return $this->comments_db->getCommentById($commentId);
    }

}
