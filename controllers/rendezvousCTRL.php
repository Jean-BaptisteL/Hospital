<?php
$dateHourRegex = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1] [0-1][0-9]|2[0-3]:[0-5][0-9]:00$/';
if(!empty($_GET['idPatients']) && !empty($_GET['dateHour'])){
    $appointments = new appointments();
    if(preg_match($dateHourRegex, $_GET['dateHour'])){
        $appointments->dateHour = htmlspecialchars($_GET['dateHour']);
    }else{
        header('location:liste-rendezvous.php');
    }
    if(filter_var($_GET['idPatients'], FILTER_VALIDATE_INT)){
        $appointments->idPatients = htmlspecialchars($_GET['idPatients']);
    }else{
        header('location:liste-rendezvous.php');
    }
    $appointmentDetails = $appointments->getAppointmentDetails();
}