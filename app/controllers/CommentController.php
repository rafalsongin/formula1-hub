<?php

require_once '../config/init.php';
require_once '../Repositories/Database.php';
require_once '../services/CommentsService.php';
require_once '../services/AuthService.php';

use App\Services\AuthService;
use App\Services\CommentsService;

class CommentController
{
    private $view;
    private $commentsService;
    private $authService;

    public function __construct()
    {
        $this->commentsService = new CommentsService();
        $this->authService = new AuthService();
    }

    public function index() {
        $comments = $this->commentsService->getComments();
        include '../views/CommentsView.php';
    }

    public function add()
    {
        header('Content-Type: application/json');
        
        $username = $_SESSION['username'] ?? null;
        $commentText = $_POST['commentText'] ?? '';
        
        $user_id = $this->authService->getUserId($username);
        
        if ($user_id && trim($commentText) !== '') {
            $success = $this->commentsService->addComment($user_id, trim($commentText));

            if ($success) {
                $newComment = $this->commentsService->getLatestComment();
                echo json_encode(['success' => true, 'message' => 'Comment added successfully', 'comment' => $newComment]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add comment']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $commentId = $data['commentId'] ?? null;

        if ($commentId) {
            $success = $this->commentsService->deleteComment($commentId);

            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Comment deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete comment. PHP file']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }

    public function update()
    {
        header('Content-Type: application/json');

        $data = json_decode(file_get_contents('php://input'), true);
        $commentId = $data['commentId'] ?? null;
        $newText = $data['newText'] ?? '';

        if ($commentId && trim($newText) !== '') {
            $success = $this->commentsService->updateComment($commentId, trim($newText));

            if ($success) {
                // Fetch the updated comment including the username
                $updatedComment = $this->commentsService->getCommentById($commentId);
                echo json_encode(['success' => true, 'message' => 'Comment updated successfully', 'comment' => $updatedComment]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update comment']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid input']);
        }
    }



}
