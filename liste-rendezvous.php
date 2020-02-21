<?php
include_once 'models/appointments.php';
include_once 'controllers/liste-rendezvousCtrl.php';
$pageTitle = 'Liste des rendez-vous';
include_once 'includes/header.php';
?>
        <h1>Liste des rendez-vous</h1>
        <table>
            <tr>
                <th>Patient</th>
                <th>Jour</th>
                <th>Heure</th>
                <th>Infos</th>
                <th>Supprimer le rdv</th>
            </tr>
            <?php
            foreach ($appointmentsList as $appointments) {
            ?>
            <tr>
                <td><?= $appointments->lastname ?> <?= $appointments->firstname ?></td>
                <td><?= $appointments->date ?></td>
                <td><?= $appointments->hour ?></td>
                <td><a href="rendezvous.php?idPatients=<?= $appointments->idPatients ?>&dateHour=<?= $appointments->dateHour ?>&id=<?= $appointments->id ?>">Infos</a></td>
                <td><a href="#" class="btn btn-danger open-deleteAppointmentModal" data-toggle="modal" data-target="#deleteAppointmentModal" data-id="<?= $appointments->id ?>">&times;</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="modal hide" id="deleteAppointmentModal" role="dialog" aria-labelledby="deleteAppointmentModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="deleteModalTitle"> Supprimer le rendez-vous</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous supprimer le rendez-vous ?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="#" method="POST">
                            <input type="hidden" name="appointmentId" id="appointmentId" value="" />
                            <input type="submit" class="btn btn-secondary" data-dismiss="modal" aria-label="Annuler" name="cancelDeletingAppointment" id="cancelDeletingAppointment" value="Annuler" />
                            <input type="submit" class="btn btn-primary" name="confirmDeletingAppointment" id="confirmDeletingAppointment" value="Confirmer" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="ajout-rendezvous.php">Ajouter un rendez-vous</a>
<?php
include_once 'includes/footer.php';