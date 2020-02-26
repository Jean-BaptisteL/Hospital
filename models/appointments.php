<?php
include_once 'models/database.php';
class appointments {

    public $id = 0;
    public $dateHour = '1900-01-01';
    public $idPatients = 0;
    public $dataBase = NULL;
    
    public function __construct() {
        $this->dataBase = database::getInstance();
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
        $query = 'SELECT `appointments` . `id`, `dateHour`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%H:%i\') AS `hour`, `lastname`, `firstname`, `idPatients` '
                . 'FROM `appointments` '
                . 'INNER JOIN `patients` ON `idPatients` = `patients` . `id`';
        $request = $this->dataBase->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getAppointmentDetails(){
        $query = 'SELECT DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%H:%i\') AS `hour`, `dateHour`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail`  '
                . 'FROM `appointments` '
                . 'INNER JOIN `patients` ON `idPatients` = `patients` . `id` '
                . 'WHERE `idPatients` = :idPatients AND `dateHour` = :dateHour';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    
    public function modifyAppointment(){
        $query = 'UPDATE `appointments` '
                . 'SET `dateHour` = :dateHour '
                . 'WHERE `id` = :id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        return $statement->execute();
    }
    
    public function deleteAppointment(){
        $query = 'DELETE FROM `appointments` '
                . 'WHERE `id`=:id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
