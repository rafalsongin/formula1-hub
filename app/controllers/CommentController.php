<?php
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../views/CommentView.php';
require_once '../config/init.php';


class CommentController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new Comment();
        $this->view = new CommentView();
    }

    public function index() {
        $comments = $this->model->getAll();
        return $this->view->showComments($comments);
    }

    // Implement methods like create, update, delete, etc.
}