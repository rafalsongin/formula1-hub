<?php
//ob_start(); // Start output buffering
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
        // last request was more than 30 minutes ago (1800 seconds)
        session_unset();     // unset $_SESSION variable
        session_destroy();   // destroy session data
        header('Location: /login'); // redirect to login page
    }
    $_SESSION['last_activity'] = time(); // update last activity time
}
