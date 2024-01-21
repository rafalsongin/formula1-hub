<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/auth_styles.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php include('Header.php'); ?>

<div class="container">
    <div class="login-wrapper">
        <h2 class="text-center mb-4">New here? Register</h2>
        <form method="post" action="/auth-endpoint">
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-block btn-sign-in" name="register" rel="/auth-endpoint">REGISTER</button>
            <p class="text-center mt-3"><a href="/login" class="second-option">Login here</a></p>
        </form>
    </div>
</div>
</body>
</html>
