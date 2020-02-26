<?php
class database {

    public $db = NULL;
    private static $instance = NULL;
    
    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'infiltrator', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $ex) {
            die('Une erreur au niveau de la base de donnée s\'est produite !' . $ex->getMessage());
        }
    }
    /**
     * Méthode qui permet de récupérer l'instance PDO si elle existe sinon,
     * elle en crée une.
     * Cette méthode est statique, c-à-d qu'on ne peut pas l'appeler via l'instanciation.
     * @return objet
     */
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new database();
        }
        return self::$instance->db;
    }
}
