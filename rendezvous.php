<?php
include_once 'models/appointments.php';
include_once 'controllers/rendezvousCTRL.php';
$pageTitle = 'Détails du rendez-vous';
include_once 'includes/header.php';
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
        <button id="showOrHideForm">Modifier le rendez-vous</button>
        <div id="modificationForm">
            <form action="#" method="POST">
                <label for="newDate">Nouvelle date :</label><input type="date" name="newDate" id="newDate" value="<?= $date[0] ?>" />
                <p><?= isset($errors['newDate']) ? $errors['newDate'] : '' ?></p>
                <label for="newTime">Nouvel horaire :</label><input type="time" name="newTime" id="newTime" value="<?= $appointmentDetails->hour ?>" min="08:00" max="17:00" />
                <p><?= isset($errors['newDate']) ? $errors['newTime'] : '' ?></p>
                <input type="submit" name="modifyAppointment" id="modifyAppointment" value="Enregistrer la modification" />
            </form>
        </div>
<?php
include_once 'includes/footer.php';
