<?php
//J'instancie mon objet avant d'appeller la méthode
$patients = new patients();
$appointments = new appointments();
if (isset($_POST['confirmDeletingPatient'])) {
    if (filter_var($_POST['patientId'], FILTER_VALIDATE_INT)) {
        $appointments->idPatients = htmlspecialchars($_POST['patientId']);
        $patients->id = htmlspecialchars($_POST['patientId']);
        $patients->deletePatient();
        $appointments->deleteAppointment();
    }
} else if (isset($_POST['cancelDeletingPatient'])) {
    header('location:liste-rendezvous.php');
}

$page = (!empty($_GET['page']) && filter_var($_GET['page'], FILTER_VALIDATE_INT) ? htmlspecialchars($_GET['page']) : 1);
$offset = ($page - 1) * 15;
if(isset($_POST['searchPatient'])){
    if(!empty($_POST['searchInput'])){
        $searchArray = array();
        $searchArray['lastname'] = '%' . htmlspecialchars($_POST['searchInput']) . '%';
        $searchArray['firstname'] = '%' . htmlspecialchars($_POST['searchInput']) . '%';
        $searchArray['phone'] = '%' . htmlspecialchars($_POST['searchInput']) . '%';
        $searchArray['mail'] = '%' . htmlspecialchars($_POST['searchInput']) . '%';
        $patientsList = $patients->getPatientsList($searchArray, $offset);
    }else{
        $patientsList = $patients->getPatientsList($emptyArray = array(), $offset);
    }
} else {
    $patientsList = $patients->getPatientsList($emptyArray = array(), $offset);
}
$numberOfElements = $patients->getNumberPatients();
$numberOfPages = ceil($numberOfElements / 15);