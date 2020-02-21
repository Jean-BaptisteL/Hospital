<?php
$errors = array();
$dateHourRegex = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1] [0-1][0-9]|2[0-3]:[0-5][0-9]:00$/';
$dateRegex = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1]$/';
$hourRegex = '/^[0-1][0-9]|2[0-3]:[0-5][0-9]$/';
if (!empty($_GET['idPatients']) && !empty($_GET['dateHour'])) {
    $appointments = new appointments();
    if (preg_match($dateHourRegex, $_GET['dateHour'])) {
        $appointments->dateHour = htmlspecialchars($_GET['dateHour']);
        if (filter_var($_GET['idPatients'], FILTER_VALIDATE_INT)) {
            $appointments->idPatients = htmlspecialchars($_GET['idPatients']);
            if (isset($_POST['modifyAppointment'])) {
                if (!empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
                    $appointments->id = htmlspecialchars($_GET['id']);
                    $newDate = '';
                    $newTime = '';
                    if (!empty($_POST['newDate'])) {
                        if (preg_match($dateRegex, $_POST['newDate'])) {
                            $dateArray = explode('-', $_POST['newDate']);
                            if (checkdate($dateArray[1], $dateArray[2], $dateArray[0])) {
                                $newDate = htmlspecialchars($_POST['newDate']);
                            } else {
                                $errors['newDate'] = 'Veuillez saisir une date valide.';
                            }
                        } else {
                            $errors['newDate'] = 'Veuillez saisir une date sous le format aaaa-mm-jj.';
                        }
                    } else {
                        $errors['newDate'] = 'Veuillez saisir une date.';
                    }
                    if (!empty($_POST['newDate'])) {
                        if (preg_match($hourRegex, $_POST['newTime'])) {
                            $newTime = htmlspecialchars($_POST['newTime']);
                        } else {
                            $errors['newTime'] = 'Veuillez entrer une heure sous le format hh:mm.';
                        }
                    } else {
                        $errors['newTime'] = 'Veuillez saisir une heure.';
                    }
                    if (count($errors) == 0) {
                        $appointments->dateHour = $newDate . ' ' . $newTime;
                        $modifyAppointment = $appointments->modifyAppointment();
                    }
                } else {
                    header('location:liste-rendezvous.php');
                }
            }
            $appointmentDetails = $appointments->getAppointmentDetails();
            $date = explode(' ', $appointmentDetails->dateHour);
        } else {
            header('location:liste-rendezvous.php');
        }
    } else {
        header('location:liste-rendezvous.php');
    }
} else {
    header('location:liste-rendezvous.php');
}