<?php
namespace App\Views;

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
        <h1 class="mb-4">F1 Constructors 2023</h1>
        <?php if (empty($constructors)): ?>
            <p>No constructors available.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($constructors as $constructor): ?>
                    <div class="col-md-4">
                        <div class="race-card">
                            <?php
                            $constructorId = $constructor['constructorId'];
                            $constructorUrl = $constructor['url'];
                            $constructorName = $constructor['name'];
                            $constructorNationality = $constructor['nationality'];
                            $imageSrc = "/assets/images/constructors/{$constructorId}.avif";
                            ?>
                            <a href="<?= $constructorUrl ?>" target="_blank">
                                <img src="<?= $imageSrc ?>" alt="<?= $constructorName ?>" class="circuit-card">
                            </a>
                            <h3>
                                <?= $constructor['name'] ?>
                            </h3>
                            <p>
                                <strong>Nationality:</strong>
                                <?= $constructor['nationality'] ?><br>
                                <strong><a href="<?= $constructorUrl ?>" target="_blank">Wiki</a></strong>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>