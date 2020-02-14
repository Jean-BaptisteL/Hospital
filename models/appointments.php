<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of appointments
 *
 * @author lmno010
 */
class appointments {

    public $id = 0;
    public $dateHour = '1900-01-01';
    public $idPatients = 0;
    public $dataBase = NULL;
    
    public function __construct() {
        try {
            $this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'infiltrator');
        } catch (Exception $ex) {
            die('Une erreur au niveau de la base de donnée s\'est produite !');
        }
    }
    
    public function addAppointment(){
        $query= 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES '
                . '(:dateHour, :idPatients)';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $statement->execute();
    }
    
    public function checkIfAppointmentExists(){
        $query = 'SELECT COUNT(`id`) AS `appointmentExists` FROM `appointments` WHERE '
                . '`dateHour` = :dateHour AND `idPatients` = :idPatients';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    
    public function getAppointmentsList(){
        $query = 'SELECT `dateHour`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%H:%i\') AS `hour`, `lastname`, `firstname`, `idPatients` '
                . 'FROM `appointments` '
                . 'LEFT JOIN `patients` ON `idPatients` = `patients` . `id`';
        $request = $this->dataBase->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getAppointmentDetails(){
        $query = 'SELECT DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%H:%i\') AS `hour`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail`  '
                . 'FROM `appointments` '
                . 'INNER JOIN `patients` ON `idPatients` = `patients` . `id` '
                . 'WHERE `idPatients` = :idPatients AND `dateHour` = :dateHour';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}
