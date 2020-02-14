<?php
include_once 'models/patients.php';
include_once 'controllers/liste-patientsCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Ajout de patients</title>
    </head>
    <body>
        <a href="index.php">Accueil</a>
        <table border="1">
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>Prénom</th>
                    <th>Infos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patientsList as $patients){
                ?>
                <tr>
                    <td><?= $patients->lastname ?></td>
                    <td><?= $patients->firstname ?></td>
                    <td><a href="profil-patient.php?id=<?= $patients->id ?>">Infos</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </body>
</html>

