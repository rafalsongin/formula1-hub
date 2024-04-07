<?php

include ('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/race_styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">F1 Races 2023</h1>
        <?php if (empty($races)): ?>
            <p>No races available.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($races as $race): ?>
                    <div class="col-md-4">
                        <div class="race-card">
                            <?php
                            $raceId = $race['Circuit']['circuitId'];
                            $raceUrl = $race['Circuit']['url'];
                            $imageSrc = "/assets/images/circuits/{$raceId}.png";
                            ?>
                            <a href="<?= $raceUrl ?>" target="_blank">
                                <img src="<?= $imageSrc ?>" alt="<?= $race['raceName'] ?>" class="circuit-card">
                            </a>
                            <h3>
                                <?= $race['raceName'] ?>
                            </h3>
                            <p>
                                <strong>Date:</strong>
                                <?= htmlspecialchars($race['date']) ?><br>
                                <strong>Circuit:</strong>
                                <?= $race['Circuit']['circuitName'] ?><br>
                                <strong>City:</strong>
                                <?= $race['Circuit']['Location']['locality'] ?><br>
                                <strong>Country:</strong>
                                <?= $race['Circuit']['Location']['country'] ?><br>
                                <strong><a href="<?= $race['url'] ?>" target="_blank">Report</a></strong>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>