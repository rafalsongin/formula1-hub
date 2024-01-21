<?php
namespace App\Views;

require_once '../config/init.php';

class DriverView
{
    public function showDrivers($drivers)
    {
        include('header.php');
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="/css/driver_styles.css">
            <style>
                .driver-card {
                    border: 1px solid #ddd;
                    padding: 15px;
                    margin-bottom: 20px;
                }

                .driver-image {
                    max-width: 100px;
                    max-height: 100px;
                    border-radius: 50%;
                }
            </style>
        </head>
        <body>
        <div class="container mt-5">
            <h1 class="mb-4">F1 Drivers 2023</h1>
            <?php if (empty($drivers)): ?>
                <p>No drivers available.</p>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($drivers as $driver): ?>
                        <div class="col-md-4">
                            <div class="driver-card">
                                <?php
                                $driverFullName = strtolower(str_replace(' ', '_', $driver['givenName'] . ' ' . $driver['familyName']));
                                $imageSrc = "/assets/images/drivers/{$driverFullName}.png";
                                ?>
                                <img src="<?= $imageSrc ?>" alt="<?= $driver['givenName'] . ' ' . $driver['familyName'] ?>" class="driver-image">
                                <h3><?= $driver['givenName'] . ' ' . $driver['familyName'] ?></h3>
                                <p>
                                    <strong>Number:</strong> <?= $driver['permanentNumber'] ?><br>
                                    <strong>Nationality:</strong> <?= $driver['nationality'] ?><br>
                                    <strong><a href="<?= $driver['url'] ?>">Biography</a></strong>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        </body>
        </html>
        <?php
    }
}
