<?php

require_once '../config/init.php';
require_once '../Repositories/Database.php';
require_once '../views/CommentsView.php';
require_once '../services/CommentsService.php';
require_once '../services/LoginService.php';

use App\Repositories\Database;
use App\Services\CommentsService;
use App\Views\CommentsView;

class CommentsController
{
    private $view;
    private $comments_service;
    private $user_service;

    public function __construct()
    {
        $this->view = new CommentsView();
        $this->comments_service = new CommentsService();
        $this->user_service = new LoginService();
    }

    public function showComments()
    {
        $comments = $this->comments_service->getComments();
        $this->view->showComments($comments);
    }

    public function addComment()
    {
        header('Content-Type: application/json');
        
        $username = $_SESSION['username'] ?? null;
        $commentText = $_POST['commentText'] ?? '';
        
        $user_id = $this->user_service->getUserId($username);
        
        if ($user_id && trim($commentText) !== '') {
            $success = $this->comments_service->addComment($user_id, trim($commentText));

            if ($success) {
                $newComment = $this->comments_service->getLatestComment();
                echo json_encode(['success' => true, 'message' => 'Comment added successfully', 'comment' => $newComment]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add comment']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }

    public function deleteComment()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $commentId = $data['commentId'] ?? null;

        if ($commentId) {
            $success = $this->comments_service->deleteComment($commentId);

            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Comment deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete comment. PHP file']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }

    public function updateComment()
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);
        $commentId = $data['commentId'] ?? null;
        $newText = $data['newText'] ?? '';

        if ($commentId && trim($newText) !== '') {
            $success = $this->comments_service->updateComment($commentId, trim($newText));

            if ($success) {
                // Fetch the updated comment including the username
                $updatedComment = $this->comments_service->getCommentById($commentId);
                echo json_encode(['success' => true, 'message' => 'Comment updated successfully', 'comment' => $updatedComment]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update comment']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }



}
