<?php

namespace App\Views;
class DriverView
{
    public function showDrivers($drivers)
    {
        include('header.php');
        
        // HTML header
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>F1 Drivers</title>';
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
        echo '</head>';
        echo '<body>';

        // Bootstrap container
        echo '<div class="container mt-5">';
        echo '<h1>F1 Drivers</h1>';

        // Check if there are any drivers to display
        if (empty($drivers)) {
            echo '<p>No drivers available.</p>';
        } else {
            // Display driver information in a Bootstrap table
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Driver ID</th>'; // Added Driver ID
            echo '<th>Driver Name</th>';
            echo '<th>Nationality</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($drivers as $driver) {
                echo '<tr>';
                echo '<td>' . $driver['driverId'] . '</td>'; // Display Driver ID
                echo '<td>' . $driver['givenName'] . ' ' . $driver['familyName'] . '</td>';
                echo '<td>' . $driver['nationality'] . '</td>';
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
