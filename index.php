<?php
$pageTitle = 'Accueil';
include_once 'includes/header.php';
?>
        <h1>Hôpital La Manu</h1>
        <h2>Accueil</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-6-sd col-12-sm text-center links">
                <div class="col-12 d-flex justify-content-around">
                    <a class="pageLinks bg-primary col-6" href="ajout-patient.php">Ajouter un patient</a>
                    <a class="pageLinks bg-primary col-6" href="liste-patients.php">Liste des patients</a>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a class="pageLinks bg-primary col-6" href="ajout-rendezvous.php">Ajouter un rendez-vous</a>
                    <a class="pageLinks bg-primary col-6" href="liste-rendezvous.php">Liste des rendez-vous</a>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a class="pageLinks bg-primary col-6" href="ajout-patient-rendez-vous.php">Ajouter un patient et un rendez-vous</a>
                </div>
            </div>
        </div>
<?php
include_once 'includes/footer.php';