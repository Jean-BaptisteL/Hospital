<?php
//J'instancie mon objet avant d'appeller la méthode
$patients = new patients();
$appointments = new appointments();
if(isset($_POST['confirmDeletingPatient'])){
    if(filter_var($_POST['patientId'], FILTER_VALIDATE_INT)){
        $appointments->idPatients = htmlspecialchars($_POST['patientId']);
        $patients->id = htmlspecialchars($_POST['patientId']);
        $patients->deletePatient();
        $appointments->deleteAppointment();
    }
}else if(isset($_POST['cancelDeletingPatient'])){
    header('location:liste-rendezvous.php');
}
$patientsList = $patients->getPatientsList();