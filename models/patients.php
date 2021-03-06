<?php
include_once 'models/database.php';
class patients {

    public $patientId;
    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '1960-01-01';
    public $phone = '';
    public $mail = '';
    public $dataBase = NULL;

    public function __construct() {
        $this->dataBase = database::getInstance();
    }

    public function addNewPatient() {
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
                (UPPER(:lastname), :firstname, :birthdate, :phone, :mail);'; //Ce sont des marqueurs nominatifs pour des requêtes préparées.
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $statement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $statement->execute();
    }

    /**
     * Methode qui permet de verifier si le patient existe déjà
     * Elle retourne : 0 quand le patient n'exist pas 
     *                 1 quand le patient exist
     * @return OBJ
     */
    public function checkIfPatientExists() {
        $request = 'SELECT COUNT(`id`) AS `patientExists` FROM `patients` WHERE `lastname`=:lastname'
                . ' AND `firstname`=:firstname AND `birthdate`=:birthdate'
                . ' AND `phone`=:phone AND `mail`=:mail';
        $statement = $this->dataBase->prepare($request);
        $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $statement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant d'afficher la liste des patients classés par par ordre alphabétique
     * @return OBJ
     */
    public function getPatientsList($whereArray = array(), $offset = 0) {
        $query = 'SELECT SQL_CALC_FOUND_ROWS `id`, `lastname`, `firstname` FROM `patients` ';
        if (count($whereArray) > 0) {
            $query .= 'WHERE ';
            $whereParts = array();
            foreach ($whereArray as $column => $value) {
                $whereParts[] = '`' . $column . '` LIKE :' . $column;
            }
            $query .= implode(' OR ', $whereParts);
        }
        $query .= ' ORDER BY `lastname` LIMIT 15 OFFSET :offset';
        $statement = $this->dataBase->prepare($query);
        foreach ($whereArray as $column => $value) {
            $statement->bindValue(':' . $column, $value, PDO::PARAM_STR);
        }
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNumberPatients() {
        $query = 'SELECT found_rows()';
        $request = $this->dataBase->query($query);
        return $request->fetchColumn();
    }

    /**
     * Méthode permettant d'obtenir les informations d'un patient.
     * @return objet
     */
    public function getProfilPatient() {
        $query = 'SELECT `patients`.`id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') AS `birthdate`, `birthdate` AS `ymdBirthdate`, `phone`, `mail`, DATE_FORMAT(`dateHour`, \'%d/%m/%y\') AS `dateAppointment`,DATE_FORMAT(`dateHour`, \'%H:%i\') AS `timeAppointment`, `idPatients`, `dateHour`, `appointments`.`id` AS `appointmentId` '
                . 'FROM `patients` '
                . 'LEFT JOIN `appointments` ON `patients`.`id` = `appointments`.`idPatients` '
                . 'WHERE `patients`.`id`=:id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkIfPatientExistsById() {
        $query = 'SELECT COUNT(`id`) AS `exists` '
                . 'FROM `patients` '
                . 'WHERE `id` = :id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function modifyProfilPatient() {
        $query = 'UPDATE `patients` '
                . 'SET `lastname`=UPPER(:lastname), `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail '
                . 'WHERE `id`=:id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $statement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $statement->execute();
    }

    public function deletePatient() {
        $query = 'DELETE FROM `patients` '
                . 'WHERE `id` = :id';
        $statement = $this->dataBase->prepare($query);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $statement->execute();
    }

}
