<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 HUB</title>
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container" id="headerContainer">
            <a href="https://www.formula1.com/" target="_blank">
                <img src="/assets/images/logo.jpg" alt="F1 Logo" width="50" height="50" class="d-inline-block align-top navbar-logo" title="">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/race">Races</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/driver">Drivers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/constructor">Constructors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/standing">Standings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/comment">Comments</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <li class="nav-item">
                            <span class="navbar-text username">
                                <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/auth/register">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container mt-5">
