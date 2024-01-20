<?php

namespace App\Views;

class HomeView {
    public function showHomePage() {

        include('header.php');

        // HTML header
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Home Page</title>';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '</head>';
        echo '<body>';

        // Bootstrap container
        echo '<div class="container mt-5">';
        echo '<h1>Welcome to the Home Page</h1>';
        echo '<p>This is your home page content. You can customize it as needed.</p>';
        echo '</div>';

        // Bootstrap container closing tag
        echo '</div>';

        // HTML footer
        echo '</body>';
        echo '</html>';
    }
}
