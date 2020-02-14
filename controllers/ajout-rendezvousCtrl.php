<?php

$patient = new patients();
$patientsList = $patient->getPatientsList();
$idRegex = '/^[0-9]+$/';
$regexDate = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1]$/';
$regexTime = '/^[0-1][0-9]|2[0-4]:[0-5][0-9]$/';
$errorMessage = array();
if (isset($_POST['addAppointment'])){
    $appointments = new appointments();
    if (!empty($_POST['patientsList'])) {
        if (preg_match($idRegex, $_POST['patientsList'])) {
            $appointments->idPatients = htmlspecialchars($_POST['patientsList']);
        } else {
            $errorMessage['patientsList'] = 'Veuillez sélectionner un des patients de la liste.';
        }
    } else {
        $errorMessage['patientsList'] = 'Veuillez sélectionner un patient.';
    }
    if (!empty($_POST['dateAppointment'])) {
        if (preg_match($regexDate, $_POST['dateAppointment'])) {
            $dateArray = explode('-', $_POST['dateAppointment']);
            if (checkdate($dateArray[1], $dateArray[2], $dateArray[0])) {
                $dateAppointment = htmlspecialchars($_POST['dateAppointment']);
            } else {
                $errorMessage['dateAppointment'] = 'Cette date n\'existe pas.';
            }
        } else {
            $errorMessage['dateAppointment'] = 'Veuillez entrer une date sous le format aaaa-mm-jj.';
        }
    } else {
        $errorMessage['dateAppointment'] = 'Veuillez choisir une date.';
    }
    if (!empty($_POST['hourAppointment'])) {
        if (preg_match($regexTime, $_POST['hourAppointment'])) {
            $hourAppointment = htmlspecialchars($_POST['hourAppointment']);
        } else {
            $errorMessage['hourAppointment'] = 'Veuillez entrer une heure valide.';
        }
    } else {
        $errorMessage['hourAppointment'] = 'Veuillez renseigner une heure de rendez-vous.';
    }
    if (!empty($hourAppointment) && !empty($dateAppointment)) {
        $appointments->dateHour = $dateAppointment . ' ' . $hourAppointment . ':00';
    }
    if (count($errorMessage) == 0) {
        $isAppointmentExists = $appointments->checkIfAppointmentExists();
        if (!$isAppointmentExists->appointmentExists) {
            $appointments->addAppointment();
        }else{
            $errorMessage['final'] = 'Une erreure est survenue';
        }
    }
}
