<?php
include_once 'models/patients.php';
include_once 'controllers/profil-patientCtrl.php';
$pageTitle = 'Profil Patient';
include_once 'includes/header.php';
?>
        <a href="index.php">Accueil</a>
        <h1>Profil de <?= $profilPatient[0]->firstname ?> <?= $profilPatient[0]->lastname ?></h1>
        <p>NOM : <?= $profilPatient[0]->lastname ?></p>
        <p>Prénom : <?= $profilPatient[0]->firstname ?></p>
        <p>Date de naissance = <?= $profilPatient[0]->birthdate ?></p>
        <p>Numéro de téléphone : <?= $profilPatient[0]->phone ?></p>
        <p>Adresse mail : <?= $profilPatient[0]->mail ?></p>
        <?php
        if($profilPatient[0]->dateAppointment != NULL && $profilPatient[0]->timeAppointment != NULL){
        ?>
        <table>
            <thead>
                <tr>
                    <th>Rendez-vous</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($profilPatient as $patient){
                ?>
                <tr>
                    <td>Le <?= $patient->dateAppointment ?> à <?= $patient->timeAppointment ?></td>
                    <td><a href="rendezvous.php?idPatients=<?= $patient->idPatients ?>&dateHour=<?= $patient->dateHour ?>&id=<?= $patient->appointmentId ?>">Infos</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>
        <button id="showOrHideForm">Modifier</button>
        <div id="modificationForm">
            <form action="" method="POST">
                <label for="lastname">Nom : </label><input type="text" name="lastname" id="lastname" value="<?= $profilPatient[0]->lastname ?>" required />
                <p class="text-danger"><?= isset($errorMessage['lastname']) ? $errorMessage['lastname'] : '' ?></p>
                <label for="firstname">Prénom : </label><input type="text" name="firstname" id="firstname" value="<?= $profilPatient[0]->firstname ?>" required />
                <p class="text-danger"><?= isset($errorMessage['firstname']) ? $errorMessage['firstname'] : '' ?></p>
                <label for="birthdate">Date de naissance : </label><input type="date" name="birthdate" id="birthdate" value="<?= $profilPatient[0]->ymdBirthdate ?>" required />
                <p class="text-danger"><?= isset($errorMessage['birthdate']) ? $errorMessage['birthdate'] : '' ?></p>
                <label for="phoneNumber">Numéro de téléphone : </label><input type="tel" name="phoneNumber" id="phoneNumber" value="<?= $profilPatient[0]->phone ?>" required />
                <p class="text-danger"><?= isset($errorMessage['phoneNumber']) ? $errorMessage['phoneNumber'] : '' ?></p>
                <label for="email">Adresse mail : </label><input type="email" name="email" id="email" value="<?= $profilPatient[0]->mail ?>" required />
                <p class="text-danger"><?= isset($errorMessage['email']) ? $errorMessage['email'] : '' ?></p>
                <input type="submit" name="modifyPatient" id="modifyPatient" value="Enregistrer" />
            </form>
        </div>
<?php
include_once 'includes/footer.php';