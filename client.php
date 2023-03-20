<?php
function connexionPDO()
{
    $login = "root";
    $mdp = "";
    $bd = "denas";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

function readByLogin($login){
    // renvoie un Client ou null si aucun login ne correspond
    $connex = connexionPDO();
    $req = "SELECT id,nom,login,pass,estBloque,codePinOtp FROM client WHERE login = '" . $login . "'";
    $res = $connex->query($req);
    $enreg = $res->fetch(PDO::FETCH_OBJ);
    if ($enreg != false) {
        $unClient = new Client(
            $enreg->id,
            $enreg->nom,
            $enreg->login,
            $enreg->pass,
            $enreg->estBloque,
            $enreg->codePinOtp
        );
    } else {
        return null;
    }
    $res->closeCursor();
    return $unClient;
}

//Client(id, nom, login, pass, estBloque, codePinOtp)
class Client{
    private $id;
    private $nom;
    private $login;
    private $pass;
    private $estBloque;
    private $codePinOtp;

    public function __construct($id,$nom,$login,$pass,$estBloque,$codePinOtp){
        $this->id=$id;
        $this->nom=$nom;
        $this->login=$login;
        $this->pass=$pass;
        $this->estBloque=$estBloque;
        $this->codePinOtp=$codePinOtp;
    }
  
    public function getPass(){
        return $this->pass;
    }

    public function getLogin(){
        return $this->login;
    }
}
?>