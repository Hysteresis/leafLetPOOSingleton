<?php
class Config{
    //? Le Singleton, permet d'avoir une classe qui sera 
    //? instanciée qu'une seule fois tout au long de notre application

    //! les attributs de la classe Config
    static private $_instance;
    private $pdo;
    //! Le construct : methode qui sert à initialiser, créeer un objet et lui donnner des attributs
    function __construct()
    {
        require_once('info.php');
        try {
            $this->pdo = new PDO('mysql:host=' . $servname . '; dbname=' . $dbname, $user, $pass );
            echo "connexion BDD : OK !";
        }
        catch (PDOException $e) {
            print "erreur :" .$e->getMessage();
            die();
        }
    
    }

    // si le singleton n'est pas créé -> le créé et return si il est deja créé
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    //! requete SQL 

    public function getLesAdresses(){
        // ce tableau sera envoyé coté HTML
        // $lesAdresses = array();
        //Récupère la requete SQL 
        $stmt = $this->pdo->prepare("SELECT * FROM map");
        $stmt->execute();
        $results = $stmt->fetchAll();
        
        foreach ($results as $result) {
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            $id = $result['Id'];
            $ville = $result['ville'];
            $description = $result['description'];
            $longitude = $result['longitude'];
            $latitude = $result['latitude'];
            // $adress = new Adress($id, $ville, $description, $longitude, $latitude);
            // array_push($lesAdresses, $adress );

        } return $results ;

    }






}
?>
