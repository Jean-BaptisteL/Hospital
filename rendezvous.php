<?php
include_once 'models/appointments.php';
include_once 'controllers/rendezvousCTRL.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Détails du rendez-vous</title>
    </head>
    <body>
        <a href="index.php">Accueil</a>
        <h1>Détails du rendez-vous</h1>
        <ul>
            <li>Patient : <?= $appointmentDetails->lastname ?> <?= $appointmentDetails->firstname ?></li>
            <li>Date de naissance : <?= $appointmentDetails->birthdate ?></li>
            <li>Numéro de téléphone : <?= $appointmentDetails->phone ?></li>
            <li>Adresse mail : <?= $appointmentDetails->mail ?></li>
            <li>Rendez-vous le <?= $appointmentDetails->date ?> à <?= $appointmentDetails->hour ?></li>
        </ul>
    </body>
</html>

