<?php
include_once 'models/appointments.php';
include_once 'controllers/liste-rendezvousCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Liste des rendez-vous</title>
    </head>
    <body>
        <h1>Liste des rendez-vous</h1>
        <table>
            <tr>
                <th>Patient</th>
                <th>Jour</th>
                <th>Heure</th>
                <th>Infos sur le rendez-vous</th>
            </tr>
            <?php
            foreach ($appointmentsList as $appointments) {
            ?>
            <tr>
                <td><?= $appointments->lastname ?> <?= $appointments->firstname ?></td>
                <td><?= $appointments->date ?></td>
                <td><?= $appointments->hour ?></td>
                <td><a href="rendezvous.php?idPatients=<?= $appointments->idPatients ?>&dateHour=<?= $appointments->dateHour ?>">Infos</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <a href="ajout-rendezvous.php">Ajouter un rendez-vous</a>
    </body>
</html>