<?php
namespace App\Repositories;

require_once '../config/init.php';
require_once '../Repositories/Database.php';
require_once '../models/Comment.php';

use Comment;
use PDO;
use PDOException;

class CommentsRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    
    // COMMENTS 
    public function addComment($userId, $text) {
        $sql = "INSERT INTO comments (user_id, text) VALUES (:userId, :text)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':text', $text);
        return $stmt->execute();
    }

    public function getComments() {
        $sql = "SELECT comments.*, users.username FROM comments 
            JOIN users ON comments.user_id = users.id
            ORDER BY comments.created_at ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $comments = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($row['id'], $row['user_id'], $row['username'], $row['text'], $row['created_at'], $row['updated_at']);
        }
        return $comments;
    }


    public function updateComment($commentId, $newText) {
        $sql = "UPDATE comments SET text = :text WHERE id = :commentId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':text', $newText);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function deleteComment($commentId) {
        $sql = "DELETE FROM comments WHERE id = :commentId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getLatestComment() {
        $sql = "SELECT comments.*, users.username FROM comments 
            JOIN users ON comments.user_id = users.id 
            ORDER BY comments.created_at DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentById($commentId) {
        $sql = "SELECT comments.*, users.username FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.id = :commentId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
