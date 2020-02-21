<?php
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/liste-patientsCtrl.php';
$pageTitle = 'Ajout de patients';
include_once 'includes/header.php';
?>
<div class="container-fluid">
    <a href="index.php">Accueil</a>
    <div class="row">
        <div class="input-group col-md-3 col-sm-12">
            <input id="searchPatient" type="text" class="form-control" placeholder="Chercher un patient" aria-label="Chercher un patient" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Chercher</button>
            </div>
        </div>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>NOM</th>
                <th>Prénom</th>
                <th>Infos</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($patientsList as $patients) {
                ?>
                <tr>
                    <td><?= $patients->lastname ?></td>
                    <td><?= $patients->firstname ?></td>
                    <td><a href="profil-patient.php?id=<?= $patients->id ?>">Infos</a></td>
                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#deletePatientModal" data-id="<?= $patients->id ?>">&times;</button></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="modal hide" id="deletePatientModal" role="dialog" aria-labelledby="deletePatientModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="deleteModalTitle"> Supprimer le rendez-vous</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous supprimer le patient ?</p>
                </div>
                <div class="modal-footer">
                    <form action="#" method="POST">
                        <input type="hidden" name="patientId" id="patientId" value="" />
                        <input type="submit" class="btn btn-secondary" data-dismiss="modal" aria-label="Annuler" name="cancelDeletingPatient" id="cancelDeletingPatient" value="Annuler" />
                        <input type="submit" class="btn btn-primary" name="confirmDeletingPatient" id="confirmDeletingPatient" value="Confirmer" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'includes/footer.php';
