<?php

namespace App\Views;

class RaceView
{
    public function showRaces($races)
    {
        include('header.php');
        
        // HTML header
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>F1 Races</title>';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '</head>';
        echo '<body>';

        // Bootstrap container
        echo '<div class="container mt-5">';
        echo '<h1>F1 Races</h1>';

        // Check if there are any races to display
        if (empty($races)) {
            echo '<p>No races available.</p>';
        } else {
            // Display race information in a Bootstrap table
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Race Name</th>';
            echo '<th>Date</th>';
            echo '<th>Track</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($races as $race) {
                echo '<tr>';
                echo '<td>' . $race['raceName'] . '</td>';
                echo '<td>' . $race['date'] . '</td>';
                echo '<td>' . $race['Circuit']['circuitName'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }

        // Bootstrap container closing tag
        echo '</div>';

        // HTML footer
        echo '</body>';
        echo '</html>';
    }
}
