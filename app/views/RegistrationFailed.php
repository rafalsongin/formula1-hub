<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/register_endpoint_styles.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php include('Header.php'); ?>

<div class="container">
    <div class="message-wrapper">
        <h2 class="text-center mb-4">Registration Failed!</h2>
        <p class="text-center">You couldn't register. User with this username or email already exists.</p>
        <p><a href="/register" class="btn btn-block btn-sign-in">Register</a></p>
    </div>
</div>

</body>
</html>
