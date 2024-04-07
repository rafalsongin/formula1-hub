<?php
require_once '../config/init.php';

include ('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/standing_style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Driver Standings Column -->
            <div class="col-md-6">
                <h2 class="mb-4">F1 Driver Standings 2023</h2>
                <?php if (empty($driverStandings)): ?>
                    <p>No driver standings available.</p>
                <?php else: ?>
                    <?php foreach ($driverStandings as $standing): ?>
                        <div class="standing-card">
                            <img src="/assets/images/drivers/<?= $standing['Driver']['driverId'] ?>.png"
                                alt="<?= $standing['Driver']['givenName'] . ' ' . $standing['Driver']['familyName'] ?>"
                                class="standing-image">
                            <div>
                                <h3>
                                    <?= $standing['position'] ?>.
                                    <?= $standing['Driver']['givenName'] . ' ' . $standing['Driver']['familyName'] ?> (<?= $standing['Driver']['code'] ?>)
                                </h3>
                                <p>
                                    <strong>Points:</strong>
                                    <?= $standing['points'] ?><br>
                                    <strong>Wins:</strong>
                                    <?= $standing['wins'] ?><br>
                                    <strong>Nationality:</strong>
                                    <?= $standing['Driver']['nationality'] ?><br>
                                    <strong>Team:</strong>
                                    <?= $standing['Constructors'][0]['name'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Constructor Standings Column -->
            <div class="col-md-6">
                <h2 class="mb-4">F1 Constructor Standings 2023</h2>
                <?php if (empty($constructorStandings)): ?>
                    <p>No constructor standings available.</p>
                <?php else: ?>
                    <?php foreach ($constructorStandings as $standing): ?>
                        <div class="standing-card">
                            <img src="/assets/images/constructors/<?= $standing['Constructor']['constructorId'] ?>.avif"
                                alt="<?= $standing['Constructor']['constructorId'] ?>" class="standing-image">
                            <div>
                                <h3>
                                    <?= $standing['position'] ?>. <?= $standing['Constructor']['name'] ?>
                                </h3>
                                <p>
                                    <strong>Points:</strong>
                                    <?= $standing['points'] ?><br>
                                    <strong>Wins:</strong>
                                    <?= $standing['wins'] ?><br>
                                    <strong>Nationality:</strong>
                                    <?= $standing['Constructor']['nationality'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>