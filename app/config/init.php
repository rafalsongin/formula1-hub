<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
        session_unset();
        session_destroy(); 
        header('Location: /login');
    }
    $_SESSION['last_activity'] = time();
}
