<?php
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/ajout-patient-rendez-vousCtrl.php';
$pageTitle = 'Ajouter un patient et un rendez-vous';
include_once 'includes/header.php';
?>
<div class="container-fluid">
    <h1>Ajouter un patient et un rendez-vous</h1>
    <div class="d-flex justify-content-center">
        <form action="ajout-patient-rendez-vous.php" method="POST">
            <h2>Nouveau patient :</h2>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="lastname">NOM :</label>
                    <input type="text" name="lastname" id="lastname" placeholder="DUPONT" />
                    <p class="text-danger"><?= isset($errorMessage['lastname']) ? $errorMessage['lastname'] : '' ?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="firstname">Prénom :</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Martin" />
                    <p class="text-danger"><?= isset($errorMessage['firstname']) ? $errorMessage['firstname'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="birthdate">Date de naissance :</label>
                    <input type="date" name="birthdate" id="birthdate" />
                    <p class="text-danger"><?= isset($errorMessage['birthdate']) ? $errorMessage['birthdate'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="phone">Numéro de téléphone :</label>
                    <input type="tel" name="phone" id="phone" placeholder="0607080910" />
                    <p class="text-danger"><?= isset($errorMessage['phone']) ? $errorMessage['phone'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="mail">Adresse mail :</label>
                    <input type="email" name="mail" id="mail" placeholder="adresse@mail.com" />
                    <p class="text-danger"><?= isset($errorMessage['mail']) ? $errorMessage['mail'] : '' ?></p>
                </div>
            </div>
            <h2>Nouveau rendez-vous :</h2>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="date">Date du rendez-vous :</label>
                    <input type="date" name="dateAppointment" id="dateAppointment" />
                    <p class="text-danger"><?= isset($errorMessage['dateAppointment']) ? $errorMessage['dateAppointment'] : '' ?></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="hour">Heure du rendez-vous :</label>
                    <input type="time" name="hourAppointment" id="hourAppointment" />
                    <p class="text-danger"><?= isset($errorMessage['hourAppointment']) ? $errorMessage['hourAppointment'] : '' ?></p>
                </div>
            </div>
            <input type="submit" id="addPatientAndAppointment" name="addPatientAndAppointment" value="Ajouter" />
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
