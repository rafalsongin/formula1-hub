<?php
//ob_start(); // Start output buffering
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
        // last request was more than 10min ago
        session_unset();
        session_destroy(); 
        header('Location: /login');
    }
    $_SESSION['last_activity'] = time();
}
