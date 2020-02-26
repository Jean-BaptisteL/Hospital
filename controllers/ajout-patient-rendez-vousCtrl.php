<?php
$regexLastnameFirstname = '/^[a-zA-Z\-\'éèàêëïôûâä\sç]+$/';
$regexDate = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1]$/';
$idRegex = '/^[0-9]+$/';
$regexTime = '/^[0-1][0-9]|2[0-4]:[0-5][0-9]$/';
$errorMessage = array();
$insertSuccessOrError = '';

if(isset($_POST['addPatientAndAppointment'])){
    $patients = new patients();
    $appointments = new appointments();
    //On vérifie si les valeurs des inputs sont valables et on les associe aux variables liées aux marqueurs nominatifs, sinon on écrit un message d'erreur
    if(!empty($_POST['lastname'])){
        if(preg_match($regexLastnameFirstname, $_POST['lastname'])){
            $patients->lastname = htmlspecialchars($_POST['lastname']);
        }else{
            $errorMessage['lastname'] = 'Ne sont acceptés, que les lettres, les caractères accentués, les espaces et les apostrophes';
        }
    }else{
        $errorMessage['lastname'] = 'Veuillez renseigner un nom.';
    }
    if(!empty($_POST['firstname'])){
        if(preg_match($regexLastnameFirstname, $_POST['firstname'])){
            $patients->firstname = htmlspecialchars($_POST['firstname']);
        }else{
            $errorMessage['firstname'] = 'Ne sont acceptés, que les lettres, les caractères accentués, les espaces et les apostrophes';
        }
    }else{
        $errorMessage['firstname'] = 'Veuillez renseigner un prénom.';
    }
    if(!empty($_POST['birthdate'])){
        if(preg_match($regexDate, $_POST['birthdate'])){
            $dateArray = explode('-', $_POST['birthdate']);
            if(checkdate($dateArray[1], $dateArray[2], $dateArray[0])){
                $patients->birthdate = htmlspecialchars($_POST['birthdate']);
            }else{
                $errorMessage['birthdate'] = 'Cette date n\'existe pas.';
            }
        }else{
            $errorMessage['birthdate'] = 'Veuillez entrer une date sous le format aaaa-mm-jj.';
        }
    }else{
        $errorMessage['birthdate'] = 'Veuillez renseigner une date.';
    }
    if (!empty($_POST['phone'])){
        if(preg_match('/^0[1-79][0-9]{8}$/', $_POST['phone'])){
            $patients->phone = htmlspecialchars($_POST['phone']);
        }else{
            $errorMessage['phone'] = 'Un numéro de téléphone valide commence par un 0 et contient 10 chiffres et veuillez ne pas mettre de séparateur.';
        }
    }else{
        $errorMessage['phone'] = 'Veuillez entrer votre numéro de téléphone.';
    }
    if (!empty($_POST['mail'])){
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $patients->mail = htmlspecialchars($_POST['mail']);
        }else{
            $errorMessage['mail'] = 'Cette email n\'est pas valide.';
        }
    }else{
        $errorMessage['mail'] = 'Veuillez entrer votre adresse email.';
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
        $appointments->dateHour = $dateAppointment . ' ' . $hourAppointment;
    }
    //S'il n'y a pas de messages d'erreur, on vérifie si le patient n'existe pas déjà. S'il n'existe pas on ajoute le nouveau patient
    //et on fait la même chose que précédemment mais pour le rendez-vous.
    if(count($errorMessage) == 0){
        $isPatientExists = $patients->checkIfPatientExists();
        if (!$isPatientExists->patientExists) {
            try{
                $patients->dataBase->beginTransaction();
                $patients->addNewPatient();
                $newPatientId = $patients->dataBase->lastInsertId();
                $appointments->idPatients = $newPatientId;
                $appointments->addAppointment();
                $patients->dataBase->commit();
            } catch (Exception $ex) {
                $patients->dataBase->rollBack();
            }
        } else {
            $insertSuccessOrError = 'Le patient existe déjà.';
        }
    }
}