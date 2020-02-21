<?php
include_once 'models/patients.php';
include_once 'controllers/ajout-patientCtrl.php';
$pageTitle = 'Ajout de patients';
include_once 'includes/header.php';
?>
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
<?php
include_once 'includes/footer.php';