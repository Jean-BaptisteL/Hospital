<?php
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/ajout-rendezvousCtrl.php';
$pageTitle = 'Ajout de rendez-vous';
include_once 'includes/header.php';
?>
        <a href="index.php">Accueil</a>
        <h1>Ajout de rendez-vous</h1>
        <form action="" method="POST">
            <label for="patientsList">Patient :</label><select name="patientsList" id="patientsList">
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
<?php
include_once 'includes/footer.php';