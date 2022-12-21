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


    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    //! requete SQL 

    public function getLesAdresses(){
        $stmt = $this->pdo->prepare("SELECT * FROM map");
        $stmt->execute();
        $results = $stmt->fetchAll();
        // var_dump lisible
        
    echo "<pre>";
    print_r($results);
    echo "</pre>";
    }






}
?>
