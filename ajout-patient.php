<?php
include_once 'models/patients.php';
include_once 'controllers/ajout-patientCtrl.php';
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
        <h1>Ajout de nouveaux patients</h1>
        <form action="" method="POST">
            <label for="lastname">Nom : </label><input type="text" name="lastname" id="lastname" placeholder="Dupont" required />
            <p class="text-danger"><?= isset($errorMessage['lastname']) ? $errorMessage['lastname'] : '' ?></p>
            <label for="firstname">Prénom : </label><input type="text" name="firstname" id="firstname" placeholder="Martin" required />
            <p class="text-danger"><?= isset($errorMessage['firstname']) ? $errorMessage['firstname'] : '' ?></p>
            <label for="birthdate">Date de naissance : </label><input type="date" name="birthdate" id="birthdate" required />
            <p class="text-danger"><?= isset($errorMessage['birthdate']) ? $errorMessage['birthdate'] : '' ?></p>
            <label for="phoneNumber">Numéro de téléphone : </label><input type="tel" name="phoneNumber" id="phoneNumber" placeholder="0607080910" required />
            <p class="text-danger"><?= isset($errorMessage['phoneNumber']) ? $errorMessage['phoneNumber'] : '' ?></p>
            <label for="email">Adresse mail : </label><input type="email" name="email" id="email" placeholder="adresse@email.fr" required />
            <p class="text-danger"><?= isset($errorMessage['email']) ? $errorMessage['email'] : '' ?></p>
            <input type="submit" name="addPatient" id="addPatient" value="Enregistrer" />
        </form>
        <p><?= $insertSuccessOrError ?></p>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>