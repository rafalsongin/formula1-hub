<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet" type="text/css"> <!--Not working -->
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

        .message-wrapper {
            width: 100%;
            max-width: 400px;
            background: #fff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 1.5rem;
            color black; /* Red color for the header */
            margin-bottom: 1rem;
            text-align: center;
        }

        .btn-sign-in {
            color: #fff !important; /* White text for the button */
            background-color: #d32f2f !important; /* Red color for the button */
            border-color: #d32f2f !important;
            display: block;
            margin: 0 auto;
        }

        .btn-sign-in:hover {
            background-color: #a10d0d !important; /* Darker red for the hover state */
            border-color: #a10d0d !important;
        }

        /* Add padding to the link */
        .message-wrapper p {
            text-align: center;
            margin-bottom: 1rem;
        }

        /* Responsive padding */
        @media (max-width: 768px) {
            .message-wrapper {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<?php include('Header.php'); ?>

<div class="container">
    <div class="message-wrapper">
        <h2 class="text-center mb-4">Registration Successful</h2>
        <p class="text-center">You have successfully registered. Please log in to continue.</p>
        <p><a href="/login" class="btn btn-block btn-sign-in">Log in</a></p>
    </div>
</div>

</body>
</html>
