<?php

include ('Header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>

<body>
    <img src="/assets/images/homepage.jpg" alt="Background Image"
        title="&copy; 2003-2024 Formula One World Championship Limited" class="background-image">
    <div class="container mt-5 bg-white text-center p-4 border border-dark">
        <h1>Welcome to the Formula 1 Hub</h1>
        <p>This is your home page content. You can customize it as needed.</p>
    </div>
    <div class="link-blocks">
        <a href="/driver" class="a-link">
            <div class="link-content">
                <h2>Drivers</h2>
                <img src="/assets/images/driver-silhouette.png" alt="Drivers" />
            </div>
        </a>
        <a href="/race" class="a-link">
            <div class="link-content">
                <h2>Races</h2>
                <img src="/assets/images/racetrack-silhouette.png" alt="Races" />
            </div>
        </a>
        <a href="/constructor" class="a-link">
            <div class="link-content">
                <h2>Constructors</h2>
                <img src="/assets/images/constructor-silhouette.png" alt="Constructors" />
            </div>
        </a>
        <a href="/standing" class="a-link">
            <div class="link-content">
                <h2>Constructors</h2>
                <img src="/assets/images/standing-silhouette.png" alt="Standings" />
            </div>
        </a>
        <a href="/comment" class="a-link">
            <div class="link-content">
                <h2>Comments</h2>
                <img src="/assets/images/comments-icon.png" alt="Comments" />
            </div>
        </a>
    </div>
</body>

</html>