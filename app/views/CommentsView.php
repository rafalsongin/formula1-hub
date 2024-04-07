<?php

include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/comments_styles.css">
</head>

<body>
    <div class="container mt-5" id="commentsContainer">
        <h1 class="mb-4">Comments</h1>
        <div id="commentsList">
            <?php if (empty($comments)): ?>
                <p>No comments available.</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="card mb-3" id="comment-<?= $comment->id ?>">
                        <div class="form-group card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($comment->username) ?>
                            </h5>
                            <p class="card-text">
                                <?= htmlspecialchars($comment->text) ?>
                            </p>
                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $comment->username): ?>
                                <button onclick="deleteComment(<?= $comment->id ?>)" class="btn btn-danger btn-sm">Delete</button>
                                <button onclick="showEditInterface(<?= $comment->id ?>)"
                                    class="btn btn-secondary btn-sm">Edit</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="/js/comments.js"></script>


    <form method="post" action="/comment/add" id="commentForm">
        <div class="form-group">
            <label for="commentText">Your Comment:</label>
            <textarea class="form-control" id="commentText" name="commentText" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Post Comment</button>
    </form>
</body>

</html>