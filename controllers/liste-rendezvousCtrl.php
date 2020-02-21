<?php

$appointments = new appointments();
if(isset($_POST['confirmDeletingAppointment'])){
    if(filter_var($_POST['appointmentId'], FILTER_VALIDATE_INT)){
        $appointments->id = htmlspecialchars($_POST['appointmentId']);
        $appointments->deleteAppointment();
    }
}else if(isset($_POST['cancelDeletingAppointment'])){
    header('location:liste-rendezvous.php');
}
$appointmentsList = $appointments->getAppointmentsList();