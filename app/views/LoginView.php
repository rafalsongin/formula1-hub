<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Already a client? Sign In</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ensure the path to styles.css is correct -->
    <link href="../public/css/styles.css" rel="stylesheet" type="text/css">
    
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            background: #fff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 1.5rem;
            color: #d32f2f; /* Red color for the header */
            margin-bottom: 1rem;
            text-align: center;
        }

        .sign-in {
            color: #d32f2f; /* Red color for the sign-in link */
            text-decoration: none;
        }

        .forgot-password {
            color: #d32f2f; /* Red color for the forgot-password link */
            font-size: .875rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .btn-sign-in {
            color: #fff !important; /* White text for the button */
            background-color: #d32f2f !important; /* Red color for the button */
            border-color: #d32f2f !important;
        }

        .btn-sign-in:hover {
            background-color: #a10d0d !important; /* Darker red for the hover state */
            border-color: #a10d0d !important;
        }

        .sign-in, .forgot-password {
            color: #d32f2f !important; /* Red color for the links */
        }

        .sign-in:hover, .forgot-password:hover {
            text-decoration: underline;
        }

        /* Ensure form-control overrides Bootstrap styles */
        .form-control {
            border: 1px solid #ced4da !important;
            box-shadow: none !important; /* Remove Bootstrap's box-shadow if any */
        }


        /* Responsive padding */
        @media (max-width: 768px) {
            .login-wrapper {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<?php include('Header.php'); ?>

<div class="container">
    <div class="login-wrapper">
        <h2 class="text-center mb-4">Already a client? <a href="#" class="sign-in">Sign In</a></h2>
        <form method="post" action="/login">
            <div class="form-group">
                <input type="email" class="form-control" name="username" id="username" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <!-- Use custom class for the sign-in button -->
            <button type="submit" class="btn btn-block btn-sign-in" name="login">SIGN IN</button>
            <p class="text-center mt-3"><a href="#" class="forgot-password">Forgot your password?</a></p>
        </form>
    </div>
</div>

</body>
</html>
