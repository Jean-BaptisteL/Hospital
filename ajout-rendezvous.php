<?php
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/ajout-rendezvousCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/chosen.min.css"/>
        <link rel="stylesheet" href="assets/css/style.css" />
        <title>Ajout de rendez-vous</title>
    </head>
    <body>
        <a href="index.php">Accueil</a>
        <h1>Ajout de rendez-vous</h1>
        <form action="" method="POST">
            <label for="patientsList">Patient :</label><select name="patientsList" id="patientsList" placeholder="Jean-Claude Gloumy">
                <option selected disabled>Sélectionnez un patient</option>
                <?php
                foreach ($patientsList as $patient) {
                    ?>
                    <option value="<?= $patient->id ?>"><?= $patient->firstname ?> <?= $patient->lastname ?></option>
                    <?php
                }
                ?>
            </select>
            <p class="text-danger"><?= isset($errorMessage['patientsList']) ? $errorMessage['patientsList'] : '' ?></p>
            <label for="dateAppointment">Date du rendez-vous :</label><input type="date" name="dateAppointment" id="dateAppointment" />
            <p class="text-danger"><?= isset($errorMessage['dateAppointment']) ? $errorMessage['dateAppointment'] : '' ?></p>
            <label for="hourAppointment">Heure du rendez-vous :</label><input type="time" name="hourAppointment" id="hourAppointment" min="08:30" max="18:00"  />
            <p class="text-danger"><?= isset($errorMessage['hourAppointment']) ? $errorMessage['hourAppointment'] : '' ?></p>
            <input type="submit" id="addAppointment" name="addAppointment" value="Enregistrer" />
        </form>
        <p><?= isset($errorMessage['final']) ? $errorMessage['final'] : '' ?></p>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="assets/js/chosen.jquery.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>