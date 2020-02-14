<?php
$regexLastnameFirstname = '/^[a-zA-Z\-\'éèàêëïôûâä\sç]+$/';
$regexDate = '/^[0-9]{4}-0[1-9]|1[0-2]-[0-2][0-9]|3[0-1]$/';
$errorMessage = array();
$insertSuccessOrError = '';

if(isset($_POST['addPatient'])){
    $patients = new patients();
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
    if (!empty($_POST['phoneNumber'])){
        if(preg_match('/^0[1-79][0-9]{8}$/', $_POST['phoneNumber'])){
            $patients->phone = htmlspecialchars($_POST['phoneNumber']);
        }else{
            $errorMessage['phoneNumber'] = 'Un numéro de téléphone valide commence par un 0 et contient 10 chiffres et veuillez ne pas mettre de séparateur.';
        }
    }else{
        $errorMessage['phoneNumber'] = 'Veuillez entrer votre numéro de téléphone.';
    }
    if (!empty($_POST['email'])){
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $patients->mail = htmlspecialchars($_POST['email']);
        }else{
            $errorMessage['email'] = 'Cette email n\'est pas valide.';
        }
    }else{
        $errorMessage['email'] = 'Veuillez entrer votre adresse email.';
    }
    if(count($errorMessage) == 0){
        $isPatientExists = $patients->checkIfPatientExists();
        if (!$isPatientExists->patientExists) {
            $patients->addNewPatient();
            $insertSuccessOrError = 'Le patient a bien été enregistré.';
        } else {
            $insertSuccessOrError = 'Le patient existe déjà.';
        }
    }
}

